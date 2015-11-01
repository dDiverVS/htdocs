<?php
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
if (strpos($url,'borrar')!== false) {
	echo '
	<h3 align="center">Indique el nombre del fichero a eliminar</h3>
	<form action="borrar2.php" align="center"  method="post" name="borrar_ftp" id="borrar_ftp">';
}
elseif (strpos($url,'crear')!==false) {
	echo '
	<h3 align="center">Indique el nombre del directorio que desee crear</h3>';
}
elseif (strpos($url,'descargar')!==false) {
	echo '
	<h3 align="center">Seleccione el fichero que desea descargar</h3>
	<form action="descargar2.php" align="center"  method="post" name="descargar" id="descargar">';
}
elseif (strpos($url,'home')!==false) {
	echo '
	<h3 align="center">Elija otro directorio o continue con el directorio actual</h3>';
}
elseif (strpos($url,'renombrar')!==false) {
	echo '
	<h3 align="center">Seleccione el fichero que desea renombrar</h3>';
}
elseif (strpos($url,'subida')!==false) {
	echo '
	<h3 align="center">Suba el fichero que desee</h3>';
}

echo '
			<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
				<tr>';
				
				if (strpos($url,'borrar')!== false) {
					echo '
					<td width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Borrar</strong></font></div></td>';
				}
				if (strpos($url, 'descargar')!==false) {
					echo '<td width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Descargar</strong></font></div></td>';
				}
			
				echo '
					<th><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></th>
					<th><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></th>
					<th><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tamaño</strong></font></div></th>
					<th><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></th>
				</tr>
				<tr>
					<td bgcolor="#E0E0E0"  align="center"><a href="home.php?subir" id="subirdirectorio"><img src="img/up.png" WIDTH="16"  HEIGHT="16"/></a></td>
					<td bgcolor="#E0E0E0"  align="center"> Subir directorio</td>
					<td></td>
					<td></td>
				</tr>';
			
			//Obtenemos y listamos directorios
			$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
			foreach ($lista as $objeto) {
				#Se leen todos los ficheros y directorios del directorios
				$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
				#Obtiene tamaño de archivo y lo pasa a KB
				if($tamano=="-0.00 Kb" ) # Si es -0.00 Kb se refiere a un directorio
				{
					$objeto="<i><a href='home.php?carpeta_destino=".str_replace('./', '', $objeto)."'>".str_replace('./', '', $objeto)."</a></i>";
					echo '
				<tr class="tabla">';
				if (strpos($url,'borrar')!== false) {
					echo '
					<td bgcolor="#E0E0E0">
						<input type="checkbox" name="id_borrar[]"" value="'.$objeto.'"/>
					</td>';
				}
				if (strpos($url,'descargar')!== false) {
					echo '
					<td>
					</td>';
				}
				echo '
					<td  bgcolor="#E0E0E0" align="center">
						'.str_replace('./', '', $objeto).'
					</td>
					<td>Directorio</td>
					<td></td>
					<td></td>
				</tr>';
				}
			}
			
			//Obtenemos ficheros y aplicamos función dependiendo de la URL
			$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
			foreach ($lista as $objeto) {
				#Se leen todos los ficheros y directorios del directorios
				$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
				#Obtiene tamaño de archivo y lo pasa a KB
				if($tamano!=="-0.00 Kb" ) {
					$fecha=date("d/m/y h:i:s", ftp_mdtm($conn,$objeto));
					#Filemtime obtiene la fecha de modificacion del fichero; y date le da el formato de salida
				}
				echo '
				<tr class="tabla">';
				if (strpos($url,'borrar')!== false) {
					echo '
					<td bgcolor="#E0E0E0">
						<input type="checkbox" name="id_borrar[]"" value="'.$objeto.'"/>
					</td>';
				}
				if (strpos($url,'descargar')!== false) {
					echo '
					<td WIDTH="16"  HEIGHT="30" >
						<button class="descargar"  type="submit" value="'.$objeto.'" name="id_descargar"><img src=img/download.png WIDTH="16"  HEIGHT="16"/></button>
					</td>';
				}
				echo '
					<td  bgcolor="#E0E0E0" align="center">
						'.str_replace('./', '', $objeto).'
					</td>
					<td>Fichero</td>
					<td bgcolor="#E0E0E0"  align="center">
						'.$tamano.'
					</td>
					<td  bgcolor="#E0E0E0"  align="center">
						'.$fecha.'
					</td>
				</tr>';
				}
			echo '
			</table>';
			if (strpos($url, 'borrar')!==false) {
				echo '
			<p align="center">
				<input name="Borrar" type="submit" value="Borrar Archivo"/>
			</p>
			</form>';
}
if (strpos($url, 'crear')!==false) {
		echo '
		<form action="crear2.php" onsubmit="setTimeout("document.forms[0].reset()", 2000)"  method="post" name="crear_ftp" id="crear_ftp">
			<p align="center">
				<input class="barra" name="crear" align="center" type="text" title="El nombre de los directorios no pueden contener \\ /:?*><\"|" pattern="[^\"\\x5c \"\x22 \"\x2f \"\x3a \"\x3f \"\x2a \"\x3c \"\x3e \"\x7c]+" /> 
				<input name="envio" align="center" type="submit" value="Crear Directorio" />
			</p>
		</form>';
	}
?>