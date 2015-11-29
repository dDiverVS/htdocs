
<?php
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Descargar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
		<script type="text/javascript" src="jscript/utiles.js"> </script>
	</head>

	<body>';
	
	//Incluye el archivo de seguridad para mantener la sesion activa
	include 'seguridad.php';
	include 'conexion.php';
	include 'menu_sup.php';
	include  'contenido.php';
	//Si la descarga  no se ha producido, por tema de permisos principalmente:
	if ( isset($_GET["descarga"])){
	if ($_GET["descarga"]=="incorrecta") echo "<script>alert('No puede descargar el fichero')</script>";}
		
	echo '
	</body>
</html>';
?>
