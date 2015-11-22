<?php
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Crear directorios</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>

	<body>';
		include 'seguridad.php';
		include 'conexion.php'; 
		include 'menu_sup.php';
		include 'contenido.php';
		//si no se introduce un nombre de directorio para crear, se indica el mensaje de abajo
		if ( isset($_GET["nocrear"])){
		if ($_GET["nocrear"]=="si") echo "<script>alert('No ha indicado un nombre de directorio a crear')</script>";}
		
	echo'
	</body>
</html>';
?>