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
		
		
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		echo '
		
		<h3 align="center">Elija otro directorio o continue con el directorio actual</h3>
		<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
			<tr>
				<td width="30%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
				<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
				<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></td>
				<td width="30%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
			</tr>
			<tr>
				<td bgcolor="#E0E0E0"  align="center"><a href="home.php?subir" id="subirdirectorio"><img src="img/up.png" WIDTH="16"  HEIGHT="16"/></a></td>
				<td  bgcolor="#E0E0E0"></td>
				<td  bgcolor="#E0E0E0"  align="center"> Subir directorio</td>
				<td  bgcolor="#E0E0E0"></td>
			</tr>';
		
		$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
		foreach ($lista as $objeto) {
			#Se leen todos los ficheros y directorios del directorios
			$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
			#Obtiene tamaño de archivo y lo pasa a KB
			if($tamano=="-0.00 Kb" ) # Si es -0.00 Kb se refiere a un directorio
			{
				$tipo="directorio";
				$objeto="<i><a href='home.php?carpeta_destino=".str_replace('./', '', $objeto)."'>".str_replace('./', '', $objeto)."</a></i>";
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
				<td  bgcolor="#E0E0E0" align="center">
					'.str_replace('./', '', $objeto).'
				</td>
				<td bgcolor="#E0E0E0"  align="center">
					'.$tamano.'
				</td>
				<td bgcolor="#E0E0E0"  align="center">
					'.$tipo.'
				</td>
				<td  bgcolor="#E0E0E0"  align="center">
					'.$fecha.'
				</td>
			</tr>';
			}
		echo '
		</table>
	</body>
</html>';
?>