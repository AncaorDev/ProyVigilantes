console.log($('#nompage').val());
// Modificar la ruta
var urlphp = 'http://worldphp.com/core/php/';
var urlajax = 'http://worldphp.com/ajax.php';
var loading,carga,inicio,enlace, guardar;
loading = '<div class="progress">';
loading += '<div class="progress-bar" style="width: 60%;"></div>';
loading += '</div>';

carga = '<i class="fa fa-circle-o-notch fa-spin"></i> Cargando';
warning = '<i class="fa fa-warning"></i> Error';
inicio = '<i class="fa fa-paper-plane"></i> Enviar';
guardar = '<i class="fa fa-paper-plane"></i> Guardar';
// $( document ).ajaxStart(function() {
//   alert('Se llamo a ajax');
// });
function cambioBtn(vHTML){

	if (vHTML.match(/Cargando/)) {
		var remove = 'btn-warning'; 
		var add = 'btn-success';

	} else if (vHTML.match(/Enviar/)) {
		var remove = 'btn-warning'; 
		var add = 'btn-success';

	} else if (vHTML.match(/Error/)) {
		var remove = 'btn-success'; 
		var add = 'btn-warning';
	} else {
		var remove = 'btn-success'; 
		var add = 'btn-warning';
	}

	$("#btnenviar").html(vHTML).removeClass(remove).addClass(add);
	// console.log(remove , add , vHTML);
}

function TipoPage(){
	var tipopage = $("#tipopage").val();
	if (tipopage == 1) {
		$("#enlace").attr("disabled","disabled");
		$("#div-enlace").hide();
	} else if (tipopage == 2){
		$("#div-enlace").show();
		$("#enlace").removeAttr("disabled");
		$("#enlace").focus(function(){
			cambioBtn(inicio);
		});
	}
	return tipopage;
}

function DataActual(){
	var URLactual = window.location.href;
	var arrayURL = URLactual.split("/");
	for (var i = 0; i < arrayURL.length; i++) {
		if (arrayURL[i] == "inicio") {
			var btn = document.getElementById('btnenviar');
			var inputName = document.getElementById('nompage');
			var inputTpage = document.getElementById('tipopage');
			btn.classList.add('disabled');
			inputName.setAttribute('disabled','disabled');
			inputTpage.setAttribute('disabled','disabled');
		}
	}
}

function UrlActual(){
	var URLactual = window.location.href;
	var arrayURL = URLactual.split("/");
	for (var i = 0; i < arrayURL.length; i++) {
		if (arrayURL[i] == "edit") {
			var action = "Edit";
			break;
		} else if (arrayURL[i] == "delete") {
			var action = "Delete";
			break;
		} else {
			var action = "Registrar";
		}
	}
	return action;
}


