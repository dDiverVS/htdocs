<?php
echo '<!DOCTYPE html>
<html>
  <head>
    <title>Renombrar ficheros</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
	<script type="text/javascript" src="jscript/utiles.js"> </script>
  </head>

  <body>';
    include 'seguridad.php';
    include 'conexion.php'; 
    
    //Enlaces para acceder a diferentes opciones-->
    include 'menu_sup.php';

//si se ha pulsado el boton de enviar en renombrar2.php y el nuevo nombre no esta vacio:
echo "<table width='80%' border='0' align='center' cellspacing='0' cellpadding='2' class='fondotabla'><tr class='fondotabla' >";

  if ( isset($_POST['id_renombrar2']) && $_POST['id_renombrar2']!='') {

  $nombrenuevo=$_POST['id_renombrar2'];

  //si es renombrable, mostramos un texto afirmativo, en caso contrario indicamos que no se ha realizado
  		if  (ftp_rename($conn, $_SESSION['nombreantiguo'], $nombrenuevo))  { 
        
		
        echo "<tr class='fondotabla' ><td align='center'><font color='green'>El nombre del fichero/directorio  <strong><font color='black'>".$_SESSION['nombreantiguo2']."</strong></font> ha cambiado por <font color='black'><strong>".$nombrenuevo."</strong> </font><font color='green'>correctamente</font></td></tr>";
      }  
       else {  echo "<tr class='fondotabla' ><td align='center'><font color='red'> No se ha podido cambiar el nombre del fichero/directorio </font><strong><font color='black'>".$_SESSION['nombreantiguo2']."</strong></font></td></tr>";
      }
                        

  }

  //si el nuevo nombre esta vacio, lo redirigimos a renombrar.php
  else{ header ("Location: renombrar.php?norenombrar2=si ");
 }
                           
?> 
</table>
<p align="center">
<button class="link" onclick="window.location.href='/home.php'">Volver a Inicio</button>
<button class="link" onclick="window.location.href='/renombrar.php'">Volver a Renombrar</button></p>
</body>
</html>