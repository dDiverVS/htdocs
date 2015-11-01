<?php
echo '
<html>
	<head>
		<title>Crear directorios</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
		//si no se introduce un nombre de directorio para crear, se indica el mensaje de abajo
		if ( isset($_GET["nocrear"])){
		if ($_GET["nocrear"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un nombre de directorio a crear</font></h2>";}
		include 'seguridad.php';
		include 'conexion.php'; 
		include 'menu_sup.php';
		include 'contenido.php';
	echo'
	</body>
</html>';
?>