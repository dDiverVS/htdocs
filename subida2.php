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
		echo "<table width='60%' border='0' align='center' cellspacing='0' cellpadding='2' class='fondotabla'><tr class='fondotabla' >";

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
		if ($upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY)) {
			echo "<tr class='fondotabla' ><td align='center'><font color='green'>Se ha subido </font>".$base_archivo." <font color='green'> correctamente</font></td></tr>";
		}else echo "<tr class='fondotabla' ><td align='center'><font color='red>No se ha subido </font>".$base_archivo." <font color='red'> correctamente. Compruebe que tiene permiso para subir.</font></td></tr>";
	}
}

	
?>
</table>
<p align="center">
<button class="link" onclick="window.location.href='/home.php'">Volver a Inicio</button>
<button class="link" onclick="window.location.href='/subida.php'">Volver a Subir</button>
</p>
</body>
</html>