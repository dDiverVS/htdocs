<html>
<head>
<title align="center">HOTEL RELAXO</title>
</head>
<body bgcolor="#FFFFCC">
<h1 align="center"><font color="#00CC00">HOTEL RELAXO</font></h1>

<form action="control.php" method="POST" >
<table align="center" width="255" cellspacing="2" cellpadding="2" border="0">
<tr>
</br>
<td colspan="10" align="center"> <b> ADMINISTRACION DEL HOTEL RELAXO</b></td>
<?php 

if (isset($_GET["forbidden"])) {
  echo "<h2 id='forbidden' align='center'>Este usuario tiene Nivel 0 y no puede acceder a dicho sitio</h2>";
}
if ( isset($_GET["errorusuario"])){
  if ($_GET["errorusuario"]=="si") echo "<h2 align='center'>Datos incorrectos, Introduce tu clave de acceso</h2>";
}
?>
</tr>
<tr>
<td align="right"> Usuario:</td>
<td><input type="Text" name="usuario" size="8" maxlength="50"></td>
</tr>
<tr>
<td align="right" >Contrase&ntilde;a:</td>
<td><input type="password" name="contrasena" size="8" maxlength="50"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="Submit" value="ENTRAR"></td>
</tr>
</table>
</form>

<p align="center"><img src="hotelportada.jpg"  height="500" width="500" alt="imagen del hotel"/></p>


<?php
$servidor = "localhost";
$usuario = "root";
$clave = "inves";
$db = "hotelrelaxo";


// Create connection
$conexion = mysqli_connect($servidor, $usuario, $clave, $db);
  if (!$conexion) {
    die("Fallo en la conexiÃ³n: " . mysqli_connect_error());
  }


$sql = "SELECT   tipo_habitacion, Imagen FROM  tipo_habitacion  order by rand() limit 1";
$resultado = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($resultado) > 0) {

    echo "<h3 align='center'>Recomendaciones </h3></br><table border='1' align='center'> ";
    //sacar los nombres de los campos
    echo "<tr>";
    $columna=mysqli_fetch_fields($resultado);
    foreach ($columna as $valor) echo "<th>".$valor->name."</th>";
  //  if ($_SESSION['nivel']==1)  echo "<th>Imagen</th>";

    echo "</tr>";
   //  $x=1;
    //Numeric array $row=mysqli_fetch_array($result,MYSQLI_NUM);
    while($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
      echo "<tr>";
for ($i=0; $i < 1; $i++) { 
	echo "<td>$fila[$i]</td>";
}
echo "<td><img src='$fila[1]' width='200px'/></td>";
      echo "</tr>";
			
	      }
	   echo "<tr>";
	   
	  
	    echo "</tr>";
    echo "</table>";
}
else {
  echo "0 resultados";
}

mysqli_close($conexion);

?>
</body>
</html>