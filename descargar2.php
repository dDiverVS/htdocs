<?php
include 'seguridad.php';
include 'conexion.php';

//Version Windows
//Si la versión del servidor web está en Windows,indicamos una ruta donde se enviarán los ficheros FTP:
if (strpos(php_uname("s"),"Windows")!==false) {
$ruta='C:"'.'xampp"'.'htdocs"'.'.hidden"';
$ruta2=addslashes($ruta);
$ruta3=str_replace('"', '', $ruta2);
//Si se ha pulsado la descarga de un fichero:
if (isset($_POST['id_descargar'])) {
	$id_descargar=$_POST['id_descargar'];
	$id_descargar2=str_replace('./', '', $id_descargar);
	//Tras modificar el nombre del fichero guardado en la variable, se envia el fichero a la ruta establecida previamente:
	if (ftp_get($conn, $ruta3.$id_descargar2, $id_descargar, FTP_BINARY)) {
		$fichero=$ruta3.$id_descargar2;
		//Si se ha enviado correctamente, procedemos a enviar ,usando el navegador, el fichero al usuario y lo eliminamos de la ruta indicada previamente
		if (file_exists($fichero)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($fichero));
			if (readfile($fichero)) {
				exec('del "'.$fichero.'" /Q /F');
				
			}
			else {
				exec('del "'.$fichero.'" /Q /F');
				header ('location: ./descargar.php');
			}
		}
		//Si el usuario pulsa la descarga de un fichero y este no tiene permisos, se le redirige a la siguiente ruta:
	}else header ('location: ./descargar.php?descarga=incorrecta');
}

}
else{

//version linux
//Si la versión del servidor web no está en Windows,indicamos una ruta donde se enviarán los ficheros FTP:

$ruta='/var/www/html/.hidden/';


//Si se ha pulsado la descarga de un fichero:
if (isset($_POST['id_descargar'])) {

	$id_descargar=str_replace("./","",$_POST['id_descargar']);
//Tras modificar el nombre del fichero guardado en la variable, se envia el fichero a la ruta establecida previamente:
	
	if (ftp_get($conn, $ruta.$id_descargar, $id_descargar, FTP_BINARY)) {

		$fichero=$ruta.$id_descargar;
			
		//Si se ha enviado correctamente, procedemos a enviar ,usando el navegador, el fichero al usuario y lo eliminamos de la ruta indicada previamente:
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
//Si el usuario pulsa la descarga de un fichero y este no tiene permisos, se le redirige a la siguiente ruta:
	}	else header ('location: ./descargar.php?descarga=incorrecta');

}

}

?>