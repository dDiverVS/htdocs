<?php
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Subir ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>

	<body bgcolor="#EFE4B0">';
		//si no se ha indicado un fichero para subir, el usuario es reenviado aqui con el siguiente texto:
		if ( isset($_GET["noarchivo"])){
			

		if ($_GET["noarchivo"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un fichero para subir</font></h2>";}
		if ( isset($_GET["tamano"])){
		if ($_GET["tamano"]=="si") echo "<h2 align='center'><font color='red'>Capacidad de subida superada</font></h2>";}
		
		include 'seguridad.php';
		include 'conexion.php';
		
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		include 'contenido.php';
	
?>