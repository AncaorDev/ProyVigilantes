<?php
/* ======================================================================
$c => Carpeta
$p => Página
$dp => Datos de la Página
$ctr => Instancia de Controller 
$bd => Si necesita usar la Base de datos true, caso contrario false
$auth => autenticación (booleano)
====================================================================== */
class proyectosController  extends Controller {
private $c;
private $p;
private $dp;
private $ctr;
// private $bd; 
private $auth;
function __construct(){
	$this -> c = "panel";
	$this -> p = "proyectos";
	$this -> auth = true;
	$this -> bd = true;
	$this -> ctr = new Controller($this -> c, $this -> bd);
}

function mostrar() {
	if ($this -> authenticate($this -> auth)) {
		if (isset($_GET['action'])) {
			if ($_GET['action'] != "") {
				$this -> subAcceso($_GET['action']);
			} else {
				redirect('');
			}
		} else {
			if (!Session::exists()) {
				redirect();
			} else {
				$this -> ctr -> renderPage($this -> p,'proyectos');
			}
		}
	} else {
		redirect('');
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

function subAcceso($e){
	if (isset($_GET['dato'])) {
		if ($_GET['dato'] != "") {
			$this -> ctr -> renderById('proyectos',$_GET['dato']);
		} else {
			redirect('panel/proyectos');
		}		
	} else {
		redirect('panel/proyectos');
	}
}

}
