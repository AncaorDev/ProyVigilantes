<?php
  require('core/core.php');
  $core = new Core();
  if ($_POST) {  
    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
      case 'auth':
        require('core/php/funciones/auth.php');
      break;
      case 'obtener':
        require('core/php/funciones/obtener.php');
      break;
      case 'cudProyecto':
        require('core/php/funciones/cudProyecto.php');
      break;   
    }
  } else {
    redirect();
  }


