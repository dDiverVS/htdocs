<?php
echo '<!DOCTYPE html>
<html>
	<head>
	 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Ficheros del Usuario</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>
	<body bgcolor="#EFE4B0">';
		#Incluye el archivo de seguridad para mantener la sesion activa
		include 'seguridad.php';
		include 'conexion.php';
		
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		include 'contenido.php';
		echo '
	</body>
</html>';
?>