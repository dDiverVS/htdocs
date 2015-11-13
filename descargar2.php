<?php
include 'seguridad.php';
include 'conexion.php';

//Version Windows
if (strpos(php_uname("s"),"Windows")!==false) {
$ruta='.hidden\\';
//$ruta2=addslashes($ruta);
//$ruta3=str_replace('"', '\"', $ruta);

if (isset($_POST['id_descargar'])) {
	$id_descargar=$_POST['id_descargar'];
	$id_descargar2=str_replace("./"," ", $id_descargar);
	if (ftp_get($conn, $ruta.$id_descargar2, $id_descargar, FTP_BINARY)) {
		$fichero=$ruta.$id_descargar2;
	//	header ('location: ./descargar.php?descarga='.$fichero.'');
		if (file_exists($fichero)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($fichero));
		}
			if (readfile($fichero)) {
				exec('del "'.$fichero.'" /Q /F');
				header ('location: ./descargar.php?descarga="correcta"');
			}
			else {
				exec('del "'.$fichero.'" /Q /F');
				header ('location: ./descargar.php');
			}
		}
	
}
}
else{
//version linux
$ruta='/var/www/html/.hidden/';

if (isset($_POST['id_descargar'])) {
	$id_descargar=$_POST['id_descargar'];
	$fichero=$ruta.$id_descargar;
	echo $fichero;/*
	if (ftp_get($conn, $fichero, $id_descargar, FTP_BINARY)) {
		if (file_exists($fichero)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($fichero));
			if (readfile($fichero)) {
				exec('rm "'.$fichero.'"');
				header ('location: ./descargar.php?descarga="correcta"');
			}
			else {
				exec('rm "'.$fichero.'"');
				header ('location: ./descargar.php');
			}
		}
	}*/
}
}
?>