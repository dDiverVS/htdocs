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
    echo'
    <form  action="renombrar3.php" method="POST" >     ';

//Si se ha indicado un fichero en renombrar.php ,se ejecuta lo siguiente:

if ( isset($_POST['id_renombrar'])){

//recogemos el nombre antiguo del fichero en una variable de sesión que se conservará para el siguiente fichero:

  $_SESSION['nombreantiguo']=$_POST['id_renombrar'];
  $_SESSION['nombreantiguo2']=str_replace('./', '', $_SESSION['nombreantiguo']);

echo "  <p align='center'><b>Nombre antiguo del fichero/directorio:</b>".$_SESSION['nombreantiguo2']."<br/>
          <b>Nombre Nuevo del fichero/directorio:</b>
          <input type='text' class='barra' name='id_renombrar2' size='25' maxlength='100' title='El nombre de los directorios no pueden contener \/:?*><\"|' required pattern='[^ \"\x22 \"\\x5c \"\x2f \"\x3a \"\x3f \"\x2a \"\x3c \"\x3e \"\x7c ]+' /></br></p>";
}
//el nuevo nombre es enviado a renombrar3.php
echo '
        <p align="center">
          <button title="Renombrar" alt="Renombrar"  type="submit" value="" name="renombrar2"><img src=img/check.PNG WIDTH="30"  HEIGHT="30"/></button>
        </p>
    </form> 

';

?>

   <p align="center">
<!--Enlaces a Inicio o volver a renombrar-->
      <button class="link" onclick="window.location.href='/home.php'">Volver a Inicio</button>
      <button class="link" onclick="window.location.href='/renombrar.php'">Volver a Renombrar</button>
    </p>
  </body>
</html>
