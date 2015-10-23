<html>
<head>
<title align="center">HOTEL RELAXO</title>
</head>
<body bgcolor="#FFFFCC">
<h1 align="center"><font color="#00CC00">HOTEL RELAXO</font></h1>
</body></html>

<?php
include("seguridad.php");
$servidor = "localhost";
$usuario = "root";
$clave = "inves";
$db = "hotelrelaxo";


// Create connection
$conexion = mysqli_connect($servidor, $usuario, $clave, $db);
  if (!$conexion) {
    die("Fallo en la conexiÃ³n: " . mysqli_connect_error());
  }
echo '<html>

<head>
<title align="center">HOTEL RELAXO</title>
</head>
<body >
<p align="center"><img src="phpbb_logo.png"  height="150" width="150" alt="imagen del hotel"/></p>
<h2 align="center">Bienvenido al Hotel Relaxo</h2>
</body>
</html>';
echo "
<center>
</br>
";
if ($_SESSION['nivel']==1) echo "<input type='button' value='REGISTRAR USUARIOS' onclick='window.location.href=\"formulario.php\"'/></br>";

if ($_SESSION["autentificado"]=="SI") echo "<input type='button' value='Cerrar Sesi&oacute;n' onclick='window.location.href=\"cerrar.php\"'/>";
echo "
</center>
";

$sql = "SELECT  num_habitacion, tipo_habitacion, Imagen FROM alojamiento  join  tipo_habitacion on alojamiento.id_tipo=tipo_habitacion.id_tipo order by num_habitacion";
$resultado = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($resultado) > 0) {
    echo "<form action='modificacion.php' method='POST'><table border='1' align='center'> ";
    //sacar los nombres de los campos
    echo "<tr>";
    $columna=mysqli_fetch_fields($resultado);
    foreach ($columna as $valor) echo "<th>".$valor->name."</th>";
  //  if ($_SESSION['nivel']==1)  echo "<th>Imagen</th>";
if ($_SESSION['nivel']==1)	echo "<th>Modificar</th>";
if ($_SESSION['nivel']==1)	echo "<th>Borrar</th>";
    echo "</tr>";
   //  $x=1;
    //Numeric array $row=mysqli_fetch_array($result,MYSQLI_NUM);
    while($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
      echo "<tr>";
for ($i=0; $i < 2; $i++) { 
	echo "<td>$fila[$i]</td>";
}
echo "<td><img src='$fila[2]' width='200px'/></td>";
       
    //    echo "<td><img src='./img/$x.jpg' width='100'/></td>"; 
   //     $x++;
	if ($_SESSION['nivel']==1)	echo "<td><input type='radio' name='id_modificar' value='$fila[0]'/></td>";
	if ($_SESSION['nivel']==1)	echo "<td><input type='checkbox' name='id_borrar[]' value='$fila[0]'/></td>";
    

      echo "</tr>";
	 
		
	
      }
	   echo "<tr>";
	   
	  
	    echo "</tr>";
    echo "</table>";
if ($_SESSION['nivel']==1)	 echo "<center>
  </br><h3 align='center'>INTRODUZCA VALORES PARA INSERTAR O MODIFICAR LA TABLA DE ALOJAMIENTO</h3></br>
Numero de Habitaci&oacute;n[1-20]
	<input type='number' min='1' max='20' name='numerohab' value='n&uacute;mero de habitaci&oacute;n'/>
	</br>";
	$sql2 = "SELECT  * FROM tipo_habitacion";
	$consulta2=mysqli_query($conexion,$sql2);
if ($_SESSION['nivel']==1)echo "Tipo de habitaci&oacute;n
	   <select name='tipohab'  tabindex='2' >";
		while ($valor=mysqli_fetch_array($consulta2))
		if ($_SESSION['nivel']==1)	echo "<option value='$valor[0]'>$valor[1]</option>";
	if ($_SESSION['nivel']==1)	echo "</select></br>

	 	<input type='submit' value='Insertar' name='Insertar'/>
		<input type='submit' value='Borrar' name='Borrar'/>
		<input type='submit' value='Modificar' name='Modificar'/>
		
		</center>
	</form>";
//echo '<center><form action="subir.php" method="post" enctype="multipart/form-data"> Selecciona una imagen para subir:    <input type="file" name="fichero" id="fichero"> <input type="submit" value="Subir imagen" name="submit"></form></center>';
}
else {
  echo "0 resultados";
}



/*echo "<h3 align=ga'center'> CONSULTA MULTITABLA </h3>";
$sql_multi = "SELECT alojamiento.id_alojamiento, num_habitacion, alojamiento.tipo_habitacion, alojamiento.precio_habitacion, reserva_alojamiento.dni_cliente FROM alojamiento join reserva_alojamiento on alojamiento.id_alojamiento=reserva_alojamiento.id_alojamiento";
$resultado = mysqli_query($conexion, $sql_multi);
  if (mysqli_num_rows($resultado) > 0) {
    echo"<table border='1' align='center'> ";
    //sacar los nombres de los campos
    echo "<tr>";
    $columna=mysqli_fetch_fields($resultado);
    foreach ($columna as $valor) echo "<th>".$valor->name."</th>";
	
    echo "</tr>";
    //Numeric array $row=mysqli_fetch_array($result,MYSQLI_NUM);
    while($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
      echo "<tr>";
      foreach($fila as $valor )
        {
        echo "<td>" . $valor . "</td>";
        }
      }
	   echo "<tr>";
  }
	  
	    echo "</tr>";
    echo "</table>";*/
mysqli_close($conexion);


?>