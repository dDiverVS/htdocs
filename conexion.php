<?php
	#Conecto con las variables de sesion para mantener la conexion y no solicitar la peticion al cliente de nuevo
	$conn=ftp_connect($_SESSION['servidor'],$_SESSION['puerto']);//conexion ftp al servidor indicado
	ftp_pasv($conn,true); //modo pasivo
	ftp_login($conn,$_SESSION['usuario'],$_SESSION['contrasena']); //acceso al servidor indicando usuario y contraseña
	if (isset($_GET['carpeta_destino'])) {
		if (isset($_SESSION['carpeta_actual'])) {
			$_SESSION['carpeta_actual']=$_SESSION['carpeta_actual'].$_GET['carpeta_destino'];
		}
		else {
			$_SESSION['carpeta_actual']=$_GET['carpeta_destino'];
		}
	}
	else {

		$_SESSION['carpeta_actual']=ftp_pwd($conn);
	}

	if (isset ($_GET['carpeta_destino']) && isset($_SESSION['carpeta_actual'])) {
		ftp_chdir($conn, $_SESSION['carpeta_actual']);
	}
	elseif (isset($_GET['subir']) && isset($_SESSION['carpeta_actual'])) {
		ftp_chdir($conn, $_SESSION['carpeta_actual']);
		ftp_cdup($conn);
		$_SESSION['carpeta_actual']=ftp_pwd($conn);
	}
	elseif (isset($_SESSION['carpeta_actual'])) {
		ftp_chdir($conn, $_SESSION['carpeta_actual']);
	}
?>