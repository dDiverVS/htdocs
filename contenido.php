<?php
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
if (strpos($url,'borrar')!== false) {
	echo '
	<h3 align="center">Seleccione el fichero o ficheros que desee eliminar</h3>
	<form action="borrar2.php" method="post" name="borrar_ftp" id="borrar_ftp">';
}
elseif (strpos($url,'crear')!==false) {
	echo '
	<h3 align="center">Indique el nombre del directorio que desee crear</h3>';
}
elseif (strpos($url,'descargar')!==false) {
	echo '
	<h3 align="center">Seleccione el fichero que desea descargar</h3>
	<form action="descargar2.php" method="post" name="descargar" id="descargar">';
}
elseif (strpos($url,'home')!==false) {
	echo '
	<h3 align="center">Elija otro directorio o continue con el directorio actual</h3>';
}
elseif (strpos($url,'renombrar')!==false) {
	echo '
	<h3 align="center">Seleccione el fichero que desea renombrar</h3>
	<form action="renombrar2.php" method="post" name="renombrar" id="renombrar">';
}
elseif (strpos($url,'subida')!==false) {
	echo '
	<h3 align="center">Suba el fichero que desee</h3>';
	$max_upload = (int)(ini_get('upload_max_filesize'));
	$max_post = (int)(ini_get('post_max_size'));
	$memory_limit = (int)(ini_get('memory_limit'));
	$upload_mb = min($max_upload, $max_post, $memory_limit);
	echo "<p align='center'>Tama&ntilde;o m&aacute;ximo permitido <strong>$upload_mb Mb</strong></p>";
}

