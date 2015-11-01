<?php
echo '
<html>
	<head>
		<title>Renombrar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
	 //si no indica ni que fichero ni el nuevo nombre, es dirigido a esta pagina con este esto
		if ( isset($_GET["norenombrar"])){
  		if ($_GET["norenombrar"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un fichero para renombrar</font></h2>";}
 		if ( isset($_GET["norenombrar2"])){
        if ($_GET["norenombrar2"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un nombre nuevo para renombrar</font></h2>";}
		include 'seguridad.php';
		include 'conexion.php'; 
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		//Seleccion fichero/directorio a renombrar
		include 'contenido.php';
echo '
	</body>
</html>';
?>