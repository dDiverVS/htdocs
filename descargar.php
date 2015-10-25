<?php
echo '
<html>
	<head>
		<title>Descargar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
	//si no indica ni que fichero ni el nuevo nombre, es dirigido a esta pagina con este esto
	if ( isset($_GET["nodescargar"])){
	if ($_GET["nodescargar"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un fichero para descargar</font></h2>";}
		
	//Incluye el archivo de seguridad para mantener la sesion activa
	include 'seguridad.php';
	include 'conexion.php';
	
		//Enlaces para acceder a diferentes opciones
	
	include 'menu_sup.php';
		echo '
	<h3 align="center">Seleccione el fichero que desea descargar</h3>

		<form action="descargar2.php" align="center"  method="post" name="descargar" id="descargar">
			<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
				<tr>
					<td width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Descargar</strong></font></div></td>
					<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
					<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
					<td width="30%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></td>
					<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
				</tr>';

				$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
				foreach ($lista as $objeto) {
					#Se leen todos los ficheros y directorios del directorios
					$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
				
					#Obtiene tamaño de archivo y lo pasa a KB
					if($tamano=="-0.00 Kb") {
						# Si es -0.00 Kb se refiere a un directorio
						
						$tipo="directorio";
						$tamano="&nbsp;";
						$fecha="&nbsp;";
					}
					else {$tipo="fichero";
						$fecha=date("d/m/y h:i:s", ftp_mdtm($conn,$objeto));
						#Filemtime obtiene la fecha de modificacion del fichero; y date le da el formato de salida
					}

					if($tipo=="fichero"){
						echo "
						<tr>
							<td WIDTH='16'  HEIGHT='30' >
								<button class='descargar'  type='submit' value='".$objeto."' name='id_descargar'><img src=img/download.png WIDTH='16'  HEIGHT='16'/></button>
							</td>
							<td bgcolor='#EEEFEE' align='center'>
								".$objeto."
							</td>
							<td  bgcolor='#EEEFEE' align='center'>
								".$tamano."
							</td>
							<td  bgcolor='#EEEFEE' align='center'>
								".$tipo."
							</td>
							<td  bgcolor='#EEEFEE' align='center'>
								".$fecha."
							</td>
						</tr>";
					}
				}
			echo '
			</table>
		</form>
	</body>
</html>';
?>