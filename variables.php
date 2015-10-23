<?php
//variables introducidas por el usuario en el formulario del fichero index.php
$usuario=$_REQUEST["usuario"];
$contrasena=$_REQUEST["contrasena"];
$direccion=$_POST["direccion"];
$puerto=$_POST["puerto"];

//se verifica que existe conexion con la direccion indicada por el usuario.En caso contrario lo redirigimos a la pagina principal con su correspondiente mensaje de error
if (!$conn=@ftp_connect($direccion,$puerto)){
	header ("Location: index.php?errorconexion=si");
	exit();
}

else {
		//si la conexion es exitosa, se verifica que el usuario y contraseña introducidos por el usuario son correctos
		if(!@ftp_login($conn,$usuario,$contrasena))
		{header ("Location: index.php?errorusuario=si");
		exit();
		}
		else{//INICIAMOS SESIÓN DE USUARIO
		session_start();
					$_SESSION['conn']=ftp_connect($_SESSION['direccion'],$_SESSION['puerto']);
					$_SESSION["autentificado"]= "SI";
		//defino la sesión que demuestra que el usuario está autorizado 
					$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
		//almacenamos los datos introducidos por el usuario en variables de sesion que será usado por el fichero seguridad.php para mantener la sesion activa
					$_SESSION['usuario']=$_POST['usuario'];
					$_SESSION['contrasena']=$_POST['contrasena'];
					$_SESSION['direccion']=$_POST['direccion'];
					$_SESSION['puerto']=$_POST['puerto'];
					$_SESSION['carpeta_actual']='/';
		//y lo enviamos a inicio.php para comenzar a usar el servicio
					header ("Location: inicio.php");
					
	}
}
//}


?>