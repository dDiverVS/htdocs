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
			<table width="69%" border="1" align="center" cellspacing="0" cellpadding="0">
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
					<tr>
						<td bgcolor='#E0E0E0'>
							".$objeto."
						</td>
						<td bgcolor='#E0E0E0'>
							".$tamano."
						</td>
						<td bgcolor='#E0E0E0'>
							".$tipo."
						</td>
						<td bgcolor='#E0E0E0'>
							".$fecha."
						</td>
					</tr>";
				}
			echo '
			</table>
		<form action="subida2.php" method="post" name="subida" id="subida" enctype="multipart/form-data">
			<p align="center"><font size="2" face="Verdana, Tahoma, Arial"> Elegir archivo :<br/>
				<input name="archivo" type="file"/>
				<br/>
				<br/>
				<br/>
				<input name="subir" type="submit" value="Subir Archivo"/>
			</p>
		</form>
	</body>
</html>';
?>