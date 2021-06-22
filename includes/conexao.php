<?php

class Conexao {

   
    public function conecta() {

        global $servername, $username, $password, $db_name;
        $conexao1 = mysqli_connect("172.20.0.33", "oficios_upload", "jH^IQ5jT", "jud_oficios_upload");
        $conexao1->set_charset("utf8");
        //$conexao1 = mysqli_connect($servername, $username, $password, $db_name);
        if ($conexao1->connect_errno) {
            echo "<h1>Erro na conexão!</h1> <br>";
            echo "Erro: " . $conexao1->connect_error;
        } else {
          //  echo "conectou! <br>";
            return $conexao1;
        }
    }

//----------------Conexões Local Testes-------------------------------------------------------------------------------
    public function conectaLocal() {


        $conexao1 = mysqli_connect("localhost", "root", "", "test");
        //$conexao1 = mysqli_connect($servername, $username, $password, $db_name);
        if ($conexao1->connect_errno) {
            echo "<h1>Erro na conexão!</h1> <br>";
            echo "Erro: " . $conexao1->connect_error;
        } else {
           // echo "conectou! <br>";
            return $conexao1;
        }
    }

    public function qListaContaPorFunciTeste($strDataInicial, $strDataFinal) {
        //global $conexao1;
        $conexao3 = $this->conectaLocal();
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
//        $sql = "SELECT * FROM test.aof where data BETWEEN " . $strDataInicIal . "AND " . $strDataFinal .
//                " AND funci ='. $funci . '";

        $sql = "SELECT funci, count(distinct aof) as total_aof FROM test.aof where data between  '$strDataInicial' and '$strDataFinal'  group by funci";

        echo $sql;
        $resultado = mysqli_query($conexao3, $sql) or die(mysqli_error());

        $row = mysqli_num_rows($resultado);
        if (!$row > 0) {
            echo "Nenhum resultado ";
        } else {
            //$dados = mysqli_fetch_array($resultado);
            echo "retornou a array do banco de dados ";
        }

        return $resultado;
    }

    public function conecta2() {

        global $servername, $username, $password, $db_name;

        $conexao1 = mysqli_connect($servername, $username, $password, $db_name);
        if ($conexao1->connect_errno) {
            echo "<h1>Erro na conexão!</h1> <br>";
            echo "Erro: " . $conexao1->connect_error;
        } else {
            echo "conectou! <br>";
            return $conexao1;
        }
    }

    public function qListaTodos() {
        //global $conexao1;
        $conexao3 = $this->conectaLocal();
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
        $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas";
        $resultado = mysqli_query($conexao3, $sql) or die(mysql_error());

        return $resultado;
    }

    public function qListaFunci() {
        //global $conexao1;
        $conexao3 = $this->conectaLocal();
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
        $sql = "SELECT * FROM funci";
        $resultado = mysqli_query($conexao3, $sql);

        return $resultado;
    }

    public function qListaUmFunci($matricula) {
        //global $conexao1;
        $conexao3 = $this->conectaLocal();
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
        $sql = "SELECT * FROM funci";
        $resultado = mysqli_query($conexao3, $sql);

        return $resultado;
    }

    public function qListaPorData($strDataInicial, $strDataFinal) {
        //global $conexao1;
        $conexao3 = $this->conectaLocal();
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
        $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas where data BETWEEN " + $strDataInicIal + "AND" + $strDataFinal;
        $resultado = mysqli_query($conexao3, $sql);

        return $resultado;
    }


//------------------consultas detalhaLista.php----------------------------------------------
    
    public function qListaAofFunci($matricula, $strDataInicial, $strDataFinal) {
        //global $conexao1;
        //$conexao3 = $this->conectaLocal();
        $conexao3 = $this->conecta();
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
        $sql = "SELECT aof, gsv, nome, tribunal, classe, txtweb, hora, diretorio "
                . " FROM jud_oficios_upload.tb_arq_pdf "
                . " where funci='$matricula' and "
                . " date_format(hora, '%Y-%m-%d') between '$strDataInicial' and '$strDataFinal' order by aof";
        $resultado = mysqli_query($conexao3, $sql);
        
        

        return $resultado;
    }
    
