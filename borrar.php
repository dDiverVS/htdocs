<?php
echo '
<html>
	<head>
		<title>Eliminar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
		// Si no se selecciona un fichero, salta el siguiente texto
		if ( isset($_GET["noborrar"])){
		if ($_GET["noborrar"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un fichero para eliminar</font></h2>";}
		if ( isset($_GET["ficheronovacio"])){
		if ($_GET["ficheronovacio"]=="si") echo "<h2 align='center'><font color='red'>El fichero elegido no est&aacute; vacio</font></h2>";}
		include 'seguridad.php';
		include 'conexion.php';
		
		
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		include 'contenido.php';
		//Seleccion de fichero a eliminar
echo '
	</body>
</html>';
?>