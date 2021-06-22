<?php
session_cache_expire(300);
$path = $_SERVER['DOCUMENT_ROOT'];
// require_once $path . '/_include/mySql.class.php';
require_once '/srv/www/htdocs/_include/mySql.class.php';

class Login {

    public $MySQL;

    public function __construct() {
        $this->MySQL = new Mysql();
        $this->MySQL->connect();
    }

    /*
     * Returns the requested URL without any query parameters
     */

    function urlNoQuery() {
        // based on: OpenSSO->urlNoQuery
        $url = 'http';

        $port = '';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $url .= 's';
            $port = '443';
        } else {
            $port = '80';
        }
        $port = $_SERVER['SERVER_PORT'] == $port ? '' : ':' . $_SERVER['SERVER_PORT'];

        $url .= '://' . $_SERVER['HTTP_HOST'] . $port . $_SERVER['SCRIPT_NAME'];

        return $url;
    }

    /*
     * Returns the full requested URL so we can redirect the user back here after
     * they authenticate at OpenAM
     */

    function fullUrl() {
        // based on: OpenSSO->fullUrl
        $full_url = $this->urlNoQuery();

        if ($_SERVER['QUERY_STRING'] > ' ') {
            $full_url .= '?' . $_SERVER['QUERY_STRING'];
        } elseif (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] > ' ') { //new
            $full_url .= $_SERVER['PATH_INFO'];   //new
        }
        return $full_url;
    }

    function getAtributos() {
        global $nomeFunci;
        $posI = 0;
        $posF = 0;
        $xml = null;
        $tokenSSO = null;
        $tokenACR = null;

        // Autenticação Servidor de Desenvolvimento (via $_POST)

        if ($_SERVER['SERVER_NAME'] == "10.105.87.250" || $_SERVER['SERVER_NAME'] == "10.105.87.8") {

            if (!isset($_SESSION['UsuarioWeb']) and isset($_POST['cd-idgl-usu'])) {
                $matriculaFunci = $_POST['cd-idgl-usu'];
                $nomeFunci = ""; //$_POST['sn'];
                $ValorDependencia = $_POST['cd-pref-depe'];
	              $Funcao =  $_POST['cd-cmss-fun'];
                $_SESSION['UsuarioWeb'] = $matriculaFunci;
            } else {
                $this->redirectLogin();
            }

            $sql = "SELECT COUNT(*) as acesso FROM conteudo.tab_dev WHERE tx_mtc_usu = '".$matriculaFunci."';";
            $Acesso = $this->MySQL->Select($sql);

            if($Acesso[0]['acesso'] != 0){
                if (substr($matriculaFunci, 0, 1) == 'T') {
                    $sql = "SELECT T1.*, if(isnull(T1.tx_nm_guer_esgo),T1.tx_nm_esgo,T1.tx_nm_guer_esgo) as nome_guerra,T1.tx_nm_esgo as nome,  T2.cd_uor_hbtl_fun, '-1' as cd_fuc_fun, 'ESTAGIÁRIO' as funcao FROM arh.tab_esgo T1 LEFT JOIN arh.tab_fun T2 ON T1.tx_mtc_spsr_esgo = T2.tx_mtc_fun WHERE UPPER(T1.tx_mtc_esgo)='" . strtoupper($matriculaFunci) . "';";
                } else if (substr($matriculaFunci, 0, 1) == 'F') {
                    $sql = "SELECT *,if(isnull(T1.tx_nm_guer_fun),T1.tx_nm_fun,T1.tx_nm_guer_fun) as nome_guerra,T1.tx_nm_fun as nome, T1.cd_fuc_fun, fuc.tx_nm_fuc as funcao
                            FROM arh.tab_fun T1
                            left join arh.tab_fuc as fuc on T1.cd_fuc_fun = fuc.cd_fuc
                            WHERE UPPER(T1.tx_mtc_fun)='" . strtoupper($matriculaFunci) . "';";
                }else if (substr($matriculaFunci, 0, 1) == 'A') {
                    $sql = "SELECT T1.*, if(isnull(T1.tx_nm_adlt),T1.tx_nm_adlt,T1.tx_nm_adlt) as nome_guerra,T1.tx_nm_adlt as nome,  T2.cd_uor_hbtl_fun, '-1' as cd_fuc_fun, 'APRENDIZ' as funcao FROM arh.tab_adlt T1 LEFT JOIN arh.tab_fun T2 ON T1.tx_mtc_ordr_adlt = T2.tx_mtc_fun WHERE UPPER(T1.tx_mtc_adlt)='" . strtoupper($matriculaFunci) . "';";
                }

                $Funci = $this->MySQL->Select($sql);
                if ($Funci != NULL) {
                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                    $_SESSION['NomeGuerra'] = $Funci[0]['nome_guerra'];
                    $_SESSION['NomeUsuarioWeb'] = $Funci[0]['nome'];
                    $_SESSION['UOR'] = $Funci[0]['cd_uor_hbtl_fun'];
                    $_SESSION['Dependencia'] = $ValorDependencia;
                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                    $_SESSION['UsuarioFuncao'] = $Funcao;
	                  $_SESSION['UsuarioFuncaoNome'] = $Funci[0]['funcao'];
                } else {
                    ?><script>
                        ok = confirm("Funcionario sem acesso ao Portal CENOP.");
                        if (ok != null)
                        {
                    <?
                    $url = fullUrl();
                    $url = urlencode($url);
                    // Pagina Sem Acesso
                    $url = ($_SERVER['SERVER_NAME'] == "10.105.87.250" || $_SERVER['SERVER_NAME'] == "10.105.87.8") ? "https://cenopservicoscwb.intranet.bb.com.br/_tools/loginPortal.php?urlRetorno=" . "$url" : "https://login.intranet.bb.com.br/distAuth/UI/" . "Login?goto=$url";
                    ?>
                        location.href = "<?= $url ?>";
                    }
                    </script><?php
                }
            } else {
              session_destroy();
              header("Location: semAcessoDev.php");
              exit;
            }
        } else {


            // Autenticação do Servidor de Produção
            $tokenSSO = $_COOKIE["BBSSOToken"];

            //var_dump($tokenSSO);
            //$tokenACR = $_COOKIE["ssoacr"]; //"sso.intranet.bb.com.br";

            /* ALTERAÇÃO REALIZADA EM 2019-11-11 - F5116163 - SE DER MERDA, VOLTAR PARA SSO2
            $tokenACR = "sso2.intranet.bb.com.br"; */
            
            $tokenACR = "sso.intranet.bb.com.br";
            if (!($tokenSSO) or $tokenSSO == "") {
                $this->redirectLogin();
            } elseif (!($tokenACR) or $tokenACR == "") {
                $this->redirectLogin();
            } else {
                //alterado por F1117319 Antonio Filho em 31/07/2019 - Página do CENOP não validava o login
                //$request = "http://" . $tokenACR . "/sso/identity/attributes?subjectid=" . $tokenSSO;
                $request = "https://" . $tokenACR . "/sso/identity/attributes?subjectid=" . $tokenSSO;

                // Make the request
                $xml = file_get_contents($request);



                // Retrieve HTTP status code
                list($version, $status_code, $msg) = explode(' ', $http_response_header[0], 3);

                // Check the HTTP Status code
                switch ($status_code) {
                    case 200:
                        // Success
                        //Pega nome do funcionario

                        $posI = stripos($xml, 'nomeFuncionario', 0);
                        $posI = $posI + 44;
                        $novoXML = substr($xml, $posI);
                        $posF = stripos($novoXML, 'userdetails.attribute.name', 0) + $posI;
                        $nomeFunci = substr($xml, $posI, $posF - $posI - 1);
                        //Pega matrícula do funcionario
                        $posI = stripos($xml, 'ibm-nativeid', 0);
                        $posI = $posI + 41;
                        $posF = $posI + 9;
                        $matriculaFunci = substr($xml, $posI, $posF - $posI - 1);
                        $posI = stripos($xml, 'cd-pref-depe', 0);
                        $posI = $posI + 41;
                        $posF = $posI + 5;

                        $ValorDependencia = substr($xml, $posI, $posF - $posI - 1);
                        $ValorDependenciaExp = explode(" ", $ValorDependencia);
                        $Dependencia = str_pad($ValorDependenciaExp[0], 4, "0", STR_PAD_LEFT);



                        if(substr($matriculaFunci, 0, 1) != 'C'){
                                $sql = "SELECT
                                    *, fuc.tx_nm_fuc as nomeCargo
                                FROM
                                    (SELECT
                                        T1.tx_mtc_esgo AS matricula,
                                            IF(ISNULL(T1.tx_nm_guer_esgo), T1.tx_nm_esgo, T1.tx_nm_guer_esgo) AS nome_guerra,
                                            T1.tx_nm_esgo AS nome,
                                            T2.cd_uor_hbtl_fun,
                                            '-1' AS cd_fuc_fun
                                    FROM
                                        arh.tab_esgo T1
                                    LEFT JOIN arh.tab_fun T2 ON T1.tx_mtc_spsr_esgo = T2.tx_mtc_fun UNION SELECT
                                        tx_mtc_fun AS matricula,
                                            IF(ISNULL(tx_nm_guer_fun), tx_nm_fun, tx_nm_guer_fun) AS nome_guerra,
                                            tx_nm_fun AS nome,
                                            cd_uor_hbtl_fun,
                                            cd_fuc_fun
                                    FROM
                                        arh.tab_fun UNION SELECT
                                        T1.tx_mtc_adlt AS matricula,
                                            T1.tx_nm_adlt AS nome_guerra,
                                            T2.cd_uor_hbtl_fun,
                                            T1.tx_nm_adlt AS nome,
                                            '-2' AS cd_fuc_fun
                                    FROM
                                        arh.tab_adlt T1
                                    LEFT JOIN arh.tab_fun T2 ON T1.tx_mtc_ordr_adlt = T2.tx_mtc_fun UNION SELECT
                                        tx_mtc_cvcd AS matricula,
                                            tx_nm_cvcd AS nome_guerra,
                                            tx_nm_cvcd AS nome,
                                            '-1' AS cd_uor_hbtl_fun,
                                            cd_fuc_cvcd AS cd_fuc_fun
                                    FROM
                                        conteudo.tab_mtc_cvcd) T0
                                      left join arh.tab_fuc as fuc on t0.cd_fuc_fun = fuc.cd_fuc
                                WHERE
                                    matricula = '" . strtoupper($matriculaFunci) . "';";

                            //var_dump($sql);
                            $Funci = $this->MySQL->Select($sql);
                            //print_r($Funci);
                            if ($Funci != NULL) {

                                $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                $_SESSION['NomeUsuarioWeb'] = $Funci[0]['nome'];//$nomeFunci;
                                $_SESSION['Dependencia'] = $Dependencia;
                                //Novos
                                $_SESSION['NomeGuerra'] = $Funci[0]['nome_guerra'];
                                $_SESSION['UOR'] = $Funci[0]['cd_uor_hbtl_fun'];
                                $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                $_SESSION['UsuarioFuncao'] = $Funci[0]['cd_fuc_fun'];
                                $_SESSION['UsuarioFuncaoNome'] = $Funci[0]['nomeCargo'];
                            } else {
                                // COMENTADO POR F7289808 EM 26/06/2019
                                /*$sql = "SELECT PRF, NOME, TX_TIP_DEPE FROM mestre.mst606 T0 INNER JOIN mestre.tip_depe T1 ON T0.TP_DP=T1.CD_TIP_DEP WHERE PRF='" . $Dependencia . "' AND CD_SB='0'";*/

                                // INCLUIDO POR F7289808 EM 26/06/2019 PARA PERMITIR ACESSO DAS GERAGs
                                if($Dependencia == '8037' || $Dependencia == '8038' || $Dependencia == '8039') {
                                    $sql = "SELECT PRF, NOME, TX_TIP_DEPE FROM mestre.mst606 T0 INNER JOIN mestre.tip_depe T1 ON T0.TP_DP=T1.CD_TIP_DEP WHERE NOME like '%GERAG%'";
                                }
                                else {
                                    $sql = "SELECT PRF, NOME, TX_TIP_DEPE FROM mestre.mst606 T0 INNER JOIN mestre.tip_depe T1 ON T0.TP_DP=T1.CD_TIP_DEP WHERE PRF='" . $Dependencia . "' AND CD_SB='0'";
                                }
                                // FIM DA INCLUSÃO

                                $DadosPrefixo = $this->MySQL->Select($sql);

                                if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "CSO VALORES" || trim($DadosPrefixo[0]['TX_TIP_DEPE']) == "CSO / SERET") {
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="CSO VALORES";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "CS - CENTRO DE SERVICOS") { //Visão GENOP
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="CS - CENTRO DE SERVICOS";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "SUPERINTENDENCIA") { //Visão SUPER
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="SUPERINTENDENCIA";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "PSO") { //Visão PSO
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="PSO";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "AGENCIA NO PAIS") { //Visão Agência
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="AGENCIA NO PAIS";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "PAA") { // Visão PAA
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="PAA";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "AGENCIA ESTILO") { //Visão Estilo
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="AGENCIA ESTILO";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } 
                                else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "PLAT. NEGOCIAL ATACADO") { //Plataforma Negocial
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="AGENCIA ESTILO";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "NUSEG") { //Visão REROP
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="NUSEG";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['PRF'] == "8621") { //Visão NETES
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="NETES";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['PRF'] == "9946") { //Visão URO-RISC.OPERACIONAL
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="DINOP";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else if ($DadosPrefixo[0]['PRF'] == "1981") { //Visão CENOP SP
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="DINOP";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                }
                                else if ($DadosPrefixo[0]['PRF'] == "8442" || $DadosPrefixo[0]['PRF'] == "8559") { //Visão GEPES CENT. OESTE II a Pedido da Ecoa 2020 (Willian Hideo Saizaki)
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="DINOP";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                }

                                //INCLUÍDO POR F7289808 EM 26/06/2019 PARA PERMITIR ACESSO DAS GERAGs
                                else if ($DadosPrefixo[0]['PRF'] == "8037" || $DadosPrefixo[0]['PRF'] == "8038" || $DadosPrefixo[0]['PRF'] == "8039") {
                                    //Visão GERAG
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="DINOP";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                //INCLUÍDO POR F1117319 EM 18/07/2019 PARA PERMITIR ACESSO DOS ESCRITORIOS PRIVATE
                                } else if ($DadosPrefixo[0]['TX_TIP_DEPE'] == "ESCRITORIO PRIVATE") {
                                    //Visão PRIVATE
                                    $_SESSION['UsuarioWeb'] = $matriculaFunci;
                                    $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                                    //$_SESSION['PerfilFunci']="DINOP";
                                    $_SESSION['Dependencia'] = $Dependencia;
                                    //Novos
                                    $_SESSION['NomeGuerra'] = $nomeFunci;
                                    $_SESSION['UOR'] = 0;
                                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                                    $_SESSION['UsuarioFuncao'] = 0;
                                } else {
                                    ?><script>
                                        ok = confirm("Funcionario sem acesso ao Portal CENOP.");
                                        if (ok != null)
                                        {
                                    <?
                                    // Atual
                                    $url = fullUrl();
                                    $url = urlencode($url);https://login.intranet.bb.com.br/distAuth/UI/Login?goto=
                                        $url = ($_SERVER['SERVER_NAME'] == "10.105.87.250" || $_SERVER['SERVER_NAME'] == "10.105.87.8") ? "https://cenopservicoscwb.intranet.bb.com.br/_tools/loginPortal.php?urlRetorno=" . "$url" : "https://login.intranet.bb.com.br/distAuth/UI/" . "Login?goto=$url";
                                    ?>
                                        location.href = "<?= $url ?>";
                                    }
                                    </script><?php
                                }
                            }
                        } else {
                            $_SESSION['UsuarioWeb'] = $matriculaFunci;
                            $_SESSION['NomeUsuarioWeb'] = $nomeFunci;
                            $_SESSION['Dependencia'] = $Dependencia;
                            $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                        }
                        break;
                    case 503:
                        echo 'Erro 503';
                        break;
                    case 403:
                        echo 'Erro 403';
                        break;
                    case 401:
                        echo 'Erro 401';
                        $this->redirectLogin();
                        break;
                    default:
                        echo 'HTTP status of:' . $status_code;
                }
            }
        }
    }

    function redirectLogin() {

        global $pegaUrl;
        $_SESSION['validacao'] = 0;
        $url = $pegaUrl->fullUrl();
        $url = urlencode($url);
        $url = ($_SERVER['SERVER_NAME'] == "10.105.87.250" || $_SERVER['SERVER_NAME'] == "10.105.87.8") ? "https://cenopservicoscwb.intranet.bb.com.br/_tools/loginPortal.php?urlRetorno=" . "$url" : "https://login.intranet.bb.com.br/distAuth/UI/" . "Login?goto=$url";
        header("Location: $url");
        exit;
    }

    function redirectLogout() {
        global $pegaUrl;
        $tokenSSO = $_COOKIE["BBSSOToken"];
        $tokenACR = $_COOKIE["ssoacr"];
        if ($tokenSSO != null && $tokenACR != null) {
            $url = "http://" . $tokenACR . "/sso/identity/logout?subjectid=" . $tokenSSO;
            $xml = file_get_contents($url);

            // Retrieve HTTP status code
            list($version, $status_code, $msg) = explode(' ', $http_response_header[0], 3);

            // Check the HTTP Status code
            switch ($status_code) {
                case 200:
                    session_destroy();
                    // Success
                    //header( "Location: $url");
                    $url = $pegaUrl->fullUrl();
                    $url = urlencode($url);
                    $url = "https://login.intranet.bb.com.br/distAuth/UI/" . "Logout?goto=$url";
                    header("Location: $url");
                    break;
                default:
                    echo 'HTTP status of:' . $status_code;
            }
        } else if ($tokenSSO == null) {
            session_destroy();
            // Atual
            $url = $pegaUrl->fullUrl();
            $url = urlencode($url);
            $url = "https://login.intranet.bb.com.br/distAuth/UI/" . "Login?goto=$url";
            header("Location: $url");
            exit;
        }
    }

}

$pegaUrl = new Login();
?>
