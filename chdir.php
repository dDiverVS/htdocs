<?php
include 'seguridad.php';
$acceso=ftp_connect($_SESSION['direccion'],$_SESSION['puerto']);
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