<?php namespace controllers\page;
/* ======================================================================
$dp => Datos o Informacion desde la BD a la Página, si $bd esta descativada no enviara nada
$ctr => Instancia de Controller 
$bd => Si necesita usar la Base de datos true, caso contrario false
$auth => autenticación (booleano)
====================================================================== */
use app\clases\View;
use app\clases\Controller;

class loginController extends Controller {
private $dp;
private $ctr;
private $bd; 
private $auth;
function __construct(){
	$this -> auth = false; // Si para el acceso necesita estar autenticado
	$this -> bd = false; // Si se usara la conexión a la base de Datos
	$this -> ctr = new Controller($bd = $this -> bd); // Ejecutamos una instancia hacia el controlador general
}

function index() { //Función que se jecuta al recibir una variable del tipo controlador
	if (parent::authenticate($this -> auth)) { // Aquí la vista en caso de que el acceso necesite autenticación
		if (isset($metodo)) { 
			if ($metodo != "") {
				$this -> subAcceso($metodo);
			} else {
				View::renderPage('error.404'); // Redirección en caso que no exista un metodo
			}
		} else { // Aquí en caso de que la vista sea publica 
			// ---- En esta parte el programador es libre de manejarlo a su manera //

			$datos = []; //creación de una variable array
			/* Usamos la instancia del controlador para extraer lo que deseamos 
				en {extractData} enviamos en nombre del modelo y lo que necesitamos
				std = estado actual de la tabla en la BD, información general, ejem extractData('phrase|std')
				count = nos mostrara el numero de datos encontrados
			*/
			View::renderPage('panel.login');

			// ---------------------------------------------------------------- //
		}
	} else {
		View::renderPage("error.unautorized");
	}
}

function subAcceso($dato){
	/* ******************************************************** 
	********************** Code for user **********************
	******************************************************** */

}
// End class
}
