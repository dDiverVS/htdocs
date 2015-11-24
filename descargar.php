<?php
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Descargar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>

	<body>';
	//si no indica ni que fichero ni el nuevo nombre, es dirigido a esta pagina con este esto
	
	//Incluye el archivo de seguridad para mantener la sesion activa
	include 'seguridad.php';
	include 'conexion.php';
	include 'menu_sup.php';
	include  'contenido.php';
	if ( isset($_GET["descarga"])){
	if ($_GET["descarga"]=="incorrecta") echo "<script>alert('No puede descargar el fichero')</script>";}
		
	echo '
	</body>
</html>';
?>