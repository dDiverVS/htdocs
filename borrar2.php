<?php
echo '<!DOCTYPE html>
<html>
  <head>
    <title>Eliminar ficheros</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
	<script type="text/javascript" src="jscript/utiles.js"> </script>
  </head>

  <body bgcolor="#EFE4B0">';
 
     include 'seguridad.php';
     include 'conexion.php';
    
    
    //Enlaces para acceder a diferentes opciones
   include 'menu_sup.php';

// si se ha indicado algun fichero y se ha pulsado a enviar, recoge cada elemento indicado para borrar del array y por cada valor, se introduce en la variable  $borrar
echo "<table width='80%' border='0' align='center' cellspacing='0' cellpadding='2' class='fondotabla'><tr class='fondotabla' >";
if (isset($_POST['Borrar']) && isset($_POST['id_borrar'])){
	foreach ($_POST['id_borrar'] as $borrar)  {

    
  $tamano=number_format(((ftp_size($conn,$borrar))/1024),2)." Kb";#Obtiene tamaño de archivo y lo pasa a KB, de esta forma diferenciamos carpetas de ficheros y ejecutar el comando que elimina carpetas o ficheros en funcion de esto
      if($tamano!="-0.00 Kb") {
       
   
		          if (ftp_delete($conn, $borrar)==true) { 
      
                           echo "<tr class='fondotabla' ><td align='center'><font color='green'>El fichero <strong><font color='black'>".$borrar." </font></strong> se ha eliminado correctamente</font></td></tr>";
              }  
               else {      echo "<tr class='fondotabla'><td align='center's ><font color='red'>El fichero <strong><font color='black'>".$borrar." </font></strong>  no se ha eliminado correctamente</font></td></tr>";
              }

      }

                                 
                                    
      if($tamano=="-0.00 Kb") {
      

               if (ftp_rmdir($conn, $borrar)==true) { 
               echo "<tr class='fondotabla'><td  align='center' ><font color='green'>El directorio <strong><font color='black'>".$borrar." </font></strong> se ha eliminado correctamente</font></td></tr>";
               }  
               else {      echo "<tr class='fondotabla'><td align='center' ><font color='red'>El directorio <strong><font color='black'>".$borrar." </font></strong>  no se ha eliminado correctamente o no esta vacio</font></td></tr>";
               }
                                   
    
        }               
  }                                                       
}else{ #si no esta marcado ningun fichero, se renvia a la pagina principal de borrar indicandole un mensaje
        header ("Location: borrar.php?noborrar=si "); }

?>
</table>
<p align="center">
<button class="link" onclick="window.location.href='/home.php'">Volver a Inicio</button>
</p></body>
</html>