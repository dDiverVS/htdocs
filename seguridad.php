<?php
//Inicio la sesión 
error_reporting(0);
session_start(); 

//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO 
if ($_SESSION["autentificado"] != "SI") { 
//si no existe, envio a la página de autentificacion 
header("Location: index.php"); 
//ademas salgo de este script 
exit(); 
} 

else{
//sino, calculamos el tiempo transcurrido 
$fechaGuardada = $_SESSION["ultimoAcceso"]; 
$ahora = date("Y-n-j H:i:s"); 
$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

//comparamos el tiempo transcurrido 
if($tiempo_transcurrido >= 300) { 
//si pasaron 10 minutos o más 
session_destroy(); // destruyo la sesión 
header("Location: index.php"); //envío al usuario a la pag. de autenticación 
//sino, actualizo la fecha de la sesión 
}else {
	#Conecto con las variables de sesion para mantener la conexion y no solicitar la peticion al cliente de nuevo
	$conn=ftp_connect($_SESSION['direccion'],$_SESSION['puerto']);//conexion ftp al servidor indicado
	ftp_pasv($conn,true); //modo pasivo
	ftp_login($conn,$_SESSION['usuario'],$_SESSION['contrasena']); //acceso al servidor indicando usuario y contraseña
	$directorio=ftp_pwd($conn); //directorio en el que se esta situado tras la conexion

$_SESSION["ultimoAcceso"] = $ahora; 
} 
} 
?>
