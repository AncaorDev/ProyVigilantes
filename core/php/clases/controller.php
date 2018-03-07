<?php 
/*===========================================
   Controller
===========================================*/
/* 
Clase que se encarga de recibir los datos según eso mostrar sus vistas correspondientes 
con la información adecuada.
*/
class Controller {
/*  
	Leyenda de las variables
	$c => Carpeta.
	$p => Page.
	$dp => Datos de la Página.
	$dpn => Datos de la Página por el Nombre.	
	$mp => Modelo de la Página.
	$rsp => Respuesta de los Funciones Modelo.
	$v => Vista (Ruteado según Datos).
	$lp => Lista de páginas.
*/
private $c;
private $dp;
private $dpn;
private $mp;
private $rsp;
private $v;
private $det;
private $bd;
private $lp;

// Método constructor, la funcion se ejecutara al instanciarla.
public function __construct($c = "page",$bd = true) {
	$this -> bd = $bd;
	if ($this -> bd) {
		$this -> mp = new pageModel();
		$this -> lp = $this -> mp -> listaPage();
		$this -> v = new View();
		$this -> c = $c;
	} else {
		$this -> v = new View();
		$this -> c = $c;
	}
} 

/* Función Mostrar Página , 
 	Se requieren 3 datos : $c, $p y $dp.
*/
public function renderPage($p, $data = "post",$data2 = "") {
	try {
		if ($this -> bd) {
			$model = strtolower($data)."Model";
			$datamodel = new $model();
			$actlistadetalles = "listaDetalles".ucfirst($data);
			$listadetallesdata = $datamodel -> $actlistadetalles();			
			$this -> v -> renderPage($this -> c , $p , $this -> lp , $listadetallesdata);
		}	else {
			$this -> v -> renderPage($this -> c , $p);
		}
	} catch (Exception $e) {
		throw $e;
	}
}

/* Función Mostrar Página con un valor agregado, 
	Se requieren 3 datos : $c, $p y $dp.
*/
public function renderPageVar($p,$var) {
	try {
		$this -> v -> renderPageVar($this -> c , $p , $this -> dp,$var);	
	} catch (Exception $e) {
		throw $e;
	}
}

/* Función Mostrar los detalles de la Página , 
	Se requieren 
	Simpre llevara informacion de las paginas, accion que se puede desactivar
*/
public function renderById($m1,$d) {
	try {		
		$model = strtolower($m1)."Model";
		$datamodel = new $model();
		$det = 'listaDetalles'.ucfirst($m1).'ById';
		$dataById = $datamodel -> $det($d);
		if (isset($dataById['datos']['std'])) {
			redirect('panel/proyectos');
			//$dataById['datos']['error'];
		} else {
			if (count($dataById['datos']) > 0) {
				$this -> v -> renderById($this-> c, $m1,$dataById,$this -> lp);
			}else {
				redirect('panel/proyectos');
			}	
		}
	} catch (Exception $e) {
		throw $e;
	}
}

public function ConsulExisPage($page){
	try {
		$rsp = $this -> mp -> ConsulExisPage($page);
		return $rsp;				
	} catch (Exception $e) {
		throw $e;
	}

}

}
?>