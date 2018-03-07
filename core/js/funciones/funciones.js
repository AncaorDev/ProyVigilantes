function __(id){
	return document.getElementById(id);
}
function url(componente){
	if (componente == "completa") {
		var componente = window.location;
		return componente;
	} else if (componente == "dominio") {
		var componente = window.location.host;
		return componente;
	} else if (componente == "pathname") {
		var componente = window.location.pathname;
		return componente;
	}	
} 
var URL = url("completa");
var DOM = url("dominio");
var DOMINIO = "http://" + url("dominio") + "/";
var PATHNAME  = url("pathname");