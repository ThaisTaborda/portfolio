
<?php
session_start();

/*error_reporting(0);
ini_set('display_errors', 0 );*/

$path = $_SERVER['DOCUMENT_ROOT'];



if (!$_SESSION['UsuarioWeb'] == NULL) {
    $usuario = $_SESSION['UsuarioWeb'];
    $usuarioGuerra = $_SESSION['NomeGuerra'];
    $uor = $_SESSION['UOR'];
}else {
    //se não está logado redirecionar login para página do cenop serviços
   
    $newURL = "https://cenopservicoscwb.intranet.bb.com.br/index.";
    //redireciona para outra página
    header('Location: ' . $newURL . php);

    die();
}