     public function qListaGsvFunci($matricula, $strDataInicial, $strDataFinal) {
        //global $conexao1;
        //$conexao3 = $this->conectaLocal();
        $conexao3 = $this->conecta();
        
     
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
        $sql = "SELECT gsv, aof, status, hora FROM jud_oficios_upload.tb_gsv "
                . "where funci = '$matricula' and date_format(hora, '%Y-%m-%d') between '$strDataInicial' and '$strDataFinal' "
                . "order by aof desc";
        $resultado = mysqli_query($conexao3, $sql);

        return $resultado;
    }
    
    

//--------------------consultas da página index.php (antiga profile)--------------------------
    //conta AOF por funci Funci_profile
    public function qNome($matricula) {
       
        $conexao3 = $this->conecta();       
       
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
        $sql = "SELECT matric,nome, hashcode FROM jud_oficios_upload.tb_equipe_trg1 where matric = '$matricula'";
        $resultado = mysqli_query($conexao3, $sql);
        

        return $resultado;
    }
    
    public function qListaAofPorData($funci, $strDataInicial, $strDataFinal) {
        //global $conexao1;
        //$conexao3 = $this->conectaLocal();
        $conexao3 = $this->conecta();
        
        $sql = "select date_format(hora, '%Y-%m-%d') as dataaof, count(distinct aof) as aoftotal"
                . " FROM jud_oficios_upload.tb_arq_pdf "
                . "where funci = '$funci' and date_format(hora, '%Y-%m-%d') "
                . "between '$strDataInicial' and '$strDataFinal' "
                . "group by date_format(hora, '%Y-%m-%d') ";      
     
        
         $resultado = mysqli_query($conexao3, $sql);      
       
         
        return $resultado;
    }
    public function qListaAofPorFunciTotal($funci, $strDataInicial, $strDataFinal) {
        //global $conexao1;
        //$conexao3 = $this->conectaLocal();
        $conexao3 = $this->conecta();
        // $sql = "SELECT * FROM digital_trg.tb_triagem_prod_sas LIMIT 10";
        $sql = "select count(distinct aof) as aoftotal"
                . " FROM jud_oficios_upload.tb_arq_pdf "
                . "where funci = '$funci' and date_format(hora, '%Y-%m-%d') between '$strDataInicial' and '$strDataFinal' ";
        
        $resultado = mysqli_query($conexao3, $sql);
               

        return $resultado;
    }

    public function qListaGsvPorFunci($funci, $strDataInicial, $strDataFinal) {
        //global $conexao1;
        //$conexao3 = $this->conectaLocal();
        $conexao3 = $this->conecta();
      
        $sql = "SELECT date_format(hora, '%Y-%m-%d') as datagsv, count(distinct gsv) as gsvtotal 
        FROM jud_oficios_upload.tb_gsv
        where funci = '$funci' and date_format(hora, '%Y-%m-%d') 
        between '$strDataInicial' and '$strDataFinal' group by date_format(hora, '%Y-%m-%d')";
        $resultado = mysqli_query($conexao3, $sql);      
        

        return $resultado;
    }
     
    
    public function qListaGsvPorFunciTotal($funci, $strDataInicial, $strDataFinal) {
        //global $conexao1;
        //$conexao3 = $this->conectaLocal();
        $conexao3 = $this->conecta();
     
        $sql = "SELECT count(distinct gsv) as gsvtotal "
                . "FROM jud_oficios_upload.tb_gsv where funci = '$funci' and date_format(hora, '%Y-%m-%d') "
                . "between '$strDataInicial' and '$strDataFinal' ";
        
        
        $resultado = mysqli_query($conexao3, $sql);

        return $resultado;
    }

    public function fechaConn() {
        $mysqli->close();
    }

}
