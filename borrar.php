<?php
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Eliminar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>

	<body>';
		include 'seguridad.php';
		include 'conexion.php';
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		include 'contenido.php';
		//Seleccion de fichero a eliminar
		// Si no se selecciona un fichero, salta el siguiente texto
		if ( isset($_GET["noborrar"])){
		if ($_GET["noborrar"]=="si")  echo "<script>alert('No ha indicado un fichero para eliminar')</script>";}
		
echo '
	</body>
</html>';
?>