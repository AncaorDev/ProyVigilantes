<?php 
// "nomProy":nomProy, 
// "descripProy":descripProy,
// "idDepa":idDepa,
// "idProv" : idProv,
// "idDist":idDist
// $action = $_POST['action'];
$datos = [];
// Registramos todas las variables Post
foreach($_POST as $nombre_campo => $valor){ 
   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
   $datos[$nombre_campo] = $valor;
   eval($asignacion); 
}
switch ($action) {
	case 'registrar':
		$response['msg'] = "Llego a registrar";
		$mProy = new proyectosModel();
		$rspProy = $mProy -> registrarProyecto($datos);
		$response['sql'] = $rspProy['sql'];
		$response['msg_html'] = $rspProy['msg-html'];
		$response['std_html'] = $rspProy['std-html'];
		$response['idProy'] = $rspProy['idProy'];
	break;
	
	case 'actualizar':
		$response['msg'] = "Llego a actualizar";
		$mProy = new proyectosModel();
		$rspProy = $mProy -> actualizarProyecto($datos);
		$response['sql'] = $rspProy['sql'];
		$response['msg_html'] = $rspProy['msg-html'];
		$response['std_html'] = $rspProy['std-html'];
	break;

	case 'eliminar':
		$response['msg'] = "Llego a eliminar HTML";
		$mProy = new proyectosModel();
		$rspProy = $mProy -> eliminarProyecto($datos);
		$response['sql'] = $rspProy['sql'];
		$response['msg_html'] = $rspProy['msg-html'];
		$response['std_html'] = $rspProy['std-html'];
	break;

	case 'editHTML':
		$response['msg'] = "Llego a editar HTML";
		$crudHTML = new crudHTML();
		$rsp = $crudHTML -> editarHtml($idProy,$code);
		$response['msg_html'] = $rsp['msg'];
		$response['std_html'] = $rsp['std'];

	break;

	case 'set_ai':
		$response['msg'] = "Llego a asignar Auto Increment";
		$mProy = new proyectosModel();
		$rspProy = $mProy -> setAutoIncrement($datos);
		$response['sql'] = $rspProy['sql'];
		$response['msg_html'] = $rspProy['msg-html'];
		$response['std_html'] = $rspProy['std-html'];

	break;


	default:
		$response['msg'] = "Default";
		$response['sql'] = "Error";
		$response['msg_html'] = "Error";
		$response['std_html'] = false;
	break;
}

echo json_encode($response);

?>

