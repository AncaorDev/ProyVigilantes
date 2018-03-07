<?php 		
function renderInclude($archivo){
	$name = md5(base64_encode($archivo.'.inc')).".html";
	$files = fopen("storage/views/$name", "w+" );
	$content = file_get_contents("public/views/includes/$archivo.inc.php");
	$buscar = array("@files" , "@endfiles");
	$reemplazar = array("<!--FILES-JS-->" , "<!--END-FILES-JS-->");
	$content = str_replace($buscar , $reemplazar, $content);
	fwrite($files, $content);
	fclose($files);
	include ("storage/views/$name");
}