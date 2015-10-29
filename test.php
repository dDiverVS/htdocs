<?php
//variables introducidas por el usuario en el formulario del fichero index.php
$usuario=$_REQUEST["usuario"];
$contrasena=$_REQUEST["contrasena"];
$servidor=$_POST["servidor"];
$puerto=$_POST["puerto"];

if (!$conn=@ftp_ssl_connect($servidor,$puerto)){
	header ("Location: index_2.php?errorconexion=si");
	exit();
}
//si la conexion es exitosa, se verifica que el usuario y contraseña introducidos por el usuario son correctos
elseif (!@ftp_login($conn,$usuario,$contrasena)) {
	header ("Location: index_2.php?errorusuario=si");
	exit();
}
print($conn);
?>