<?php
echo '
<html>
<head>
	<title align="center">FTP-WEB</title>
	<link rel="icon" type="image/ico" href="img/favicon.ico" />
</head>
<body  background="img/fondo.jpeg">
	<!--Formulario de acceso al servidor FTP-->
	<form action="acceso.php" method="POST" >
		<h1 align="center"> FTP-WEB</h1>
		<table align="center" width="300" cellspacing="2" cellpadding="2" border="0">
			<tr>
				</br>
					<td colspan="10" align="center"> <b> Indique su usuario del servicio FTP</b>
				</td>';
				
				if ( isset($_GET["errorconexion"])){# si la direccion FTP es erronea o no hay acceso al servidor, aparece este mensaje
		  		if ($_GET["errorconexion"]=="si") echo "<h2 align='center'><font color='red'>No se ha podido realizar la conexion a dicha direcci&oacute;n</font></h2>";}
				#Si el usuario o contraseña de dicho servidor son erroneas, aparece este mensaje 
				if ( isset($_GET["errorusuario"])){
	 			if ($_GET["errorusuario"]=="si") echo "<h2 align='center' ><font color='red'>Datos incorrectos.Introduzca usuario o contrase&ntilde;a correcta</font></h2>";}
	 		echo '
			</tr>
			<tr>
				<td align="right"> Nombre o direcci&oacute;n del servidor FTP:</td>
				<td><input type="text" name="servidor" size="15" maxlength="50"></td>
			</tr>
			<tr>
				<td align="right" >Puerto: (21 por defecto)</td>
				<td><input type="text" name="puerto" size="15" maxlength="50" Value="21"></td>
			</tr>
			<tr>
				<td align="right"> Usuario:</td>
				<td><input type="Text" name="usuario" size="15" maxlength="50"></td>
			</tr>
			<tr>
				<td align="right" >Contrase&ntilde;a:</td>
				<td><input type="password" name="contrasena" size="15" maxlength="50"></td>
			</tr>
			<!--<tr>
				<td align="right" >Conexion SSL</td>
				<td><input type="checkbox" name="SSL" value="1"/></td>
			</tr>-->
			<tr>
				<td colspan="2" align="center"><input type="Submit" value="ENTRAR"></td>
			</tr>
		</table>
	</form>
</body>
</html>';
?>