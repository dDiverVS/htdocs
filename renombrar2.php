

<html >
<head>
<title>Renombrar ficheros</title>
<link href="css/estilo.css"
      rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="image/ico" href="img/favicon.ico" />
</head>

<body bgcolor="#EFE4B0">
<form onsubmit="setTimeout('document.forms[0].reset()', 500)" action="renombrar3.php" method="POST" >
  <?php #Incluye el archivo de seguridad para mantener la sesion activa
  include 'seguridad.php'; ?> 
  <!--Logotipo-->
  <p align="center"><a href="inicio.php"> <img src="img/logo.png" title="Volver a Inicio" width="400" height="100" alt="Volver a Inicio"> </a></p>

  <!--Usuario actual y cierre de sesion-->
<?php echo' 
    <table width="15%" border="1" align="right" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center">
          USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b></br></br>
          <a href="cerrar.php" class="button"/>Cerrar Sesion</a></br>
        </td>
      </tr>
    </table>';?>
  </br></br>  </br></br>  </br></br>
<!--Enlaces para acceder a diferentes opciones-->
   <table width="30%" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="center">
        <a href="subida.php" class="button"/>Subir Fichero</a></div>
      </td>
      <td><div align="center">
        <a href="borrar.php" class="button"/>Borrar</span></a></div>
      </td>
      <td><div align="center">
        <a href="renombrar.php" class="button"/><span class="add">Renombrar </span></a></div>
      </td>
      <td><div align="center">
        <a href="crear.php" class="button"/>Crear Directorio</a></div>
      </td>
      <td><div align="center">
        <a href="descargar.php" class="button"/>Descargar</a></div>
      </td>
    <tr>
  </table>
<hr />
  <?php

//si se ha indicado un fichero y se ha pulsado enviar en renombrar.php se ejecuta lo siguiente:
if (isset($_POST['renombrar']) && isset($_POST['id_renombrar'])){

//recogemos el nombre antiguo del fichero en una variable de sesion que se conservará para el siguiente fichero
	$_SESSION['nombreantiguo']=$_POST['id_renombrar'];

      #Obtiene tamaño de archivo y lo pasa a KB
  $tamano=number_format(((ftp_size($conn,$_SESSION['nombreantiguo']))/1024),2)." Kb";
   
//si el tamaño no es inferior a 0, es un fichero y se muestra el nombre antiguo y un cuadro de texto para escribir el nombre nuevo
      if($tamano!="-0.00 Kb") {
       

        echo "<p align='center'><b>Nombre antiguo del fichero/directorio:</b>             ".$_SESSION['nombreantiguo']."  </br>
        <b>Nombre Nuevo del fichero/directorio:</b> <input type='text' name='id_renombrar2' size='25' maxlength='50' /></br></p>";}
      else{
//si el tamaño es inferior a 0, es un directorio y se muestra el nombre antiguo y un cuadro de texto para escribir el nombre nuevo que debe cumplir ciertas caracteristicas
        echo "<p align='center'><b>Nombre antiguo del fichero/directorio:</b>             ".$_SESSION['nombreantiguo']."  </br>
        <b>Nombre Nuevo del fichero/directorio:</b> <input type='text' name='id_renombrar2' size='25' maxlength='50' title='El nombre de los directorios no pueden contener \/:?*><\"|' pattern='[^ \"\x22 \"\\x5c \"\x2f \"\x3a \"\x3f \"\x2a \"\x3c \"\x3e \"\x7c ]+' /></br></p>";}
                               }
 //si no se ha indicado ningun fichero a renombrar, lo redirigimos a renombrar.php   
 else{ header ("Location: renombrar.php?norenombrar=si ");}
//el nuevo nombre es enviado a renombrar3.php
                         echo '
            
            <p align="center">
    <input name="renombrar2" type="submit" value="Renombrar " /></p></form> 

</body>
</html>';

?> 
