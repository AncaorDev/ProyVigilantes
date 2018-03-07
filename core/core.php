<?php 
/**
* 
*/
class Core {
private $http_host;
private $url;
function __construct() {
	$this -> ejecutar();
}
function ejecutar(){
	/* ---------------------------------------------------
	   Requerimos los datos que leen y escriben datos para 
	   el correcto funcionamiento del sistema.
	--------------------------------------------------- */
	require('core/php/funciones/readwritejson.php');
	/* ---------------------------------------------------
	   Requerimos las funciones necesarias
	--------------------------------------------------- */
	require('core/php/funciones/redirect.php');
	/* ---------------------------------------------------
		Obtenemos las variables de .dataconfig 
	--------------------------------------------------- */
	$datos = leerDatos();
	/* ---------------------------------------------------
		Obtenemos el host en la cual esta el proyecto
	--------------------------------------------------- */
	$this -> http_host = $_SERVER["HTTP_HOST"];
	$this -> url = 'http://'.$this -> http_host.'/vigilantes';
	/* ---------------------------------------------------
		Autoregistro de los modelos
	--------------------------------------------------- */
	spl_autoload_register( function( $NombreClase ) {
    	require_once 'model/'.$NombreClase . '.php';
	});
	/* ---------------------------------------------------
			Constantes del proyecto
	--------------------------------------------------- */
	DEFINE('HOST',$datos['HOST']); // <-- Dirección Host
	DEFINE('USER',$datos['USER']);  // <-- Nombre de Usuario 
	DEFINE('PASS',$datos['PASS']); // <-- Contraseña para acceso a la Base de Datos
	DEFINE('DBNAME',$datos['DBNAME']); // <-- Nombre de la Base de Datos
	DEFINE('HOME',$this -> url); // <-- URL principal
	DEFINE('FB_ID',$datos['FB_ID']); // <-- ID FB
	DEFINE('AUTHOR',$datos['AUTHOR']); // <-- Autor de la pagina
	DEFINE('BASE',(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'); //  <-- Dirección Vistas
	DEFINE('DIR_ROOT','/');  // <-- Direccion Root (General)
	DEFINE('COPY','Ancaor &trade;'.' 2015 - '.date('Y')); //<-- Copy Right
	DEFINE('DIR_LIBS','libs/');  // <-- Dirección de archivos HTML
	DEFINE('C_JS','core/js/'); // JS CORE
	DEFINE('C_PHP','core/php/'); // PHP CORE
	DEFINE('DIR_BS','libs/bootstrap/'); // BOOTSTRAP	
	DEFINE('DIR_RS','public/resources/'); // RESOURCES
	DEFINE('VIEWS','public/views/'); // <-- VIEWS
	DEFINE('IMAGE','public/resources/images/'); // <-- IMAGES
	DEFINE('DATE',date('d-Y-m')); // Fecha Servidor 


	/* ---------------------------------------------------
		Enviamos los datos para Javascript
	--------------------------------------------------- */
	$datosjs = ["URL" => $this -> url ];
	// escribirDatos($datosjs);
	//Extensión .html o .htm
	DEFINE('EXT','phtml');
	/* ---------------------------------------------------
		Archivos necesario
	--------------------------------------------------- */
	// require('core/php/funciones.php');
	// require('libs/view.php');
	// require('libs/session/session.php');
	// require('libs/controller/ControllerConf.php');
	// require('libs/controller/controllerView.php');
	require('core/php/clases/gestionBD.php');
	require('core/php/clases/controller.php');
	require('core/php/clases/session.php');
	require('core/php/clases/view.php');
	require('core/php/clases/crudHTML.php');
	require('core/php/funciones/renderHTML.php');
	require('core/php/funciones/funciones.php');
	//URLS 
	DEFINE('URL_PANEL',$this -> url.'panel/');
	DEFINE('URL_OTHER',$this -> url.'other/');	
	Session::init();
	}
}
// echo __FILE__;