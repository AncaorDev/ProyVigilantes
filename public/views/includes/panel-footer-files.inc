
<script src="<?=HOME?>core/js/funciones/funciones.js"></script>
<script src="<?=HOME?>core/js/app/pruebas.js"></script>
<!-- Bootstrap -->
<script src="<?=DIR_LIBS?>bootstrap/js/bootstrap.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?=DIR_RS?>panel/js/custom.min.js"></script>

<!-- include codemirror (codemirror.css, codemirror.js, xml.js, formatting.js) -->
<link rel="stylesheet" type="text/css" href="<?=DIR_LIBS?>codemirror/codemirror.css">
<link rel="stylesheet" type="text/css" href="<?=DIR_LIBS?>codemirror/monokai.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css">
<script type="text/javascript" src="<?=DIR_LIBS?>codemirror/codemirror.js"></script>
<script type="text/javascript" src="<?=DIR_LIBS?>codemirror/xml.js"></script>
<script type="text/javascript" src="<?=DIR_LIBS?>codemirror/formatting.js"></script>
<!-- include summernote css/js-->
<link href="<?=DIR_LIBS?>summernote/summernote.css" rel="stylesheet">
<script src="<?=DIR_LIBS?>summernote/summernote.js"></script>
<script src="<?=DIR_LIBS?>summernote/lang/summernote-es-ES.js"></script>
<script src="<?=DIR_LIBS?>summernote/plugin/img/summernote-image-attributes.js"></script>
<script src="/core/js/funciones/summernoteconf.js"></script>

<script type="text/javascript" src="<?=DIR_LIBS?>validator/validator.js"></script>

<script src="<?=HOME?>core/js/funciones/registrodata.js"></script>
<script src="<?=HOME?>core/js/funciones/modificardata.js"></script>
<script src="<?=HOME?>core/js/funciones/auth.js"></script>


<!-- validator -->
<script>
// initialize the validator function
validator.message.date = 'not a real date';
// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
$('form')
  .on('blur', 'input[required], input.optional, select.required', validator.checkField)
  .on('change', 'select.required', validator.checkField)
  .on('keypress', 'input[required][pattern]', validator.keypress);
  $('.multi.required').on('keyup blur', 'input', function() {
    validator.checkField.apply($(this).siblings().last()[0]);
  });
 </script>
<!-- /validator -->
