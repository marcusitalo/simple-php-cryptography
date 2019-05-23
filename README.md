# simple-php-cryptography
Classe PHP para criptografar e descriptografar strings, utilizando array de caracteres personalizados;

## Instalação 

- Incluir class Cryptography.php que está na pasta lib

`include_once "lib/Cryptography.php";`

## Como usar 
- Instanciar Classe 

`$instance = new Cryptography();`

- Utilizar a Função encrypt passando como parâmetro uma string:

`$stringEncrypt = $instance->encrypt("… e a resposta para tal complexidade existencial é simplesmente “42”")`

- Retorno da Função Encrypt:

`echo $stringEncrypt; // dCo4yQDnAKOIlRnbl12clxGctl2cgk6wgwWYpNmblR3cphXZgUGZhRWa4VGbw12bjBCbhRHIhJXYwBSY0N3bwNXZyBSYgUGImCo4`

- Utilizar a Função decrypt passando como parâmetro a string criptografada:

`$stringDecrypt = $instance->decrypt($stringEncrypt);`

- Retorno da Função Decrypt:

`echo $stringDecrypt; // "… e a resposta para tal complexidade existencial é simplesmente “42”"`

## Utilizando Chaves Personalizadas

- Array de caracteres para substituição durante criptografia:

-- Caracteres Permitidos: ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789+/

--Tamanho máximo do array $publicKeys 13 elementos.

`$newPublicKey = array("1","2","3","4","5","6","7","8","9");`

- Instanciar Classe passando o novo array

`$instance = new Cryptography($newPublicKey);`

- Utilizar a Função encrypt passando como parâmetro um json que será criptografado:

`$stringEncrypt = $instance->encrypt('{"nome":"Marcus Italo","telefone":"(85) 987654321","email":"marcusitalo@email.com.br"}');`

- Retorno da Função Encrypt:

`echo $stringEncrypt; // 0nIyJmLt~@YuwWah!WZA~GbhRXazV#YyFWbiojIslWYtVmIsISMyMDN!YzN$kDIpUDOoIiOiUmbvZWZsVGdiwiIvxWY0lEIzV#YyFWTiojIl!@buJye`

- Utilizar a Função decrypt passando como parâmetro a string criptografada:

`$stringDecrypt = $instance->decrypt($stringEncrypt);`

- Retorno da Função Decrypt:

`echo $stringDecrypt; // {"nome":"Marcus Italo","telefone":"(85) 987654321","email":"marcusitalo@email.com.br"}`
 
