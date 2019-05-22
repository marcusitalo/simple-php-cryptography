<?php
/*
	Classe para criptografar e descriptografar strings para a troca de mensagens
	Utilizando criptografia em base64,troca de caracteres especificos, inversão de caracteres ;	
	Autor: Marcus Italo
	Data:  29/06/2018	

*/

class Cryptography{	
	/* Array que armazena as chaves : valores */
	private static $privateKeys;	
	/*
	    The Base 64 Alphabet for $publicKeys		
		ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789+/
		
		Lista de caracteres para serem utilizados na chave pública, $publicKeys = array();
		
		Tamanho máximo do array $publicKeys 13 elementos.
	*/	
	protected $publicKeys = array(
		"a","B","c","D","E","f","G","H","1","2","3","4","5"
	);	
	/* 
		Caracteres que não são contemplados na conversão em base64 para subtituição e descaracterização da string em base64
		Os valores contidas na variavél $privateValues, não deverão ser altaredos, somente suas posições;
	*/
	private static $privateValues = array(
		"!","@","#","$","%","&","*","^","~","[","]","(",")"
	);
	public function __construct($publicKeys = array()) 
	{
		$this->publicKeys = (is_array($publicKeys) && isset($publicKeys))?$publicKeys:self::$publicKeys;
		self::$privateKeys = self::combineArrayKeyValue();
	}	
	//Função para inverter a ordem dos caracteres da String	
	public function reverseString($string)
	{
		return strrev($string);
	}
	//Função para remover par de iguais ("==") comum no final da criptografia em base 64
	public function lastPartEncrypt($string)
	{
		return str_replace("=","",$string);
	}
	//Função para inclusão de par de iguais ("==") para remontar a criptografia em base 64
	public function firstPartDecrypt($string)
	{
		return $string."==";
	}
	public function getPublicKeys()
	{
		return $this->publicKeys;
	}	
	//Função para combinar chave : valor 
	private function combineArrayKeyValue() 
	{ 
		$keycount 	= count($this->getPublicKeys()); 
		$valuecount = count(self::$privateValues); 
		$size 		= ($valuecount > $keycount) ? $keycount : $valuecount; 
		$keys 		= array_slice($this->getPublicKeys()    , 0, $size); 
		$values 	= array_slice(self::$privateValues		, 0, $size); 
		return array_combine($keys, $values); 
	}	
	//Função recebe uma string converte string::base64 em seguida, fazer a troca das ocorrências chave : valor contidas em $privateKeys, retornando uma string criptografada;
	protected function encrypt($string)
	{		
		$string = base64_encode($string);
		return self::lastPartEncrypt(str_replace(array_keys(self::$privateKeys),array_values(self::$privateKeys),self::reverseString($string)));
	}	
	//Função recebe uma string criptografada, fazendo a troca das ocorrências valor : chave contidas em $privateKeys em seguida transforma a string::base64 em string, retornando-a ;
	protected function decrypt($string)
	{
		$string = str_replace(array_values(self::$privateKeys),array_keys(self::$privateKeys),self::reverseString(self::firstPartDecrypt($string)));
		return base64_decode($string);		
	}
	// Função para exibir implementação e retorno das funções;
	public function showProcess($arrayPHP)
	{
		echo "<h5>Array PHP</h5>";
		print_r($arrayPHP);
		
		$jsonObject = json_encode($arrayPHP);
		echo "<h5>Json Object</h5>";
		print_r($jsonObject);
		
		$encrypt = self::Encrypt($jsonObject);
		echo "<h5>Criptografado</h5>";
		print_r($encrypt);
		
		$decrypt = self::decrypt($encrypt);
		echo "<h5>Descriptografado</h5>";
		print_r($decrypt);
				
		$arrayPHP = json_decode($decrypt,TRUE);
		echo "<h5>Array PHP</h5>";
		print_r($arrayPHP);
	}	
}