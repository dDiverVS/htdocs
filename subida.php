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
		include 'contenido.php';
		//si no se ha indicado un fichero para subir, el usuario es reenviado aquí con el siguiente texto:
		if ( isset($_GET["noarchivo"])){
		if ($_GET["noarchivo"]=="si") echo "<script>alert('No ha indicado un fichero para subir')</script>";
		}
		//Si el total de subidas supera el limite, aparecerá el siguiente mensaje:
		if ( isset($_GET["tamanototal"])){echo"<script>alert('Capacidad de subida superada')</script>";}
echo'
	</body>	
</html>';
?>