<?php
/* ======================================================================
$c => Carpeta
$p => Página
$dp => Datos de la Página
$ctr => Instancia de Controller 
$bd => Si necesita usar la Base de datos true, caso contrario false
$auth => autenticación (booleano)
====================================================================== */
class @dato@Controller  extends Controller {
private $c;
private $p;
private $dp;
private $ctr;
// private $bd; 
private $auth;
function __construct(){
	$this -> c = "page";
	$this -> p = "@dato@";
	$this -> auth = @auth@;
	$this -> bd = true;
	$this -> ctr = new Controller($this -> c, $this -> bd);
}

function mostrar() {
	if ($this -> authenticate($this -> auth)) {
		if (isset($_GET['subpage'])) {
			if ($_GET['subpage'] != "") {
				$this -> subAcceso($_GET['subpage']);
			} else {
				redirect('@dato@');
			}
		} else {
			$this -> ctr -> renderPage($this -> p);
		}
	} else {
		redirect('@dato@');
	}
}

function authenticate($acceso){
	if ($acceso) {
		$sesion = Session::exists();
		if ($sesion) {
			if (isset($_SESSION['session'])) {
				if (($_SESSION['session'] == "yes")) {
					return true;
				} 
			}
		} 
	} else {
		return true;
	}
}

function subAcceso($subpage){
	// Insertar Code
}

}
