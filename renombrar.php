<?php
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Renombrar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css"/>
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>
	<body>';
		include 'seguridad.php';
		include 'conexion.php'; 
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		//Seleccion fichero/directorio a renombrar
		include 'contenido.php';
if ( isset($_GET["norenombrar2"])){
        if ($_GET["norenombrar2"]=="si") echo "<script>alert('Nombre indicado no permitido')</script>";}
echo '

	</body>

</html>';

?>