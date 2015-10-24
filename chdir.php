<?php
//Fichero aún inservible
$acceso=ftp_connect($_SESSION['servidor'],$_SESSION['puerto']);
if (isset($_GET['carpeta_actual'])) {
	if ($_SESSION['carpeta_actual']=='/') {
		$_SESSION['carpeta_actual']=$_GET['carpeta_actual'];
	}
	else {
		$_SESSION['carpeta_actual']=$_SESSION['carpeta_actual'].$_GET['carpeta_actual'];
	}
}
if (!ftp_chdir($acceso, $_SESSION['carpeta_actual'])) {
	echo "Error al cambiar de carpeta";
	exit();
}
header ("Location: inicio.php");
?>


	if (isset($_GET['carpeta_actual'])) {
		if ($_GET['carpeta_actual']=='subir') {
			ftp_cdup($conn);
		}
		else {
			ftp_chdir($conn, $_GET['carpeta_actual']);
		}
	}