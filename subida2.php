

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Subir ficheros</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/estilo.css"
      rel="stylesheet" type="text/css">
      <link rel="icon" type="image/ico" href="img/favicon.ico" />
</head>

<body bgcolor="#EFE4B0">
<?php #Incluye el archivo de seguridad para mantener la sesion activa
	include 'seguridad.php'; ?> 
	<!--Logotipo-->
	<p align="center"><a href="inicio.php"> <img src="img/logo.png" title="Volver a Inicio" width="400" height="100" alt="Volver a Inicio"> </a></p>

	<!--Usuario actual y cierre de sesion-->
<?php echo'	
		<table width="15%" border="1" align="right" cellspacing="0" cellpadding="0">
			<tr>
				<td><div align="center">
					USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b></br></br>
					<a href="cerrar.php" class="button"/>Cerrar Sesion</a></br>
				</td>
			</tr>
		</table>';?>
	</br></br>	</br></br>	</br></br>
<!--Enlaces para acceder a diferentes opciones-->
	<table width="30%" border="0" align="center" cellspacing="0" cellpadding="0">
		<tr>
			<td><div align="center">
				<a href="subida.php" class="button"/><span class="add">Subir Fichero</span></a></div>
			</td>
			<td><div align="center">
				<a href="borrar.php" class="button"/>Borrar</a></div>
			</td>
			<td><div align="center">
				<a href="renombrar.php" class="button"/>Renombrar</a></div>
			</td>
			<td><div align="center">
				<a href="crear.php" class="button"/>Crear Directorio</a></div>
			</td>
			<td><div align="center">
				<a href="descargar.php" class="button"/>Descargar</a></div>
			</td>
		<tr>
	</table>
<hr />
<?php


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
else {header ("Location: subida.php?noarchivo=si ");}

//si la subida del fichero es exitosa, se le indica al usuario con un texto afirmativo.En caso contrario, se le comunica con un texto de error	
if ($upload==true) {
		echo "<h2 align='center'><font color='green'>El fichero <strong><font color='black'>".$base_archivo." </font></strong> se ha subido correctamente</font></h2>";} 
	else { 
		echo "<h2 align='center'><font color='red'>El fichero <font color='black'>".$base_archivo."</font> no se ha subido</font></h2> ";}


			





?> 

</body>
</html>