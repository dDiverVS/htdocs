
<html>
<head>
<title align="center">HOTEL RELAXO</title>
</head>
<body bgcolor="#FFFFCC">
<h1 align="center"><font color="#00CC00">HOTEL RELAXO</font></h1>
<?php
$servidor = "localhost";
$usuario = "root";
$clave = "inves";
$base="hotelrelaxo";




// Create connection
$conexion = mysqli_connect($servidor, $usuario, $clave, $base);

// Check connection
if (!$conexion) {
    die("fallo en la conexion: " . mysqli_connect_error());
}

$nivel=$_POST['nivel'];
if ($_POST['nombre']!="" && $_POST['pass']!="" ) {
	$nombre=$_POST['nombre'];
	$pass=$_POST['pass'];
	$sql="select * from usuario where nombre='$nombre'";
	$comprobacion=mysqli_query($conexion,$sql);
	if (mysqli_num_rows($comprobacion)==0) {
		$sql = "INSERT INTO usuario (nombre, pass, nivel)
VALUES ('$nombre', md5('$pass'), '$nivel')";
		mysqli_query($conexion,$sql);
		header("location:formulario.php?registro=correcto");
	}
	else header("location:formulario.php?usu_existe");
}
else {
	header("location:formulario.php?error_formulario=true");
}


echo "
<center>
<input type='button' value='Volver a inicio' onClick='javascript: location =\"index.php\";' />
</center>
";




if (isset($_GET['usu_existe'])) echo "<h2 align='center'>Ya existe un usuario con este nombre, por favor indique otro nombre de usuario. Gracias<h2/>";


mysqli_close($conexion); 


?> 

