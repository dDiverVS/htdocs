<?php
error_reporting(0);
	//Inicio la sesión
	session_start();

	//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
	if ($_SESSION["autentificado"] != "SI") {
		//si no existe, envio a la página de autentificacion
		header("Location: index.php");
		//ademas salgo de este script
		exit();
	}

	else {
		//sino, calculamos el tiempo transcurrido
		$fechaGuardada = $_SESSION["ultimoAcceso"];
		$ahora = date("Y-n-j H:i:s");
		$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

		//comparamos el tiempo transcurrido
		if($tiempo_transcurrido >= 300) {
			//si pasaron 5 minutos o más
			session_destroy(); // destruyo la sesión
			header("Location: index.php"); //envío al usuario a la pag. de autenticación
		}
		//sino, actualizo la fecha de la sesión
		else {
			$_SESSION["ultimoAcceso"] = $ahora;
		}
	}
?>