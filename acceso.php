<?php
//variables introducidas por el usuario en el formulario del fichero index.php
$usuario=$_REQUEST["usuario"];
$contrasena=$_REQUEST["contrasena"];
$servidor=$_POST["servidor"];
$puerto=$_POST["puerto"];

if (isset($_POST['SSL'])) {
	$SSL=$_POST['SSL'];

	if (!$conn=@ftp_ssl_connect($servidor,$puerto)){
		header ("Location: index.php?errorconexion=si");
		exit();
	}
	//si la conexion es exitosa, se verifica que el usuario y contraseña introducidos por el usuario son correctos
	elseif (!@ftp_login($conn,$usuario,$contrasena)) {
		header ("Location: index.php?errorusuario=si");
		exit();
	}

	//Finalmente si todo es correcto iniciamos sesión y definimos las variables de sesión
	else {
		session_start();
		//almacenamos los datos introducidos por el usuario en variables de sesion que será usado por el fichero seguridad.php para mantener la sesion activa
		$_SESSION['usuario']=$_REQUEST['usuario'];
		$_SESSION['contrasena']=$_REQUEST['contrasena'];
		$_SESSION['servidor']=$_POST['servidor'];
		$_SESSION['puerto']=$_POST['puerto'];
		$_SESSION['SSL']=$_POST['SSL'];
		$_SESSION['conn']=ftp_ssl_connect($_SESSION['servidor'],$_SESSION['puerto']);

		//defino la sesión que demuestra que el usuario está autorizado
		$_SESSION["autentificado"]= "SI";
		$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
		//y lo enviamos a home.php para comenzar a usar el servicio
		header ("Location: home.php");
	}
}

else {
//se verifica que existe conexion con la direccion indicada por el usuario.En caso contrario lo redirigimos a la pagina principal con su correspondiente mensaje de error
	if (!$conn=@ftp_connect($servidor,$puerto)){
		header ("Location: index.php?errorconexion=si");
		exit();
	}

	//si la conexion es exitosa, se verifica que el usuario y contraseña introducidos por el usuario son correctos
	elseif (!@ftp_login($conn,$usuario,$contrasena)) {
		header ("Location: index.php?errorusuario=si");
		exit();
	}

	//Finalmente si todo es correcto iniciamos sesión y definimos las variables de sesión
	else {
		session_start();
		//almacenamos los datos introducidos por el usuario en variables de sesion que será usado por el fichero seguridad.php para mantener la sesion activa
		$_SESSION['usuario']=$_REQUEST['usuario'];
		$_SESSION['contrasena']=$_REQUEST['contrasena'];
		$_SESSION['servidor']=$_POST['servidor'];
		$_SESSION['puerto']=$_POST['puerto'];
		$_SESSION['conn']=ftp_connect($_SESSION['servidor'],$_SESSION['puerto']);

		//defino la sesión que demuestra que el usuario está autorizado
		$_SESSION["autentificado"]= "SI";
		$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
		//y lo enviamos a home.php para comenzar a usar el servicio
		header ("Location: home.php");
	}
}
?>