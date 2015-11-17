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

if (!empty($_FILES['archivo1'])) {
	$tamanototal=$_FILES['archivo1']['size'];
}
if (!empty($_FILES['archivo2'])) {
	$tamanototal=$tamanototal+$_FILES['archivo2']['size'];
}
if (!empty($_FILES['archivo3'])) {
	$tamanototal=$tamanototal+$_FILES['archivo3']['size'];
}

if ($tamanototal>=200*MB) {
	header('location:./subida.php?tamanototal=max');
	exit();
}

//si el array $_FILES["archivo"] contiene un nombre, osea,  se va a subir ningun fichero:
if ((empty($_FILES["archivo1"]["name"])) && (empty($_FILES["archivo2"]["name"])) && (empty($_FILES["archivo3"]["name"]))) header ("Location: subida.php?noarchivo=si ");
echo "<table width='80%' border='0' align='center' cellspacing='0' cellpadding='2' class='fondotabla'><tr class='fondotabla' >";

	if(!empty($_FILES["archivo1"]["name"])) 
   
	{
		//almacenamos el nombre temporal del archivo y su nombre y lo subimos a la carpeta actual
		$file = $_FILES["archivo1"]["tmp_name"];
		$base_archivo = basename($_FILES["archivo1"]["name"]);

		$upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY);
		//unset($_FILES["archivo1"]);
		if(empty($_FILES["archivo2"]["name"]) && empty($_FILES["archivo3"]["name"])) ftp_quit($conn);
			if ($upload==true) {echo "<tr class='fondotabla' ><td align='center'><font color='green'>Se ha subido </font>".$base_archivo." <font color='green'> correctamente</font></td></tr>";}
			else echo "<tr class='fondotabla' ><td align='center'><font color='red'>No se ha subido </font>".$base_archivo." <font color='red'> correctamente. Compruebe que tiene permiso para subir.</font></td></tr>";
	} 

if(!empty($_FILES["archivo2"]["name"]))
	{
		//almacenamos el nombre temporal del archivo y su nombre y lo subimos a la carpeta actual
		$file = $_FILES["archivo2"]["tmp_name"];
		$base_archivo = basename($_FILES["archivo2"]["name"]);

		$upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY);
		unset($_FILES["archivo2"]);
		if(empty($_FILES["archivo3"]["name"])) ftp_quit($conn);
			if ($upload==true){ echo "<tr class='fondotabla' ><td align='center'><font color='green'>Se ha subido </font>".$base_archivo." <font color='green'> correctamente</font></td></tr>";}
			else echo "<tr class='fondotabla' ><td align='center'><font color='red'>No se ha subido </font>".$base_archivo." <font color='red'> correctamente. Compruebe que tiene permiso para subir.</font></td></tr>";
	}

if(!empty($_FILES["archivo3"]["name"]))
	{
		//almacenamos el nombre temporal del archivo y su nombre y lo subimos a la carpeta actual
		$file = $_FILES["archivo3"]["tmp_name"];
		$base_archivo = basename($_FILES["archivo3"]["name"]);

		$upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY);
		unset($_FILES["archivo3"]);
		ftp_quit($conn);
			if ($upload==true){ echo "<tr class='fondotabla' ><td align='center'><font color='green'>Se ha subido </font>".$base_archivo." <font color='green'> correctamente</font></td></tr>";}
			else echo "<tr class='fondotabla' ><td align='center'><font color='red>No se ha subido </font>".$base_archivo." <font color='red'> correctamente. Compruebe que tiene permiso para subir.</font></td></tr>";
	
}
	

?>
</table>
<p align="center">
<button class="link" onclick="window.location.href='/home.php'">Volver a Inicio</button>
<button class="link" onclick="window.location.href='/subida.php'">Volver a Subir</button>
</p>
</body>
</html>