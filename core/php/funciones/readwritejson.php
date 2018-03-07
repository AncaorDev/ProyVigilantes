<?php 

function leerDatos() {
	//Leemos el archivo JSON
	$datajson = file_get_contents("config/.dataconfig");

	// Decodificamos los datos
	$infohost = json_decode($datajson);

	$arr = get_object_vars($infohost);
	// foreach ($infohost as $key => $value) {
	// 	$arr[$key] = $value;
	// }
	// print_r($arr);
	// echo $arr['HOST']."</br>";
	return $arr;
} 

function escribirDatos($datos){
	// 
	$ruta = "config/usedjs.json";
	$rutaabierta = fopen($ruta, "w+");
	if ($rutaabierta) {		
		fwrite($rutaabierta , json_encode($datos));
		print("Información Agregada</br>");
	} else {
		echo "Error de archivo";
	}
}

function escribirColores($ids){
	$datos = 'var regiones = {"d200":"1","d26":"2",';
	$contador = count($ids);
	for ($i=0; $i <= $contador-2; $i++) { 
		$datos .= '"d'. $ids[$i][0] .'" : "3",'; 
	}
	$datos .= '"d'.$ids[$contador-1][0].'":"3"}';
	$ruta = "public/resources/js/colores.mapa.js";
	$rutaabierta = fopen($ruta, "w+");
	if ($rutaabierta) {		
		fwrite($rutaabierta , $datos);
		// print("Información Agregada</br>");
	} else {
		echo "Error de archivo";
	}	
}

function escribirProyectos($depas){


	$datos = 'var projects = {';
	$contador = count($depas);
	for ($i=0; $i <= $contador-2; $i++) { 
		$datos .= '"'. $depas[$i]['idDepa'] .'" : "Proyecto : '.$depas[$i]['nameProy'].'",'; 
	}
	$datos .= '"d'.$depas[$contador-1][0].'":"3"}';
	$ruta = "public/resources/js/proyectos.mapa.js";
	$rutaabierta = fopen($ruta, "w+");
	if ($rutaabierta) {		
		fwrite($rutaabierta , $datos);
		// print("Información Agregada</br>");
	} else {
		echo "Error de archivo";
	}	
}
