<?php

function getUserLogin() {
    $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    $command = exec('wmic /node:"' . $hostname . '" computersystem get username', $displayInfo);
    $arrayInfo = explode("\\", $displayInfo[1]);
    return $arrayInfo;
}

$display = getUserLogin();
//echo "Domínio: " . $dominio = $display[0];
//echo "<br>Usuário: " . $user = $display[1];
