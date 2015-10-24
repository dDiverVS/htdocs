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
		//Logotipo
		echo '
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
		echo '
		<table width="30%" border="0" align="center" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<div align="center">
						<a href="subida.php" class="button"/><span class="add">Subir Fichero</span></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="borrar.php" class="button"/>Borrar</a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="renombrar.php" class="button"/>Renombrar </a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="crear.php" class="button"/>Crear Directorio</a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="descargar.php" class="button"/>Descargar</a>
					</div>
				</td>
			<tr>
		</table>
		<br/>';
		//Seleccion de fichero a subir
		echo'
		<h3 align="center">Suba el fichero que desee</h3>
			<table width="69%" border="1" align="center" cellspacing="0" cellpadding="0">
				<tr>
					<td width="30%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
					<td width="20%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
					<td width="20%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></td>
					<td width="30%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
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
						<td>
							".$objeto."
						</td>
						<td>
							".$tamano."
						</td>
						<td>
							".$tipo."
						</td>
						<td>
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