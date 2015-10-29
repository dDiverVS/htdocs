<?php
echo '
<html>
	<head>
		<title>Eliminar ficheros</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
		// Si no se selecciona un fichero, salta el siguiente texto
		if ( isset($_GET["noborrar"])){
		if ($_GET["noborrar"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un fichero para eliminar</font></h2>";}
		if ( isset($_GET["ficheronovacio"])){
		if ($_GET["ficheronovacio"]=="si") echo "<h2 align='center'><font color='red'>El fichero elegido no est&aacute; vacio</font></h2>";}
		include 'seguridad.php';
		include 'conexion.php';
		
		
		//Enlaces para acceder a diferentes opciones
		include 'menu_sup.php';
		
		//Seleccion de fichero a eliminar
		echo '
		<h3 align="center">Indique el nombre del fichero a eliminar</h3>
		<form action="borrar2.php" align="center"  method="post" name="borrar_ftp" id="borrar_ftp">
			<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
				<tr>
					<td width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Borrar</strong></font></div></td>
					<td width="30%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
					<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
					<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></td>
					<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
				</tr>';
				
				$lista=ftp_nlist($conn,'.'); //Devuelve un array con los nombres de ficheros
				foreach ($lista as $objeto) {
					//Se leen todos los ficheros y directorios del directorios
					$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";#Obtiene tamaño de archivo y lo pasa a KB
					
					if($tamano=="-0.00 Kb") {# Si es -0.00 Kb se refiere a un directorio
						$tipo="directorio";
						$tamano="&nbsp;";
						$fecha="&nbsp;";
						 //Escaneamos el directorio
					    
					}

					   

					else {$tipo="fichero";
						$fecha=date("d/m/y h:i:s", ftp_mdtm($conn,$objeto));
						#Filemtime obtiene la fecha de modificacion del fichero; y date le da el formato de salida
					}

					// Mostrar los resultados en la tabla y envio 
					echo "
					<tr class='tabla'>
						<td bgcolor='#E0E0E0'>
							<input type='checkbox' name='id_borrar[]' value='".$objeto."'/>
						</td>
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
			<p align="center">
				<input name="Borrar" type="submit" value="Borrar Archivo"/>
			</p>
		</form>
	</body>
</html>';
?>