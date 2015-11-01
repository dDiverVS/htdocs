<?php
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
if (strpos($url,'borrar')!== false) {
	echo '
	<h3 align="center">Indique el nombre del fichero a eliminar</h3>
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
}

echo '
			<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
				<tr>';
				
				if (strpos($url,'borrar')!==false) {
					echo '
					<td width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Borrar</strong></font></div></td>';
				}
				if (strpos($url, 'descargar')!==false) {
					echo '<td width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Descargar</strong></font></div></td>';
				}
				if (strpos($url, 'renombrar')!==false) {
					echo '<td width="10%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Renombrar</strong></font></div></td>';
				}			
				echo '
					<th><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></th>
					<th><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tipo</strong></font></div></th>
					<th><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tamaño</strong></font></div></th>
					<th><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></th>
				</tr>
				<tr>
					<td class="contenido"><a href="home.php?subir" id="subirdirectorio"><img src="img/up.PNG" WIDTH="16"  HEIGHT="16"/></a></td>
					<td class="contenido"> Subir directorio</td>
					<td class="contenido"></td>
					<td class="contenido"></td>
				</tr>';
			
			//Obtenemos y listamos directorios
			if (strpos($url,'borrar')!==false || strpos($url,'crear')!==false || strpos($url,'home')!==false || strpos($url,'renombrar')!==false || strpos($url,'subida')!==false) {
				$x=0;
				$lista_bruta=ftp_rawlist($conn,'.');
				$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
				foreach ($lista_bruta as $comprobacion) {
					if ($comprobacion[0]=='d') { //Compruebo si es un directorio
						$objeto=str_replace('./', '',$lista[$x]);
						$objeto2="<i><a href='home.php?carpeta_destino=".str_replace('./', '',$lista[$x])."'>".str_replace('./', '',$lista[$x])."</a></i>";
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
							<td WIDTH="16" HEIGHT="30" class="contenido">
								<button class="renombrar"  type="submit" value="'.$objeto.'" name="id_renombrar"><img src=img/modificar.jpg WIDTH="16"  HEIGHT="16"/></button>
							</td>
							<td WIDTH="16" HEIGHT="30">
								<button class="renombrar"  type="submit" value="'.$objeto.'" name="id_renombrar"><img src=img/modificar.PNG WIDTH="16"  HEIGHT="16"/></button>
							</td>';
						}
						echo '
							<td class="contenido">
								'.str_replace('./', '', $objeto2).'
							</td>
							<td class="contenido">Directorio</td>
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
						<td class="contenido" WIDTH="16"  HEIGHT="30" >
							<button class="descargar"  type="submit" value="'.$objeto.'" name="id_descargar"><img src=img/download.PNG WIDTH="16"  HEIGHT="16"/></button>
						</td>
						<td WIDTH="16"  HEIGHT="30" >
							<button class="descargar"  type="submit" value="'.$objeto.'" name="id_descargar"><img src=img/download.PNG WIDTH="16"  HEIGHT="16"/></button>
						</td>';
					}
					if (strpos($url,'renombrar')!== false) {
						echo '
						<td class="contenido" WIDTH="16" HEIGHT="30">
							<button class="renombrar" type="submit" value="'.$objeto.'" name="id_renombrar"><img src=img/modificar.jpg WIDTH="16" HEIGHT="16"/></button>
						</td>
						<td WIDTH="16" HEIGHT="30">
							<button class="renombrar" type="submit" value="'.$objeto.'" name="id_renombrar"><img src=img/modificar.PNG WIDTH="16" HEIGHT="16"/></button>
						</td>';
					}
					echo '
						<td  class="contenido">
							'.str_replace('./', '', $objeto).'
						</td>
						<td class="contenido">Fichero</td>
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
			if (strpos($url, 'renombrar')!==false) {
				echo '
			</form>';
			}
?>