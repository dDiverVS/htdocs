<?php
echo '
<html>
	<head>
		<title>Subir ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
	
		include 'seguridad.php';
		include 'conexion.php'; 
	
		//Enlaces para acceder a diferentes opciones
		<include 'menu_sup.php';

//si el array $_FILES["archivo"] contiene un nombre, osea,  se va a subir ningun fichero:
	if(!empty($_FILES["archivo"]["name"]))
	{
		//almacenamos el nombre temporal del archivo y su nombre y lo subimos a la carpeta actual
		$file = $_FILES["archivo"]["tmp_name"];
		$base_archivo = basename($_FILES["archivo"]["name"]);


		$upload = ftp_put($conn, $base_archivo, $file, FTP_BINARY);
		unset($_FILES["archivo"]);
		ftp_quit($conn);

	}
		//si no se ha indicado un fichero para subir, se redirecciona al usuario a la pagina de subida.php
	else {header ("Location: subida.php?noarchivo=si ");
	}

	//si la subida del fichero es exitosa, se le indica al usuario con un texto afirmativo.En caso contrario, se le comunica con un texto de error	
	if ($upload==true) {
			echo "<h2 align='center'><font color='green'>El fichero <strong><font color='black'>".$base_archivo." </font></strong> se ha subido correctamente</font></h2>";
	} 
	else { 
			echo "<h2 align='center'><font color='red'>El fichero <font color='black'>".$base_archivo."</font> no se ha subido</font></h2> ";
	}

?> 

</body>
</html>