$(document).ready(function(){
	DataActual()
	var formcrear = '<div class="panel panel-primary">';
  	formcrear += '<div class="panel-heading">'
    formcrear += '<h3 class="panel-title">Mensaje</h3>';
    formcrear += '</div>';
  	formcrear += '<div class="panel-body">';
    formcrear += 'Se mostrara la página o datos en cuanto se guarden los cambios o actualice la página'
    formcrear += '</div></div>';


	$("#actCambios").click(function(){
		var tipopage = $("#tipopage").val();
		if (tipopage == 1) {
			$("#enlace").attr("disabled","disabled");
			$("#div-enlace").hide();
			console.log('Cambios si es a una interna');
			$('#myModal').modal('hide');
			$("#enlace").attr("disabled","disabled");	
			$("#divLink").html(formcrear);
		} else if (tipopage == 2){
			console.log("Cambios si es a una externa");
			$("#myModal").modal('hide');
			// $('#summernote').summernote('disable');
			$('#contentsummer').hide();
			$('#summernote').summernote('destroy');
			$('#summernote').hide();
			$("#div-enlace").show();
			$("#enlace").removeAttr("disabled");
			$("#enlace").focus(function(){
				cambioBtn(inicio);
			});
		}
	});

	var ini = TipoPage();
	console.log(ini);	
	
	$("#enlace").focus(function(){
		cambioBtn(inicio);
		$("div").remove(".alert");	
	});
	$("#tipopage,#nompage").focus(function(){
		cambioBtn(inicio);
		$("div").remove(".alert");		
	});

	var action = UrlActual().toLowerCase();
	console.log(action);	
	console.log($('#nompage').val());	
	if (action == "edit") { 
		$("#tipopage").change(function(){
			var tipopage = $("#tipopage").val();
			console.log("Entro a edit, el ini es : "+ini+" El tipo page es: "+tipopage);
			if (ini != tipopage) {
				console.log("El ini no es igual al tipo page");
				if (tipopage == 1) {
				$("#msgModal").html("¿Desea convertir a esta pagina en un enlace interno?")
				$('#myModal').modal('show');
				} else if (tipopage == 2){
						$("#msgModal").html("¿Desea convertir a esta pagina en una enlace externo? <br> Tenga en cuenta que se eliminara la página y todo su contenido")
						$("#myModal").modal('show');
						$("#enlace").val("");
						console.log($("#nompage").val());
				}
			} else {
				console.log("El ini es igual al tipo page");
				if (tipopage == 1) {
					$('#myModal').modal('hide');
					$('#summernote').summernote();
					$('#contentsummer').show();
					$("#div-enlace").hide();
				} else if(tipopage == 2) {
					$("#div-link").html("Error");	
				}
			}
		});
	} else if (action == "registrar") {
		$("#tipopage").change(function(){
		TipoPage();
		});
	}


$("#formdata").submit(function(){
	console.log($('#nompage').val());
	if ($('#nompage').val() == 'Inicio') {
		alert('La página Inicio no puede ser modificada');
		return false;
	} else {
		cambioBtn(warning);
		var user, nompage, iduser,link;
		user = $("#user").val();
		nompage = $("#nompage").val();
		datapage = nompage.toLowerCase();
		iduser = $("#iduser").val();
		tipopage = $("#tipopage").val();
		nomeditpage = $("#nomeditpage").val();
		if (tipopage == 1) {
			link = "vacio";
		} else if (tipopage == 2){
			link = $("#enlace").val();
		}
		datos = {"nompage" : nompage, "datapage": datapage , "iduser": iduser , "tipopage": tipopage, "link": link, "action" : action, "nomeditpage" : nomeditpage};
			if ((nompage != '' || nompage != 0) && (tipopage != 0 || tipopage != '')  && (link  != '' || link != 0)) {
				$("#progress").show();
				// $("#progress").html("<p>Creando Controlador</p>");
				$("#btnenviar").html(carga);
				var elem = document.getElementById("barra-estado"); 
				elem.style.width = '0%';
	  			var width = 0;
				var nuevoSet = setInterval(progress,10);
	       		function progress(){
		          if (width == 100) {
		            clearInterval(nuevoSet);   
		          } else {
		            elem.style.width = width + '%';
		            width++;
		          } 
		        };
				setTimeout(function(){ajaxdata(datos)},2000);	
			}
	return false;}
});


// 
$("#formproyect").submit(function(){
	user = $("#user").val();
	nompage = $("#nompage").val();
	datapage = nompage.toLowerCase();
	iduser = $("#iduser").val();
	tipopage = $("#tipopage").val();
	nomeditpage = $("#nomeditpage").val();
	datos = {"nompage" : nompage, "datapage": datapage , "iduser": iduser , "tipopage": tipopage, "link": link, "action" : action, "nomeditpage" : nomeditpage};
	
	if ((nompage != '' || nompage != 0) && (tipopage != 0 || tipopage != '')  && (link  != '' || link != 0)) {
		$("#progress").show();
		// $("#progress").html("<p>Creando Controlador</p>");
		$("#btnenviar").html(carga);
		var elem = document.getElementById("barra-estado"); 
		elem.style.width = '0%';
	  	var width = 0;
		var nuevoSet = setInterval(progress,10);
	    function progress(){
		    if (width == 100) {
		        clearInterval(nuevoSet);   
		    } else {
		        elem.style.width = width + '%';
		        width++;
		    } 
		};
			setTimeout(function(){ajaxdata(datos)},2000);	
	}
	return false;
});
	

//

});


function ajaxdata(datos){
if (datos.action == "edit") {
	var actionP = "modificarPage";
} else if (datos.action == "registrar") {
	var actionP = "registrarPage";
}
$.ajax({
	url:urlajax+'?mode='+actionP,
	type:'POST',
	dataType: 'json',
	data:datos,
	success: function(response){
		if (response.estado) {
		console.log(response.page,response.xform,response.stdexis,response.datapage,response.stdSql);
		// si xform =  true mostrar error dejar form
			
		if (response.xform) {					
			$("#progress").hide();
			$("#btnenviar").html(warning).removeClass('btn-success').addClass('btn-warning');				
			$("#mensaje").html(response.mensaje);
		
		} else {
			// false es ocultar el form y success
			$("#progress").hide();
			$("#formdata").hide('slow');				
			$("#mensaje").html(response.mensaje);
		}
		var time = 5;
		var timeSet = setInterval(timeRegresiva,1000);
		function timeRegresiva(){
		    if (time < 0) {
		            clearInterval(timeSet);   
		    } else {
		            document.getElementById('tred').innerHTML = time;
		            time--;
		    } 
		};
		
		setTimeout(function(){
		console.log("redirect?");	
		var URLactual = window.location.href;
		window.location=URLactual;},5000)
		}else {
			response.error;
		}
	}
}).fail(function(e) {
        console.log(e);
});
}