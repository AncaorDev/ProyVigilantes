$("document").ready(function(){
	$(".eliminar").click(function(){
		var parent = $(this).parent().attr('id');
		var name = $("#"+parent).attr('data');
		eliminar(name);
	});
	$("#btnincnum").click(function(){
		var num = document.getElementById("aicr").value;
		$.confirm({
	    title: 'Mensaje!',
	    content: '¿Esta seguro que desea asignar : '+num+' como nuevo autoincrement?',
	    type: 'dark',
    	typeAnimated: true,
    	icon: 'fa fa-spinner fa-spin',
    	closeIcon: true,
    	closeIconClass: 'fa fa-close',
    	theme: 'supervan',
	    buttons: {
	        aceptar: {
	        	btnClass: 'btn-blue',
	        	action : function(){
	       			ainc(num);
	        	}
	        },
	        cancelar: {
	            btnClass: 'btn-red',
	        	action : function(){
	       			
	        	}
	        }
	    }
		});	
	});

	$("#btnincauto").click(function(){
		var num = 1;
		$.confirm({
	    title: 'Mensaje!',
	    content: 'El AUTO_INCREMENT se asignara autmaticamente',
	    type: 'dark',
    	typeAnimated: true,
    	icon: 'fa fa-spinner fa-spin',
    	closeIcon: true,
    	closeIconClass: 'fa fa-close',
    	theme: 'supervan',
	    buttons: {
	        aceptar: {
	        	btnClass: 'btn-blue',
	        	action : function(){
	       			ainc(num);
	        	}
	        },
	        cancelar: {
	            btnClass: 'btn-red',
	        	action : function(){
	       			
	        	}
	        }
	    }
		});	
	});
	
});

function ainc(num) {
	data = {"num": num}
	$.ajax({
		url: urlajax+'?mode=setAI',
		type: 'POST',
		dataType: 'json',
		data: data,
		success : function(response){
			if (response.std) {
				console.log(response.num);
				$("#mensajeDP").html(response.msg);
			} else {
				console.log("Error");
			}
			var time = 3;
			var timeSet = setInterval(timeRegresiva,1000);
			function timeRegresiva(){
			    if (time < 0) {
			        clearInterval(timeSet);   
			    } else {
			        document.getElementById('aiset').innerHTML = time;
			        time--;
			    } 
			};		
			setTimeout(function(){
			console.log("redirect?");	
			var URLactual = window.location.href;
			window.location=URLactual;},3000)
		}
	}).fail(function(e){
		console.log(e)
	});
}

function eliminar(nompage) {
	dato = {"nompage": nompage }
	$.ajax({
	url: urlajax+'?mode=eliminarPage',
	type: 'POST',
	dataType: 'json',
	data:dato,
	success: function(response){
		alert("Eliminado Correctamente");
		var URLactual = window.location.href;
		window.location=URLactual;
		}
	}).fail(function(e){
		console.log(e)
	});
}



