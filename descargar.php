<?php
echo '
<html>
	<head>
		<title>Descargar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
	//si no indica ni que fichero ni el nuevo nombre, es dirigido a esta pagina con este esto
	if ( isset($_GET["nodescargar"])){
	if ($_GET["nodescargar"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un fichero para descargar</font></h2>";}
		
	//Incluye el archivo de seguridad para mantener la sesion activa
	include 'seguridad.php';
	include 'conexion.php';
	
		//Enlaces para acceder a diferentes opciones
	
	include 'menu_sup.php';
	include  'contenido.php';
	echo '
	</body>
</html>';
?>