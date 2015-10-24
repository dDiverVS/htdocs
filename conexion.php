<?php
	#Conecto con las variables de sesion para mantener la conexion y no solicitar la peticion al cliente de nuevo
	$conn=ftp_connect($_SESSION['servidor'],$_SESSION['puerto']);//conexion ftp al servidor indicado
	ftp_pasv($conn,true); //modo pasivo
	ftp_login($conn,$_SESSION['usuario'],$_SESSION['contrasena']); //acceso al servidor indicando usuario y contraseña

?>