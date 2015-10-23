<?php


$conexion = mysqli_connect("localhost", "root", "inves", "hotelrelaxo");
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"];

$sql = "Select nivel from usuario where nombre='$usuario' and pass=md5('$contrasena')";
//vemos si el usuario y contraseÃ±a es vÃ¡ildo
$resultado=mysqli_query($conexion, $sql);
	if (mysqli_num_rows($resultado)!=0){
//usuario y contraseÃ±a vÃ¡lidos
//defino una sesion y guardo datos

			session_start();
			$_SESSION["autentificado"]= "SI";
//defino la sesión que demuestra que el usuario está autorizado 
			$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
			$fila =mysqli_fetch_array($resultado, MYSQL_NUM);
		
			$_SESSION["nivel"]= $fila[0];
//defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
			header ("Location: acceso.php");
	}else {
//si no existe le mando otra vez a la portada
			header("Location: index.php?errorusuario=si");
}