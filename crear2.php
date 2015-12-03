<?php
echo '<!DOCTYPE html>
<html>
  <head>
    <title>Crear directorios</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
    <script type="text/javascript" src="jscript/utiles.js"> </script>
  </head>

  <body>';
  
     include 'seguridad.php';
     include 'conexion.php';
    //Enlaces para acceder a diferentes opciones
     include 'menu_sup.php';
echo "<table width='60%' border='0' align='center' cellspacing='0' cellpadding='2' class='fondotabla'><tr class='fondotabla' >";

//recogemos el nombre introducido en formulario
$crear=$_POST['crear'];
// si hay un valor y no es un valor igual a con(valor no permitido en windows): 
if ( isset($crear) and  $crear!="con" and $crear!=" " ) {
//si se ha creado correctamente muestra un texto y si no otro diferente
    if (ftp_mkdir($conn, $crear)) {
      echo "<tr class='fondotabla' ><td align='center'><font color='green'>El directorio <strong><font color='black'>".$crear." </font></strong> se ha creado correctamente</font></td></tr>";
                      }
    else {
      echo "<tr class='fondotabla' ><td align='center'><font color='red'>El directorio <strong><font color='black'>".$crear."</font> </strong>  no se ha creado correctamente</font></td></tr>" ;}
    }
//si no se ha escrito ningún  nombre de directorio, se le redirige a la página de crear.php con su correspondiente mensaje aclaratorio
else{header ("Location: crear.php?nocrear=si ");

}

?> 
    </table>
    <p align="center">
      <button class="link" onclick="window.location.href='/home.php'">Volver a Inicio</button>
      <button class="link" onclick="window.location.href='/crear.php'">Volver a Crear</button>
    </p>
  </body>
</html>
