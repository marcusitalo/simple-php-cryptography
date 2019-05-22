<?php

include_once "lib/Cryptography.php";

$string = '… e a resposta para tal complexidade existencial é simplesmente “42”';

$instance = new Cryptography();
$stringEncrypt = $instance->encrypt($string);
$stringDecrypt = $instance->decrypt($stringEncrypt);
echo("String : ".$string."<br/>");
echo("String Encrypt : ".$stringEncrypt."<br/>");
echo("String Decrypt : ".$stringDecrypt."<br/><br/>");

$arrayPHP = array('nome'=>'Marcus Italo','telefone'=>'(85) 987654321','email'=>'marcusitalo@email.com.br');
$jsonObject = json_encode($arrayPHP);

$stringEncrypt = $instance->encrypt($jsonObject);
$stringDecrypt = $instance->decrypt($stringEncrypt);
echo("Json : ".$jsonObject."<br/>");
echo("Json Encrypt : ".$stringEncrypt."<br/>");
echo("Json Decrypt : ".$stringDecrypt."<br/><br/>");

unset($instance);
//Chaves Personalizada 
$newPublicKey = array("1","2","3","4","5","6","7","8","9");

$instance = new Cryptography($newPublicKey);
$stringEncrypt = $instance->encrypt($string);
$stringDecrypt = $instance->decrypt($stringEncrypt);
echo("String : ".$string."<br/>");
echo("String Encrypt custom keys : ".$stringEncrypt."<br/>");
echo("String Decrypt custom keys  : ".$stringDecrypt."<br/><br/>");

$stringEncrypt = $instance->encrypt($jsonObject);
$stringDecrypt = $instance->decrypt($stringEncrypt);
echo("Json : ".$jsonObject."<br/>");
echo("Json Encrypt custom keys : ".$stringEncrypt."<br/>");
echo("Json Decrypt custom keys : ".$stringDecrypt."<br/><br/>");

unset($instance);
		