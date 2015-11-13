<?php
include 'seguridad.php';
include 'conexion.php';
$lista_bruta=ftp_rawlist($conn,'.');
$lista=ftp_nlist($conn,'.'); #Devuelve un array con los nombres de ficheros
print_r($lista_bruta);
echo "<br/>";
print_r($lista);
?>