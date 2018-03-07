<?php 
// Encriptación y desencriptación de Contraseña
function encriptar($cadena){
	$llave = "lidia";
	$len = base64_encode(strlen($cadena));
	$tamanio = strlen($llave);
	$key = substr(md5($llave),0,$tamanio); // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted."+/0LPdc1>".$len; //Devuelve el string encriptado
 
}
 
function desencriptar($cadena){
	$llave = "lidia";
	// $num = strstr($cadena,"<>");
	$cadena = strstr($cadena,"+/0LPdc1>",true);
	$tamanio = strlen($llave);
	$key = substr(md5($llave),0,$tamanio); // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}



