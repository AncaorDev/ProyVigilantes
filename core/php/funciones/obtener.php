<?php 
$obtener = $_POST['obt'];
if ($obtener == "departamento") {
	$np = $_POST['idDepa'];
	$obtModel = new obtenerModel();
	$response['ldepa'] = $obtModel -> obtenerProvincia($np);
	$response['msg'] = "Llego a obtener.php y el ID del departamento es $np";
	echo json_encode($response);
} else if ($obtener == "provincia") {
	$np = $_POST['idDist'];
	$obtModel = new obtenerModel();
	$response['ldist'] = $obtModel -> obtenerDistrito($np);
	$response['msg'] = "Llego a obtener.php y el ID de la Provincia es $np";
	echo json_encode($response);
} else {
	# code...
}



?>