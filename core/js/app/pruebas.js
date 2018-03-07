window.onload = function() {
	// __("ajaxlogin").innerHTML = DOMINIO;
}

function animation(data){
	if (data = 'blank') {
		if ((user == '' || user == 0) && (pass == 0 || pass == '')) {
			$("#user").animate({ marginLeft: "4px"},100, function(){
				$("#user").animate({ marginLeft: "0px" },100,function(){
					$("#user").animate({ marginLeft: "4px" },100,function(){
						$("#user").animate({ marginLeft: "0px" },100);
					});
				});
			});
			$("#pass").animate({ marginLeft: "-4px" },100, function(){
				$("#pass").animate({ marginLeft: "0px" },100,function(){
					$("#pass").animate({ marginLeft: "-4px" },100,function(){
						$("#pass").animate({ marginLeft: "0px" },100);
					});
				});
			});	
		}else if (user == '' || user == 0) {
				$("#user").animate({ marginLeft: "4px" },100, function(){
					$("#user").animate({ marginLeft: "0px" },100,function(){
						$("#user").animate({ marginLeft: "4px" },100,function(){
							$("#user").animate({ marginLeft: "0px" },100);
						});
					});
				});
		} else if (pass == '' || pass == 0){
			$("#pass").animate({ marginLeft: "4px" },100, function(){
				$("#pass").animate({ marginLeft: "0px" },100,function(){
					$("#pass").animate({ marginLeft: "4px" },100,function(){
						$("#pass").animate({ marginLeft: "0px" },100);
					});
				});
			});
		}
	}
}