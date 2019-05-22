<?php

include_once "lib/Cryptography.php";

echo "<h3 style='background:gray;color:white;text-align:center;'>Default</h3>";
$arrayPHP = array('nome'=>'Marcus Italo');
$instance = new Cryptography();
$instance->showProcess($arrayPHP);

unset($instance);

echo "<h3 style='background:gray;color:white;text-align:center;'>Custom</h3>";
//Chave menor do que a esperada

$newPublicKey = array("1","2","3","4","5","6","7","8","9");
echo "<h5>Array Public Key Custom</h5>";
print_r($newPublicKey);
$instance = new Cryptography($newPublicKey);
$instance->showProcess($arrayPHP);

unset($instance);

