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
		
		<table width="100%" border="0" align="right" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<div align="left">
						<a href="home.php"> <img src="img/logo.png" title="Volver a Inicio" width="300" height="100" alt="Volver a Inicio"> </a>
					</div>
				</td>
				<td><div align="right">
					USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b><br/><br/>
					<a href="cerrar.php" class="button"/><br/>
					<img src="img/exit.png" title="Cerrar Sesion" width="50" height="50" alt="Cerrar Sesion"></a><br/>
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
		include 'menu_sup.php';
		echo '
		<br/>
		
		<table width="69%" border="1" align="center" cellspacing="0" cellpadding="0">
			<tr>
				<td width="30%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
				<td width="20%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
				<td width="20%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></td>
				<td width="30%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
			</tr>
			<tr>
				<td><a href="home.php?subir">Subir directorio</a></td>
				<td></td>
				<td>directorio</td>
				<td></td>
			</tr>';
		
		$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
		foreach ($lista as $objeto) {
			#Se leen todos los ficheros y directorios del directorios
			$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
			#Obtiene tamaño de archivo y lo pasa a KB
			if($tamano=="-0.00 Kb") # Si es -0.00 Kb se refiere a un directorio
			{
				$tipo="directorio";
				$objeto="<i><a href='home.php?carpeta_destino=$objeto'>".$objeto."</a></i>";
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