echo '
			<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
				<tr>';
				
				if (strpos($url,'borrar')!==false) {
					echo '
					<th width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Borrar</strong></font></div></th>';
				}
				if (strpos($url, 'descargar')!==false) {
					echo '<th width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Descargar</strong></font></div></th>';
				}
				if (strpos($url, 'renombrar')!==false) {
					echo '<th width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Renombrar</strong></font></div></th>';
				}			
				echo '
					<th class="contenido2"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></th>
					<th class="contenido2"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></th>
					<th class="contenido2"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></th>
					<th class="contenido2"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></th>
				</tr>
				<tr>
					<td class="contenido"><a href="home.php?subir" id="subirdirectorio"><img src="img/up.PNG" WIDTH="16"  HEIGHT="16"/></a></td>
					<td class="contenido"> Subir directorio</td>
					<td class="contenido"></td>
					<td class="contenido"></td>';
					if (strpos($url,'borrar')!==false || strpos($url,'renombrar')!==false || strpos($url,'descargar')!==false) {
						echo '
					<td class="contenido"></td>';
					}
				echo'
				</tr>';
			
			//Obtenemos y listamos directorios
			if (strpos($url,'borrar')!==false || strpos($url,'crear')!==false || strpos($url,'home')!==false || strpos($url,'renombrar')!==false || strpos($url,'subida')!==false) {
				$x=0;
				$lista_bruta=ftp_rawlist($conn,'.');
				$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
				foreach ($lista_bruta as $comprobacion) {
					if ($comprobacion[0]=='d') { //Compruebo si es un directorio
						$objeto=str_replace('./', '',$lista[$x]);
						$objeto2="<i><a href='home.php?carpeta_destino=".str_replace('./', '',$lista[$x])."' class='lila'>".str_replace('./', '',$lista[$x])." </a></i>";
						echo '
						<tr class="tabla">';
						if (strpos($url,'borrar')!== false) {
							echo '
							<td class="contenido">
								<input type="checkbox" name="id_borrar[]"" value="'.$objeto.'"/>
							</td>';
						}
						if (strpos($url,'renombrar')!== false) {
							echo '
							<td WIDTH="16" HEIGHT="30">
								<button class="renombrar"  type="submit" value="'.$objeto.'" name="id_renombrar"><img src=img/modificar.PNG WIDTH="16"  HEIGHT="16"/></button>
							</td>';
						}
						echo '
							<td class="contenido">
								'.str_replace('./', '', $objeto2).'
							</td>
							<td class="contenido"><img src="img/normal_folder.PNG" width="20" height="20"</td>
							<td class="contenido">&nbsp;</td>
							<td class="contenido">&nbsp;</td>
						</tr>';
					}
					++$x;
				}
			}
			//Obtenemos ficheros y aplicamos función dependiendo de la URL
			$x=0;
			$lista_bruta=ftp_rawlist($conn,'.');
			$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
			foreach ($lista_bruta as $comprobacion) {
				if ($comprobacion[0]=='-') {
					$objeto=$lista[$x];
					$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
					$fecha=date("d/m/y h:i:s", ftp_mdtm($conn,$objeto));
					echo '
					<tr class="tabla">';
					if (strpos($url,'borrar')!== false) {
						echo '
						<td class="contenido">
							<input type="checkbox" name="id_borrar[]"" value="'.$objeto.'"/>
						</td>';
					}
					if (strpos($url,'descargar')!== false) {
						echo '
						<td WIDTH="16"  HEIGHT="30" >
							<button alt="Descargar '.$objeto.'" class="descargar" type="submit" value="'.$objeto.'" name="id_descargar"><img src=img/download.PNG WIDTH="16"  HEIGHT="16"/></button>
						</td>';
					}
					if (strpos($url,'renombrar')!== false) {
						echo '
						<td WIDTH="16" HEIGHT="30">
							<button alt="Renombrar '.$objeto.'" class="renombrar" type="submit" value="'.$objeto.'" name="id_renombrar"><img src=img/modificar.PNG WIDTH="16" HEIGHT="16"/></button>
						</td>';
					}
					echo '
						<td  class="contenido">
							'.str_replace('./', '', $objeto).'
						</td>
						<td class="contenido"><img src="img/normal_file.PNG" width="20" height="20"></td>
						<td class="contenido">
							'.$tamano.'
						</td>
						<td class="contenido">
							'.$fecha.'	
						</td>
					</tr>';
				}
				++$x;
			}
			echo '
			</table>';
			if (strpos($url, 'subida')!==false) {
		echo '
			<form action="subida2.php" method="post" name="subida" id="subida" enctype="multipart/form-data" >
			<p align="center">
				<label>Archivo 1</label>
				<input name="archivo1" type="file" /><br/>
				<label>Archivo 2</label>
				<input name="archivo2" type="file"/><br/>
				<label>Archivo 3</label>
				<input name="archivo3" type="file"/><br/>
				<br/>
				<br/>
				<br/>
				<button class="subir"   type="submit" value="" name="subir"><img src=img/check.PNG WIDTH="30"  HEIGHT="30" title="Subir fichero/s" alt="Subir fichero/s"/></button>
			</p>
		</form>';
	

 
}
			if (strpos($url, 'borrar')!==false) {
				echo '<p align="center">
							<a href="javascript:seleccionar_todo()" class="link">Seleccionar todos</a>     
							<a href="javascript:deseleccionar_todo()" class="link">Deseleccionar</a> 
					  </p>
			<p align="center">
			
			<button onclick="return borrar()"  title="Borrar fichero/s" alt="Borrar fichero/s" type="submit" value="" name="Borrar"><img src=img/check.PNG WIDTH="30"  HEIGHT="30"/></button>
				
			</p>
			
			</form>';
			}
		
			if (strpos($url, 'crear')!==false) {
			echo "
			<form action='crear2.php' method='post' name='crear_ftp' id='crear_ftp'>
				<p align='center'>
					<input class='barra' name='crear' align='center' type='text' title='El nombre de los directorios no pueden contener \\/:?*><\"|' pattern='[^\"\\x5c\"\x22\"\x2f\"\x3a\"\x3f\"\x2a\"\x3c\"\x3e\"\x7c]+' /> <br/><br/>
					<button  title='Crear directorio' alt='Crear directorio' type='submit' value='' name='envio'><img src=img/check.PNG WIDTH='30'  HEIGHT='30'/></button>
				</p>
			</form>";
			}
			if (strpos($url, 'renombrar')!==false) {
				echo '
			</form>';
			}
?>