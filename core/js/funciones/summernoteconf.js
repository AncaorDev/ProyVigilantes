// Activar Botón Guardar cambios , odificar la ruta
var urlphp = 'http://ancaorweb.com/core/php/';

$(document).ready(function(){
  $('#summernote').on('summernote.focus', function() {
    $("#btnGuardarCambios").removeClass("disabled");
    $("#msg").html("");
    // $( "#btnenlace" ).attr( "href", "" );
  });



$('#summernote').summernote({
  lang: 'es-ES',
  codemirror: { // codemirror options
    theme: 'monokai'
  },
  callbacks: {
    onImageUpload: function(files) {
    for(var i = 0; i < files.length; i++){
            SubirImagen(files[i]);
    }     
    }
  },
   popover: {
            image: [
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['custom', ['imageAttributes', 'imageShape']],
                ['remove', ['removeMedia']]
            ],
        },
});


 
  $("#btnGuardarCambios").click(function(){
    btncambios = document.getElementById('btnGuardarCambios');
    var gatb = btncambios.getAttribute("class");
    var ver = gatb.split(" ");
    for (var i = 0; i < ver.length; i++) {
      if (ver[i] == "disabled") {
        var guardar = false;
      } else {
        var guardar = true;
      }
    }
    $("#btnGuardarCambios").addClass("disabled");
    var nompage = $('#nomeditpage').val();
    var html = $('#summernote').summernote('code');  
    if (guardar) { 
       EnviarData(html,nompage);
    } 
  });
});

// Powered https://github.com/summernote/summernote/issues/72
function SubirImagen(file) {
  if(file.type.includes('image')) {
      var name = file.name.split(".");
      name = name[0];  
      var data = new FormData();
      data.append('file', file);
      $.ajax({
        url: urlphp + 'subir.php',
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'JSON',
        data: data,
        success: function (response) 
        {
          if(response.is_ok)
          {
            $('#summernote').summernote('insertImage', response.url, name);
          }
          else
          {
            console.log(response.error);
          }
        }
      })
      .fail(function(e) {
        console.log(e);
      });
    }
    else
    {
      alert("El tipo de archivo que intentaste subir no es una imagen");
    }
}




function EnviarData(html,nompage) {
  var data = {"phtml" : html, "nompage": nompage};
   $.ajax({
        url: urlphp + 'creardata.php',
        type: 'POST',
        // contentType: false,
        // cache: false,
        // processData: false,
        dataType: 'JSON',
        data: data,
        success: function (response){
          if(response.std) {
           console.log(response.expage,response.ex,'estado pagina:',response.stdpage);
           $("#msg").html(response.stdpage);
         }
          else{
            console.log(response.error);
          }
        }
      }).fail(function(e) {
        console.log(e);
      });
}