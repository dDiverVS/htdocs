<?php
include 'seguridad.php';
include 'conexion.php';

if (isset($_POST['id_descargar'])) {
	$id_descargar=$_POST['id_descargar'];
	ob_start();
	$fichero=ftp_get($conn, 'php://output', $id_descargar, FTP_BINARY)
	ftp_close($conn);
	if (ob_get_contents()) {
		ob_clean();
		header ('location: ./descargar.php?descarga="correcta"');
	}
	else {
		exec('rm "'.$fichero.'"');
		header ('location: ./descargar.php');
	}
}
?>