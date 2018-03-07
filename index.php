<?php 

/** Archivo que controla toda la web. 
* @ Index
**/ 
class Index
{
  /* URL recibida mediante GET */
  private $url;
  /* El dato recibido mediante GET */
  private $page;
  /* El controlador que se ejecutara segun el GET */
  private $controller;

  public function __construct($url)
  {
    // Ejecutamos el controlador
    $this -> url = $this -> limpiarURL($url); 
    $this -> ejecutarController($this -> url); 
  }

  public function limpiarURL($url){
    // Tranformamos todo a minusculas
    $url = strtolower($url);
 
    //Rememplazamos caracteres especiales latinos
    $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
    
    $repl = array('a', 'e', 'i', 'o', 'u', 'n');
 
    $url = str_replace ($find, $repl, $url);
 
    // Añadimos los guiones
    $find = array(' ', '&', '\r\n', '\n', '+');
    $url = str_replace ($find, '-', $url);
 
    // Eliminamos y Reemplazamos otros carácteres especiales
    $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
 
    $repl = array('', '-', '');
 
    $url = preg_replace($find, $repl, $url);
   
    return $url;
  }

  public function ejecutarController($page){
    // Obtenemos toda la información que necesitaremos desde core.php
    require_once('core/core.php'); 
    // Ejecutamos core
    $core = new Core();
    // Utilizamos nuestra variable interna.   
    $this -> page = $page;

    // Obtenemos la cantidad del dato.
    $cant = strlen($this -> page);
    if ($cant > 0) {
      // Si es mayor de 0 comprabamos que exista en la carpeta page.
      if (file_exists('controllers/page/'.$this -> page.'Controller.php')) {
        
        // Si el archivo existe lo requerimos.
        require_once('controllers/page/'.$this -> page.'Controller.php');

        // Asignamos nuestro controlador. 
        $this -> controller = $this -> page.'Controller';  

      // Si es mayor de 0 comprabamos que exista en la carpeta panel.  
      } else if (file_exists('controllers/panel/'.$this -> page.'Controller.php')) {
        
         // Si el archivo existe lo requerimos.
        require_once('controllers/panel/'.$this -> page.'Controller.php');

        // Asignamos nuestro controlador. 
        $this -> controller = $this -> page.'Controller'; 

      // Comprobamos y redireccionamos una lista negra al inicio.
      } else if ($this -> page == 'index' or $this -> page == 'index.php'){
        redirect('inicio');
      }else {
        require('controllers/error/error404Controller.php');
        $this -> controller = 'error404Controller';  
      }  
    } else if ($cant === 0 or $cant == ''){
        require_once('controllers/page/inicioController.php');
        $this -> controller = 'inicioController';
         // Caso de no tener datos lo redirigimos a inicio
        // redirect('inicio');
    } else {
        require('controllers/error/error404Controller.php');
        $this -> controller = 'error404Controller';  
    }
    $this -> host();
    $vista = new $this -> controller();
    $vista -> mostrar(); 
  }

  public function host(){
    // Obtenemos el Servidor , en caso de server local sera => http://localhost 
    $host= $_SERVER["HTTP_HOST"];

    // Obentenos la URL, ejemplo al ser inicio sera => /ancaor2017/inicio
    $url= $_SERVER["REQUEST_URI"];

    //Puede comprobarse descomentando la siguiente linea.
    //echo 'http:// - HOST => ' . $host . ' - URL => ' . $url . '</br>';
  }

  public function __destruct(){
    
  }
}

//Combrobamos si tiene algundato dato.
if (isset($_GET['page'])) {
  // Obtenemos la los datos de la URL por GET en este caso es "page" , revisar .htaccess para mas información.

  $index = new Index($_GET['page']);
} else {
  $index = new Index('');
}

basename(__FILE__);
/*
------------------ IMPORTANTE-------------------
funcion encriptar genera una string encriptado
unknown = plZzAWLSJwrMz3zVX+g0v1yvWQSF366m5BwTah//Hsc=+/0LPdc1>Nw==
echo encriptar("unknown")."</br>";
funcion desencriptar, genera la contraseña a partir de lo codificado por encriptar
echo desencriptar("plZzAWLSJwrMz3zVX+g0v1yvWQSF366m5BwTah//Hsc=+/0LPdc1>Nw==")."</br>";
*/


