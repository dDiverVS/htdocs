<?php
echo '
<html>
  <head>
    <title>Crear directorios</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
  </head>

  <body bgcolor="#EFE4B0">';
    //Logotipo
    echo '
    <table width="100%" border="0" align="right" cellspacing="0" cellpadding="0">
      <tr>
        <td>
          <div align="left">
            <a href="home.php"> <img src="img/logo.png" title="Volver a Inicio" width="300" height="100" alt="Volver a Inicio"> </a>
          </div>
        </td>
        <td><div align="right">
          USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b><br/><br/>
          <a href="cerrar.php" class="button"/><br/>
          <img src="img/exit.png" title="Cerrar Sesion" width="50" height="50" alt="Cerrar Sesion"></a><br/>
        </div></td>
      </tr>
    </table>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>';
    //Enlaces para acceder a diferentes opciones
    echo '
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
            <a href="renombrar.php" class="button"/>Renombrar </a>
          </div>
        </td>
        <td>
          <div align="center">
            <a href="crear.php" class="button"/><span class="add">Crear Directorio</span></a>
          </div>
        </td>
        <td>
          <div align="center">
            <a href="descargar.php" class="button"/>Descargar</a>
          </div>
        </td>
      </tr>
    </table>
    <br/>';

//recogemos el nombre introducido en formulario
$crear=$_POST['crear'];
// si hay un valor y no es un valor vacio 
if ( isset($crear) and $crear!=""){
//si se ha creado correctamente muestra un texto y si no otro diferente
		if (ftp_mkdir($conn, $crear)) {
      echo "<h2 align='center'><font color='green'>El directorio <strong><font color='black'>".$crear." </font></strong> se ha creado correctamente</font></h2>";
     								  }
		else {
      echo "<h2 align='center'><font color='red'>El directorio <strong><font color='black'>".$crear."</font> </strong>  no se ha creado correctamente</font></h2>"	;}
    }
//si no se ha escrito ningun  nombre de directorio, se le redirige a la pagina de crear.php con su correspondiente mensaje aclaratorio
else{header ("Location: crear.php?nocrear=si ");

}



?> 

</body>
</html>