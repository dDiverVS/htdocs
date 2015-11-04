<?php
$max_upload = (int)(ini_get('upload_max_filesize'));
$max_post = (int)(ini_get('post_max_size'));
$memory_limit = (int)(ini_get('memory_limit'));
$upload_mb = min($max_upload, $max_post, $memory_limit);
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Subir ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>

	<body bgcolor="#EFE4B0">';
	
		include 'seguridad.php';
		include 'conexion.php'; 
	
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
$x=0;
//Opcion a modificar para controlar el tamaño total de las subidas
/*if (($_FILES["archivo1"]["size"] + $_FILES["archivo2"]["size"] + $_FILES["archivo3"]["size"]) > $upload_mb){ header ("Location: subida.php?tamano=si ");}
else{*/
//si el array $_FILES["archivo"] contiene un nombre, osea,  se va a subir ningun fichero:
if ((empty($_FILES["archivo1"]["name"])) && (empty($_FILES["archivo2"]["name"])) && (empty($_FILES["archivo3"]["name"]))) header ("Location: subida.php?noarchivo=si ");

	if(!empty($_FILES["archivo1"]["name"]))
	{
		//almacenamos el nombre temporal del archivo y su nombre y lo subimos a la carpeta actual
		$file = $_FILES["archivo1"]["tmp_name"];
		$base_archivo = basename($_FILES["archivo1"]["name"]);

		$upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY);
		unset($_FILES["archivo1"]);
		if(empty($_FILES["archivo2"]["name"]) && empty($_FILES["archivo3"]["name"])) ftp_quit($conn);
			if ($upload==true) $x++;
	}

if(!empty($_FILES["archivo2"]["name"]))
	{
		//almacenamos el nombre temporal del archivo y su nombre y lo subimos a la carpeta actual
		$file = $_FILES["archivo2"]["tmp_name"];
		$base_archivo = basename($_FILES["archivo2"]["name"]);

		$upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY);
		unset($_FILES["archivo2"]);
		if(empty($_FILES["archivo3"]["name"])) ftp_quit($conn);
			if ($upload==true) $x++;
	}

if(!empty($_FILES["archivo3"]["name"]))
	{
		//almacenamos el nombre temporal del archivo y su nombre y lo subimos a la carpeta actual
		$file = $_FILES["archivo3"]["tmp_name"];
		$base_archivo = basename($_FILES["archivo3"]["name"]);

		$upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY);
		unset($_FILES["archivo3"]);
		ftp_quit($conn);
			if ($upload==true) $x++;
	}
//}
	//si la subida del fichero es exitosa, se le indica al usuario con un texto afirmativo.En caso contrario, se le comunica con un texto de error	
	if ($x!==0) {
			echo "<h2 align='center'><font color='green'>Se han subido ".$x." ficheros correctamente</h2>";
	} 
	else { 
			echo "<h2 align='center'><font color='red'>No se ha subido ningún fichero, inténtelo de nuevo</h2> ";
	}

?> 

</body>
</html>