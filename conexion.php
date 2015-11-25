<?php
error_reporting(0);
	if (isset($_SESSION['SSL'])) {
		//Conecto con las variables de sesión para mantener la conexión y no solicitar la peticion al cliente de nuevo
		$conn=ftp_ssl_connect($_SESSION['servidor'],$_SESSION['puerto'],150);//Conexión ftp sobre ssl al servidor indicado
		ftp_pasv($conn,true); //modo pasivo
		ftp_login($conn,$_SESSION['usuario'],$_SESSION['contrasena']); //Acceso al servidor indicando usuario y contraseña
		//Ahora mostramos el directorio donde esta situado el usuario
		//Si se ha indicado una nueva carpeta desde la interfaz:
		if (isset($_GET['carpeta_destino'])) {
			//La nueva carpeta actual será la anterior concatenada con la nueva:
			if (isset($_SESSION['carpeta_actual'])) {
				$_SESSION['carpeta_actual']=$_SESSION['carpeta_actual'].'/'.$_GET['carpeta_destino'];
			}
			else {
				$_SESSION['carpeta_actual']='/'.$_GET['carpeta_destino'];
			}
		}//Nada más acceder a la interfaz, el valor de carpeta actual es el directorio raiz del usuario:
		elseif (!isset($_SESSION['carpeta_actual'])) {
			$_SESSION['carpeta_actual']=ftp_pwd($conn);
		}
		else {// Si no se ha indicado una nueva carpeta de destino, la carpeta actual conservará su valor:
			$_SESSION['carpeta_actual']=$_SESSION['carpeta_actual'];
		}
		//Al definirse la nueva carpeta de destino como la nueva carpeta actual, procedemos a cambiar a dicho directorio
		if (isset ($_GET['carpeta_destino']) && isset($_SESSION['carpeta_actual'])) {
			ftp_chdir($conn, $_SESSION['carpeta_actual']);
		}// Aquí subimos un directorio, tras pulsar subir directorio en la interfaz:
		elseif (isset($_GET['subir']) && isset($_SESSION['carpeta_actual'])) {
			ftp_chdir($conn, $_SESSION['carpeta_actual']);
			ftp_cdup($conn);
			$_SESSION['carpeta_actual']=ftp_pwd($conn);
		}// Si no se ha indicado un nuevo directorio, 
		//ni subir de directorio; se conserva el valor de la carpeta actual cuando cambiemos de opciones en la interfaz
		elseif (isset($_SESSION['carpeta_actual'])) {
			ftp_chdir($conn, $_SESSION['carpeta_actual']);
		}
	}

	else {
		//Conecto con las variables de sesión para mantener la conexión y no solicitar la peticion al cliente de nuevo
		$conn=ftp_connect($_SESSION['servidor'],$_SESSION['puerto'],150);//Conexión ftp al servidor indicado
		ftp_pasv($conn,true); //modo pasivo
		ftp_login($conn,$_SESSION['usuario'],$_SESSION['contrasena']); //Acceso al servidor indicando usuario y contraseña
		//Ahora mostramos el directorio donde esta situado el usuario
		//Si se ha indicado una nueva carpeta desde la interfaz:
		if (isset($_GET['carpeta_destino'])) {
			//La nueva carpeta actual será la anterior concatenada con la nueva:
			if (isset($_SESSION['carpeta_actual'])) {
				$_SESSION['carpeta_actual']=$_SESSION['carpeta_actual'].'/'.$_GET['carpeta_destino'];
			}
			else {
				$_SESSION['carpeta_actual']='/'.$_GET['carpeta_destino'];
			}
		}//Nada más acceder a la interfaz, el valor de carpeta actual es el directorio raiz del usuario:
		elseif (!isset($_SESSION['carpeta_actual'])) {
			$_SESSION['carpeta_actual']=ftp_pwd($conn);
		}
		else {// Si no se ha indicado una nueva carpeta de destino, la carpeta actual conservará su valor:
			$_SESSION['carpeta_actual']=$_SESSION['carpeta_actual'];
		}
		//Al definirse la nueva carpeta de destino como la nueva carpeta actual, procedemos a cambiar a dicho directorio
		if (isset ($_GET['carpeta_destino']) && isset($_SESSION['carpeta_actual'])) {
			ftp_chdir($conn, $_SESSION['carpeta_actual']);
		}// Aquí subimos un directorio, tras pulsar subir directorio en la interfaz:
		elseif (isset($_GET['subir']) && isset($_SESSION['carpeta_actual'])) {
			ftp_chdir($conn, $_SESSION['carpeta_actual']);
			ftp_cdup($conn);
			$_SESSION['carpeta_actual']=ftp_pwd($conn);
		}// Si no se ha indicado un nuevo directorio, 
		//ni subir de directorio; se conserva el valor de la carpeta actual cuando cambiemos de opciones en la interfaz
		elseif (isset($_SESSION['carpeta_actual'])) {
			ftp_chdir($conn, $_SESSION['carpeta_actual']);
		}
	}
?>