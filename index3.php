<?php

//Hazte cuenta de que puede tardar más de 30 segundos.
set_time_limit(0);

//Conectamos al host
$FtpConn = ftp_connect("127.0.0.1");

//Nos autentificamos como usuarios registrados o anónimos
if(!ftp_login($FtpConn,"angel","inves")){
	echo "No se ha podido realizar la conexión";
	exit;
}

//Obtenemos el directorio actual
$directorio = ftp_pwd($FtpConn);

echo "<b>El directorio actual es: </b>".$directorio;

//Obtenemos el listado del directorio actual
$lista = array();
$lista = ftp_nlist($FtpConn,$directorio);

//Mostramos sus contenidos
echo "<B><CENTER>CONTENIDOS DEL DIRECTORIO / (RAÍZ)</CENTER></B>";

echo "<pre>";
print_r($lista);
echo "</pre>";

include 'chdir.php';

//Almacenamos el directorio actual
$directorio2 = ftp_pwd($FtpConn);

//Obtenemos el listado del directorio actual
$list = array();
$list = ftp_nlist($FtpConn,$directorio2);

//Mostramos su contenido
echo "<B><CENTER>CONTENIDOS DEL DIRECTORIO Prueba</CENTER></B>";

echo "<pre>";
print_r($list);
echo "</pre>";



//Tansferimos un fichero
if(!ftp_get($FtpConn,"test.txt","test.txt",FTP_BINARY)){
	echo "Imposible recuperar fichero test.txt";
	exit;
}

/*

ESTO NO ES POSIBLE VERLO FUNCIONANDO
//Cargamos un fichero
if(!ftp_put($FtpConn,"ind.txt","",FTP_BINARY)){
	echo "Imposible cargar el fichero";
	exit;
}

*/
?>