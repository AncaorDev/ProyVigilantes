<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
  <nav>
  <div class="nav toggle">
    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
  </div>
  <ul class="nav navbar-nav navbar-right">

    <!-- NAV-BAR-USER -->
    <li class="">
      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <img src="<?=IMAGE?>wolf.png" alt=""><?=$_SESSION['name_User'];?>
        <span class=" fa fa-angle-down"></span>
      </a>
      <ul class="dropdown-menu dropdown-usermenu pull-right">
        <li><a href="javascript:;">Perfil</a></li>
        <li>
        <a href="javascript:;">
          <span class="badge bg-red pull-right">50%</span>
          <span>Configuración</span>
        </a>
        </li>
        <li><a href="javascript:;">Ayuda</a></li>
        <li><a id="logout"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
      </ul>
    </li>
    <!-- /NAV-BAR-USER -->
    <!-- NOTIFICACIONES -->
    <li role="presentation" class="dropdown">
      <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-envelope-o"></i>
        <span class="badge bg-green">1</span>
      </a>
      <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
        <li>
          <a>
            <span class="image"><img src="<?=DIR_RS?>images/mio.jpg" alt="Profile Image" /></span>
            <span>
              <span>Ancaor</span>
              <span class="time">hace 3 minutos</span>
            </span>
            <span class="message">
              Mensaje de prueba.
            </span>
          </a>
        </li>
      </ul>
    </li>
    <!--/ NOTIFICACIONES -->
     <!-- NOTIFICACIONES -->
    <li role="presentation" class="dropdown">
      <a>
        Limite de la Sesión: <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Se cerrara la sesión si no hay actividad en el tiempo definido"></i> <span id="tduracion" data="<?=$_SESSION['duracion']?>" class="label label-primary bg-green">  </span> 
      </a>
    </li>
    <!--/ NOTIFICACIONES -->
  </ul>
  </nav>
  </div>
</div>
<!-- /top navigation -->