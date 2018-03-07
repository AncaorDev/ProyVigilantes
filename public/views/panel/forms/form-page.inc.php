<!-- method="post" action="panel/pages" -->
<form action="" id="formdata" method="POST" class="form-horizontal form-label-left" novalidate>
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
      Título de la Página <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
    <input id="nompage" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,20" name="nompage" placeholder="Ingrese el título de la página" value="<?=isset($listadetallesdata['datos'][0]['name_Page']) ? $listadetallesdata['datos'][0]['name_Page'] : "" ?>" required="required" type="text">
    </div>
  </div>
  <!-- /ITEM -->
  
  <!-- ITEM -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
      Tipo de Pagina: <span class="required">*</span>
    </label>
    <div class="col-md-5 col-sm-5 col-xs-12">
      <select id="tipopage" class="form-control" data-validate-length="1" pattern="numeric" required>
        <option value="">Seleccione una Opción..</option>
        <?php foreach ($listadetallesdata['attributepage'] as $tipospagina) {
          if (isset($detallespagebyname)) {
            if ($tipospagina[0] == $detallespagebyname[0]['id_TipoPagina']) {
              echo '<option value="'.$tipospagina[0].'" selected>'.$tipospagina[1].'</option>';
            } else {
              echo '<option value="'.$tipospagina[0].'">'.$tipospagina[1].'</option>';
            }
          }  else {
            echo '<option value="'.$tipospagina[0].'">'.$tipospagina[1].'</option>';
          }               
        }
        ?>            
      </select>
    </div>
  </div>
  <!-- /ITEM -->
     
     <!-- ITEM -->
          <div id="div-enlace" class="item form-group" style="display:none;">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Enlace: <span class="required">*</span></label>
             <div class="col-md-5 col-sm-5 col-xs-12">
             <input type="text" id="enlace" value="<?= isset($detallespagebyname) ? $detallespagebyname[0]['link_Pagina'] : "" ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,65" name="enlace" required="required" type="text">
            </div>
          </div>
        <!-- /ITEM -->

        <!-- USER -->
          <input id="iduser" type="hidden" value="<?=$_SESSION['id_User']?>">

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <!-- <button type="reset" class="btn btn-primary">Cancel</button> -->
              <button id="btnenviar" type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Enviar </button>
            </div>
          </div>
</form>