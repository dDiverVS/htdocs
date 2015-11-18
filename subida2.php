<?php
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Subir ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>

	<body>';
	
		include 'seguridad.php';
		include 'conexion.php'; 
	
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		define('MB', 1048576);

//Opcion a modificar para controlar el tamaño total de las subidas
$tamanototal=0;
for ($x=0; $x < 10; $x++) {
	if (!empty($_FILES['archivo'.$x])) {
		$tamanototal=$tamanototal+$_FILES['archivo'.$x]['size'];
	}
}

if ($tamanototal>=200*MB) {
	header('location:./subida.php?tamanototal=max');
	exit();
}
if ($tamanototal==0) {
	header ("Location: subida.php?noarchivo=si ");
	exit();
}

//si el array $_FILES["archivo"] contiene un nombre, osea,  se va a subir ningun fichero:
$correcto=0;
for ($x=0; $x < 10; $x++) { 
	if(!empty($_FILES["archivo".$x]["name"])) {
		//almacenamos el nombre temporal del archivo y su nombre y lo subimos a la carpeta actual
		$file = $_FILES["archivo".$x]["tmp_name"];
		$base_archivo = basename($_FILES["archivo".$x]["name"]);
		if (!$upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY)) {
			$correcto=1;
		}
	}
}
if ($correcto==0) {
	//Angel aquí lo que sea si funcionan todas las subidas
}
else {
	//Aquí lo que sea si falla alguna subida
}
	
?>
</table>
<p align="center">
<button class="link" onclick="window.location.href='/home.php'">Volver a Inicio</button>
<button class="link" onclick="window.location.href='/subida.php'">Volver a Subir</button>
</p>
</body>
</html>