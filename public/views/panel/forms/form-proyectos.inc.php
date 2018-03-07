<!-- method="post" action="panel/pages" -->
<form action="" id="form-proyectos" method="POST" class="form-horizontal form-label-left" novalidate>
  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Usuario: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <input id="user" class="form-control col-md-7 col-xs-12" disabled="" value="<?=$_SESSION['name_User']?>">
    </div>
  </div>
  <!-- /ITEM -->

  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Nombre del Proyecto <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
    <input id="nomProy" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,20" name="nompage" placeholder="Ingrese el nombre del proyecto" value="<?=isset($dataById['datos'][0]['nameProy']) ? $dataById['datos'][0]['nameProy'] : "" ?>" required="required" type="text">
    </div>
  </div>
  <!-- /ITEM -->

    <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Descripción del Proyecto <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
    <input id="descripProy" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,20" name="nompage" placeholder="Ingrese una corta descripción del proyecto" value="<?=isset($dataById['datos'][0]['descripProy']) ? $dataById['datos'][0]['descripProy'] : "" ?>" required="required" type="text">
    </div>
  </div>
  <!-- /ITEM -->

  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Departamento: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <select id="depa-select" class="form-control" data-validate-length="1" pattern="numeric" required>
        <option value="">Seleccione una Opción..</option>
        <?php foreach ($listadetallesdata['departamentos'] as $departamentos) {
          echo "Hola";
          if (isset($dataById)) {
            if ($departamentos[0] == $dataById['datos'][0]['idDepa']) {
              echo '<option value="'.$departamentos[0].'" selected>'.$departamentos[1].'</option>';
            } else {
              echo '<option value="'.$departamentos[0].'">'.$departamentos[1].'</option>';
            }
          }  else {
            echo '<option value="'.$departamentos[0].'">'.$departamentos[1].'</option>';
          }               
        }
        ?>            
      </select>
    </div>
  </div>
  <!-- /ITEM -->
  
  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Provincia: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <input type="hidden" id="valProv" value="<?=isset($dataById['datos'][0]['idProv']) ? $dataById['datos'][0]['idProv'] : "0" ?>">
      <select id="prov-select" class="form-control" data-validate-length="1" pattern="numeric" required>
        <option value="0">Seleccione primero un Departamento...</option>
      </select>
    </div>
  </div>
  <!-- /ITEM --> 
  
    <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Distrito: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
    <input type="hidden" id="valDist" value="<?=isset($dataById['datos'][0]['idDist']) ? $dataById['datos'][0]['idDist'] : "0" ?>">
      <select id="dist-select" class="form-control" data-validate-length="1" pattern="numeric" required>
        <option value="0">Seleccione primero una Provincia...</option>
      </select>
    </div>
  </div>
  <!-- /ITEM --> 

  <!-- ITEM -->
  <div id="div-enlace" class="item form-group" style="display:none;">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Enlace: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <input type="text" id="enlace" value="<?= isset($detallespagebyname) ? $detallespagebyname[0]['link_Pagina'] : "" ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,65" name="enlace" required="required" type="text">
    </div>
  </div>
  <!-- /ITEM -->
  <!-- USER -->
    <input id="iduser" type="hidden" value="<?=$_SESSION['id_User']?>">
  <!-- USER -->
  <!-- ACTION -->
  <input id="action" type="hidden" value="<?=isset($dataById) ? 'actualizar' : 'registrar'?>">
  <!-- /ACTION -->
  <!-- ID -->
  <input id="idProy" type="hidden" value="<?=isset($dataById['datos'][0]['idProy']) ? $dataById['datos'][0]['idProy'] : "0"?>">
  <!-- /ID -->
  <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-md-offset-3">
              <!-- <button type="reset" class="btn btn-primary">Cancel</button> -->
      <button id="btnenviar" type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Enviar </button>
      <button id="btncancelar" type="reset" class="btn btn-danger"> Cancelar </button>
    </div>
  </div>
</form>