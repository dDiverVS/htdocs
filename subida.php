<?php
echo '
<html>
	<head>
		<title>Subir ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
		//si no se ha indicado un fichero para subir, el usuario es reenviado aqui con el siguiente texto:
		if ( isset($_GET["noarchivo"])){
		if ($_GET["noarchivo"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un fichero para subir</font></h2>";}
		include 'seguridad.php';
		include 'conexion.php';
		
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		//Seleccion de fichero a subir
		echo'
		<h3 align="center">Suba el fichero que desee</h3>
			<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
				<tr>
					<td width="30%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
					<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
					<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></td>
					<td width="30%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
				</tr>';

				$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
				foreach ($lista as $objeto) {
					#Se leen todos los ficheros y directorios del directorios
					$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
					#Obtiene tamaño de archivo y lo pasa a KB
					if($tamano=="-0.00 Kb") {
						$tipo="directorio";
						# Si es -0.00 Kb se refiere a un directorio
						$tamano="&nbsp;";
						$fecha="&nbsp;";
					}
					else {$tipo="fichero";
						$fecha=date("d/m/y h:i:s", ftp_mdtm($conn,$objeto));
						#Filemtime obtiene la fecha de modificacion del fichero; y date le da el formato de salida
					}
					echo "
					<tr class='tabla'>
						<td bgcolor='#E0E0E0' align='center'>
							".$objeto."
						</td>
						<td bgcolor='#E0E0E0' align='center'>
							".$tamano."
						</td>
						<td bgcolor='#E0E0E0' align='center'>
							".$tipo."
						</td>
						<td bgcolor='#E0E0E0' align='center'>
							".$fecha."
						</td>
					</tr>";
				}
			echo '
			</table>
		<form action="subida2.php" method="post" name="subida" id="subida" enctype="multipart/form-data">
			<p align="center">
				<label>Archivo 1</label>
				<input name="archivo" type="file"/>
				<br/>
				<br/>
				<br/>
				<input name="subir" type="submit" value="Subir Archivo"/>
			</p>
		</form>
	</body>
</html>';
$max_upload = (int)(ini_get('upload_max_filesize'));
$max_post = (int)(ini_get('post_max_size'));
$memory_limit = (int)(ini_get('memory_limit'));
$upload_mb = min($max_upload, $max_post, $memory_limit);
 
echo "Tamaño maximo permitido <strong>$upload_mb Mb</strong><br>";
?>