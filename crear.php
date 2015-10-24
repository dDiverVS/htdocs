<?php
echo '
<html>
	<head>
		<title>Crear directorios</title>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/ico" href="img/favicon.ico" />
	</head>

	<body bgcolor="#EFE4B0">';
		//si no se introduce un nombre de directorio para crear, se indica el mensaje de abajo
		if ( isset($_GET["nocrear"])){
		if ($_GET["nocrear"]=="si") echo "<h2 align='center'><font color='red'>No ha indicado un nombre de directorio a crear</font></h2>";}
		include 'seguridad.php';
		include 'conexion.php'; 
		//Logotipo
		echo '
		<p align="center">
			<a href="home.php"><img src="img/logo.png" title="Volver a Inicio" width="400" height="100" alt="Volver a Inicio"></a>
		</p>
		<table width="15%" border="1" align="right" cellspacing="0" cellpadding="0">
			<tr>
				<td><div align="center">
					USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b><br/><br/>
					<a href="cerrar.php" class="button"/>Cerrar Sesion</a><br/>
				</td>
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
						<a href="subida.php" class="button"/>Subir Fichero</a>
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
						<a href="crear.php" class="button"/><span class="add">Crear Directorio</span></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="descargar.php" class="button"/>Descargar</a>
					</div>
				</td>
			</tr>
		</table>
		<br/>';
		echo'	
		<h3 align="center">Indique el nombre del directorio que desee crear</h3>
			<table width="69%" border="1" align="center" cellspacing="0" cellpadding="0">
				<tr>
					<td width="30%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
					<td width="30%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
					<td width="20%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></td>
					<td width="20%" bgcolor="#EEEFEE"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
				</tr>';


				$lista=ftp_nlist($conn,$directorio); #Devuelve un array con los nombres de ficheros
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

					//seleccion del nombre del directorio a crear, cumpliendo las condiciones de los nombres de las carpetas
					echo "
					</table>
		<form action='crear2.php' onsubmit='setTimeout('document.forms[0].reset()', 2000)'  method='post' name='crear_ftp' id='crear_ftp'>
			<p align='center'>
				<input name='crear' align='center' type='text' title='El nombre de los directorios no pueden contener \\ /:?*><\"|' pattern='[^\"\\x5c \"\x22 \"\x2f \"\x3a \"\x3f \"\x2a \"\x3c \"\x3e \"\x7c]+' /> 
				<input name='envio' align='center' type='submit' value='Crear Directorio' />
			</p>
		</form>
	</body>
</html>";
?>