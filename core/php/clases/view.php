<?php 
	class View {	
		public function __construct(){
					
		}
		public function renderPage($c,$p,$listapage = "",$listadetallesdata = "", $listapersonalizada = ""){
			$datos = $listadetallesdata;
			if (file_exists('public/views/'.$c.'/'.$p.'.phtml')) {
				include 'public/views/'.$c.'/'.$p.'.phtml';
			} else {
				echo "No se ha encontrado la vista";
			}
			
		}

		public function renderPageVar($c,$p,$dp,$var){
			$datos = $this -> data;
			$statustable = $this -> tablepage;
			$detallespage = $dp;
			$view = $p;
			$tipospagina = $this -> tp;
			include RUTE.'public/views/'.$c.'/'.$p.'.phtml';
		}

		public function renderdatapage($type,$view,$datospages,$datosproyecto){
			$datospages = $datospages;
			// $datosproyecto = $datosproyecto;
			include RUTE.'public/views/'.$type.'/detalle-'.$view.'.phtml';
			//$controller = get_class($controller);
			
		}
		public function renderById($c,$m1,$dataById,$listapage) {
			$namedet = "detalles".ucfirst(strtolower($m1))."ById";
			$$namedet = $dataById;
			$listadetallesdata = $dataById;
			if (count($dataById)>0) {
				if (file_exists('public/views/'.$c.'/edit/'.strtolower($m1).'-edit.phtml')) {
				include 'public/views/'.$c.'/edit/'.strtolower($m1).'-edit.phtml';
				} else {
					print("No se encontró la Vista");
				}
			} else {
				redirect(HOME.$m1);
			}
		}
	}
 ?>