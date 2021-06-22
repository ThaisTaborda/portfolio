<?php

class ValidaLogin2 {

    public function conecta() {
        
        $conexao1 = mysqli_connect("172.16.13.26", "udigital_trg", "TrgDgtl1915@", "digital_trg");
        //$conexao1 = mysqli_connect($servername, $username, $password, $db_name);
        if ($conexao1->connect_errno) {
            echo "<h1>Erro na conexão!</h1> <br>";
            echo "Erro: " . $conexao1->connect_error;
        } else {
            //echo "conectou! <br>";
            return $conexao1;
        }
    }

    public function validaLogin($matric) {

        $conexao = $this->conecta();
        $sql = "SELECT * FROM digital_trg.tb_login where matric = '$matric'";

        //echo $sql;
        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error());

        $row = mysqli_num_rows($resultado);
        if ($row > 0) {
//            echo "Nenhum resultado ";
        } else {
            //não tem acesso!
            $newURL = "https://cenopservicoscwb.intranet.bb.com.br/index.";
            //redireciona para outra página
            header('Location: '.$newURL.php);          
           
            die();
            
            
        }

        return $resultado;
    }

}
