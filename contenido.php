<?php
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
if (strpos($url,'borrar')!== false) {
	echo '
	<h3 align="center">Indique el nombre del fichero a eliminar</h3>';
}
elseif (strpos($url,'crear')!==false) {
	echo '
	<h3 align="center">Indique el nombre del directorio que desee crear</h3>';
}
elseif (strpos($url,'descargar')!==false) {
	echo '
	<h3 align="center">Seleccione el fichero que desea descargar</h3>';
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
<h2>Directorios</h2>
<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
	<th colspan="2">
		<td width="80%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
	</th>
	<tr>
		<td bgcolor="#E0E0E0"  align="center"><a href="home.php?subir" id="subirdirectorio"><img src="img/up.png" WIDTH="16"  HEIGHT="16"/></a></td>
		<td bgcolor="#E0E0E0"  align="center"> Subir directorio</td>
	</tr>';

$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
foreach ($lista as $objeto) {
	#Se leen todos los ficheros y directorios del directorios
	$tamano=number_format(((ftp_size($conn,$objeto))/1024),2)." Kb";
	#Obtiene tamaño de archivo y lo pasa a KB
	if($tamano=="-0.00 Kb" ) # Si es -0.00 Kb se refiere a un directorio
	{
		$objeto="<i><a href='home.php?carpeta_destino=".str_replace('./', '', $objeto)."'>".str_replace('./', '', $objeto)."</a></i>";
	echo '
	<tr class="tabla">
		<td  bgcolor="#E0E0E0" align="center">
			'.str_replace('./', '', $objeto).'
		</td>
	</tr>';
	}
}
echo '
</table>';

echo '
<h2>Archivos</h2>
<table width="80%" border="1" align="center" cellspacing="0" cellpadding="0">
	<tr>
		<td width="30%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Nombre</strong></font></div></td>
		<td width="20%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Tama&ntilde;o</strong></font></div></td>
		<td width="30%" bgcolor="#CCE5FF"><div align="center"><font size="2" face="Verdana, Tahoma, Arial"><strong>Fecha</strong></font></div></td>
	</tr>
';

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
	<tr class="tabla">
		<td  bgcolor="#E0E0E0" align="center">
			'.str_replace('./', '', $objeto).'
		</td>
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
?>