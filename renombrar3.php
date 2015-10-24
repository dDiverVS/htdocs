<?php
echo '
<html>
  <head>
    <title>Renombrar ficheros</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
  </head>

  <body bgcolor="#EFE4B0">';
    include 'seguridad.php';
    include 'conexion.php'; 
    //Logotipo
    echo'
    <table width="100%" border="0" align="right" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <div align="left">
            <a href="home.php"> <img src="img/logo.png" title="Volver a Inicio" width="300" height="100" alt="Volver a Inicio"> </a>
          </div>
        </td>
        <td><div align="right">
          USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b><br/><br/>
          <a href="cerrar.php" class="button"/>Cerrar Sesion</a><br/>
        </div></td>
      </tr>
    </table>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>';
    //Enlaces para acceder a diferentes opciones-->
    echo'
    <table width="30%" border="0" align="center" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <div align="center">
            <a href="subida.php" class="button"/>Subir Fichero</a>
          </div>
        </td>
        <td>
          <div align="center">
            <a href="borrar.php" class="button"/>Borrar</a>
          </div>
        </td>
        <td>
          <div align="center">
            <a href="renombrar.php" class="button"/><span class="add">Renombrar </span></a>
          </div>
        </td>
        <td>
          <div align="center">
            <a href="crear.php" class="button"/>Crear Directorio</a>
          </div>
        </td>
        <td>
          <div align="center">
            <a href="descargar.php" class="button"/>Descargar</a>
          </div>
        </td>
      <tr>
    </table>
    <br />';

//si se ha pulsado el boton de enviar en renombrar2.php y el nuevo nombre no esta vacio:

  if ( isset($_POST['id_renombrar2']) && $_POST['id_renombrar2']!='') {

  $nombrenuevo=$_POST['id_renombrar2'];

  //si es renombrable, mostramos un texto afirmativo, en caso contrario indicamos que no se ha realizado
  		if  (ftp_rename($conn, $_SESSION['nombreantiguo'], $nombrenuevo))  { 
        
        echo "<h2 align='center'><font color='green'>El nombre del fichero  <strong><font color='black'>".$_SESSION['nombreantiguo']."</strong></font> ha cambiado por <font color='black'>".$nombrenuevo." </font>correctamente</h2>";
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