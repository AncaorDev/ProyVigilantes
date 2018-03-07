<?php 
if ($_FILES) {
	$message['is_ok'] = false;
	if(isset($_FILES))
	{
		if(!$_FILES['file']['error'])
		{
			if(preg_match("/image/", $_FILES['file']['type']))
			{
				//$name = md5(rand(100, 200));
				$ext = explode('.', $_FILES['file']['name']);
				$extn = (count($ext))-1;
				$name = '';
				for ($i=0; $i < $extn; $i++) { 
					$name .= $ext[$i];
				}
				//$name = $ext[];
				$filename = $name . '.' . $ext[$extn];
				// Modifcar la ruta
				$destination = '../../../public/resources/images/' . $filename;
				$location = $_FILES["file"]["tmp_name"];
				move_uploaded_file($location, $destination);
				$message['url'] = '/public/resources/images/' . $filename; 
				$message['is_ok'] = true;
			}
			else
			{
				$message['error'] = 'El tipo de archivo no es una imagen';
			}
		}
		else
		{
			$message['error'] = "La imagen no se ha subido correctamente error(".$_FILES['file']['error'].")";
		}	
	}
	else
	{
		$message['error'] = "No se ha enviado ningun archivo";
	}
    echo json_encode($message);
} else {
	# code...
}
