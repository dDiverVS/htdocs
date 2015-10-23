<!DOCTYPE html>
<html>
<head>
	<title>Hotel Relaxo</title>

</head>
<body>

<?php
include("alta_seg.php");

$servidor = "localhost";
$usuario = "root";
$clave = "inves";
$db = "hotelrelaxo";


// Create connection
$conexion = mysqli_connect($servidor, $usuario, $clave, $db);
  if (!$conexion) {
    die("Fallo en la conexi&oacute;n: " . mysqli_connect_error());
  }
if (isset($_POST['Borrar']) && isset($_POST['id_borrar'])){
	foreach ($_POST['id_borrar'] as $fila) {
		$sql="delete from alojamiento where num_habitacion=$fila";
		mysqli_query($conexion,$sql);
	}
	header("location: acceso.php");
}
elseif (isset($_POST['Modificar']) && $_POST['numerohab']!='número de habitación' && isset($_POST['tipohab']) && isset($_POST['id_modificar'])) {
	$numerohab=$_POST['numerohab'];
	$tipohab=$_POST['tipohab'];
	
	$sql="select * from alojamiento where num_habitacion='$numerohab'";
	$comprobacion=mysqli_query($conexion,$sql);
	if (mysqli_num_rows($comprobacion)==0) {
		$sql= "update alojamiento set num_habitacion='$numerohab',id_tipo='$tipohab' where num_habitacion=".$_POST['id_modificar'];
						mysqli_query($conexion,$sql);
		
	header("location: acceso.php");
	}
	else header("location:acceso.php?alo_existe");
}

elseif (isset($_POST['Insertar']) && $_POST['numerohab']!='número de habitación' && isset($_POST['tipohab']) ) {
	$numerohab=$_POST['numerohab'];
	$tipohab=$_POST['tipohab'];

	$sql="select * from alojamiento where num_habitacion='$numerohab'";
	$comprobacion=mysqli_query($conexion,$sql);
	if (mysqli_num_rows($comprobacion)==0) {
		$sql="insert into alojamiento (num_habitacion,id_tipo) values ($numerohab,$tipohab)";
		mysqli_query($conexion,$sql);
		
		header("location:acceso.php");
	}
	else header("location:acceso.php?aloja_existe");
}
else {
	header("location:acceso.php?error_formulario=true");
}
?>
</body>
</html>