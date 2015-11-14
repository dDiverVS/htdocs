<?php
include 'seguridad.php';
include 'conexion.php';

if (isset($_POST['id_descargar'])) {
	$id_descargar=$_POST['id_descargar'];
<<<<<<< HEAD
	ob_start();
	$fichero=ftp_get($conn, 'php://output', $id_descargar, FTP_BINARY)
	ftp_close($conn);
	if ($datos=ob_get_contents()) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($id_descargar).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($datos));
		readfile($datos);
		ob_clean();
		header ('location: ./descargar.php?descarga="correcta"');
	}
	else {
		exec('rm "'.$fichero.'"');
		header ('location: ./descargar.php');
	}
=======
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
	$id_descargar=str_replace("./","",$_POST['id_descargar']);
	if (ftp_get($conn, $ruta.$id_descargar, $id_descargar, FTP_BINARY)) {
		$fichero=$ruta.$id_descargar;
		$fichero=str_replace('%22', '', str_replace('%20', ' ', str_replace('"', '', $fichero)));
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
			}
			else {
				exec('rm "'.$fichero.'"');
				header ('location: ./descargar.php');
			}
		}
	}
	header ('location: ./descargar.php?descarga="correcta"');
}
>>>>>>> parent of 3fdb6dc... Corrijo la ubicación del header en descargar2.php
}
?>