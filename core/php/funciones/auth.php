<?php
if ($_POST) {
	if ($_POST['action'] == "login") {
	$error = '<div class="alert alert-dismissible alert-danger">';
	$error .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	$error .= '<strong>ERROR, Datos no Validos</strong></div>';

	$success = '<div class="alert alert-dismissible alert-success">';
	$success .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	$success .= '<strong> <i class="fa fa-spinner fa-spin"></i> REDIRECCIONANDO <span class="display:none;" id="redirectl"></span></strong></div>';

	$warning = '<div class="alert alert-dismissible alert-warning">';
	$warning .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	$warning .= '<strong>ERROR INTERNO</strong></div>';

	$logModel = new loginModel();
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	if ($_POST['sesion'] == "true") {
		$sesion = true;
	} else if ($_POST['sesion'] == "false"){
		$sesion = false;
	}

	$result = $logModel -> login($user,$pass,$sesion);
	$mensaje['estadosql'] = $result['stdsql'];
	$mensaje['duracion'] = $result['duracion'];
	$mensaje['ses'] = $sesion;
	if ($result['msg'] == 1) {
		$mensaje['std']	= true;
		$mensaje['msg']	= $success;
	} else  if ($result['msg'] == 0){
		$mensaje['std']	= false;
		$mensaje['msg']	= $error;
	} else {
		$mensaje['std']	= false;
		$mensaje['msg']	= $warning;
	}
	echo json_encode($mensaje);
	} elseif ($_POST['action'] == "logout"){
		Session::init();
		Session::destroy();
		$mensaje['estadosql'] = false;
		$mensaje['duracion'] = false;
		$mensaje['ses'] = false;
		$mensaje['std']	= true;
		$mensaje['msg']	= "Cerrando Sesión";
		echo json_encode($mensaje);
	}
} else {
	echo "ERROR = > Acceso no autorizado";
}
