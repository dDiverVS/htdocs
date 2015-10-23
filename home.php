<?php
echo '
<html>
	<head>
		<title>Ficheros del Usuario</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>
	<body bgcolor="#EFE4B0">';
		#Incluye el archivo de seguridad para mantener la sesion activa
		include 'seguridad.php';
		include 'conexion.php';
		//Logotipo
		echo'
		<p align="center"><a href="home.php"> <img src="img/logo.png" title="Volver a Inicio" width="400" height="100" alt="Volver a Inicio"> </a></p>
		<table width="15%" border="1" align="right" cellspacing="0" cellpadding="0">
			<tr>
				<td><div align="center">
					<p>USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b></p><br/>
					<a href="cerrar.php" class="button"/>Cerrar Sesion</a><br/>
				</div></td>
			</tr>
		</table>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>';
		//Enlaces para acceder a diferentes opciones
		echo '
		<table width="30%" border="0" align="center" cellspacing="0" cellpadding="0">
			<tr>
				<td><div align="center">
					<a href="subida.php" class="button"/>Subir Fichero</a></div>
				</td>
				<td><div align="center">
					<a href="borrar.php" class="button"/>Borrar</a></div>
				</td>
				<td><div align="center">
					<a href="renombrar.php" class="button"/>Renombrar </a></div>
				</td>
				<td><div align="center">
					<a href="crear.php" class="button"/>Crear Directorio</a></div>
				</td>
				<td><div align="center">
					<a href="descargar.php" class="button"/>Descargar</a></div>
				</td>
			<tr>
		</table>
		<br/>
		<b>El directorio actual es </b>'.$_SESSION["carpeta_actual"].'
		<table width="69%" border="1" align="center" cellspacing="0" cellpadding="0">
			<tr>
				<td width="30%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
				<td width="20%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
				<td width="20%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></td>
				<td width="30%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
			</tr>';
		
		$lista=ftp_nlist($conn,$_SESSION['carpeta_actual']); #Devuelve un array con los nombres de ficheros
		foreach ($lista as $objeto) {
			#Se leen todos los ficheros y directorios del directorios
			$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
			#Obtiene tamaño de archivo y lo pasa a KB
			if($tamano=="-0.00 Kb") # Si es -0.00 Kb se refiere a un directorio
			{
				$tipo="directorio";
				$objeto="<i><a href='chdir.php?carpeta_actual=$objeto'>".$objeto."</a></i>";
				$tamano="&nbsp;";
				$fecha="&nbsp;";
			}
			else {
				$tipo="fichero";
				$fecha=date("d/m/y h:i:s", ftp_mdtm($conn,$objeto));
				#Filemtime obtiene la fecha de modificacion del fichero; y date le da el formato de salida
			}
			echo '
			<tr>
				<td>
					'.$objeto.'
				</td>
				<td>
					'.$tamano.'
				</td>
				<td>
					'.$tipo.'
				</td>
				<td>
					'.$fecha.'
				</td>
			</tr>';
			}
		echo '
		</table>
	</body>
</html>';
?>