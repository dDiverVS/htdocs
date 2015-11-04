<?php
echo '<!DOCTYPE html>
<html>
  <head>
    <title>Renombrar ficheros</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
	<script type="text/javascript" src="jscript/utiles.js"> </script>
  </head>

  <body bgcolor="#EFE4B0">';
    include 'seguridad.php';
    include 'conexion.php'; 
    
    //Enlaces para acceder a diferentes opciones-->
    include 'menu_sup.php';

//si se ha pulsado el boton de enviar en renombrar2.php y el nuevo nombre no esta vacio:

  if ( isset($_POST['id_renombrar2']) && $_POST['id_renombrar2']!='') {

  $nombrenuevo=$_POST['id_renombrar2'];

  //si es renombrable, mostramos un texto afirmativo, en caso contrario indicamos que no se ha realizado
  		if  (ftp_rename($conn, $_SESSION['nombreantiguo'], $nombrenuevo))  { 
        
        echo "<h2 align='center'><font color='green'>El nombre del fichero/directorio  <strong><font color='black'>".$_SESSION['nombreantiguo']."</strong></font> ha cambiado por <font color='black'>".$nombrenuevo." </font>correctamente</h2>";
      }  
       else {  echo "<h2 align='center'><font color='red'>No se ha podido cambiar el nombre del fichero/directorio </font><strong><font color='black'>". $_SESSION['nombreantiguo']."</strong></h2>";
      }
                        

  }

  //si el nuevo nombre esta vacio, lo redirigimos a renombrar.php
  else{ header ("Location: renombrar.php?norenombrar2=si ");
 }
                           
?> 

</body>
</html>