<?php
echo '
<html>
  <head>
    <title>Crear directorios</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href="img/favicon.ico" />
  </head>

  <body bgcolor="#EFE4B0">';
  
     include 'seguridad.php';
     include 'conexion.php';
    
    //Enlaces para acceder a diferentes opciones
    include 'menu_sup.php';

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