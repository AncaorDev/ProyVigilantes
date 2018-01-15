<?php namespace controllers\page;
/* ======================================================================
$dp => Datos o Informacion desde la BD a la Página, si $bd esta descativada no enviara nada
$ctr => Instancia de Controller 
$bd => Si necesita usar la Base de datos true, caso contrario false
$auth => autenticación (booleano)
====================================================================== */
use app\clases\View;
use app\clases\Controller;
use app\clases\Functions;
class panelController extends Controller {
private $dp;
private $ctr;
private $bd; 
private $auth;
function __construct(){
	$this -> auth = true; // Si para el acceso necesita estar autenticado
	$this -> bd = false; // Si se usara la conexión a la base de Datos
	$this -> ctr = new Controller($bd = $this -> bd); // Ejecutamos una instancia hacia el controlador general
}

function index() { //Función que se ejecuta al recibir una variable del tipo controlador
	if (parent::authenticate($this -> auth)) { // Aquí la vista en caso de que el acceso necesite autenticación
		if (isset($metodo)) { 
			if ($metodo != "") {
				$this -> subAcceso($metodo);
			} else {
				redirect('login'); // Redirección en caso que no exista un metodo
			}
		} else { // Aquí en caso de que la vista sea publica 
			// ---- En esta parte el programador es libre de manejarlo a su manera //
			View::renderPage('panel.login');
			// ---------------------------------------------------------------- //
		}
	} else {
		Functions::redirect('login'); // Redirección en caso que no exista un metodo
	}
}

function subAcceso($dato){
	/* ******************************************************** 
	********************** Code for user **********************
	******************************************************** */

}

// Fin class
}
