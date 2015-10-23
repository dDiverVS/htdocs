

<html>
<title align="center">HOTEL RELAXO</title>


<h1 align="center"><font color="#00CC00">HOTEL RELAXO</font></h1>
<body bgcolor="#FFFFCC">
<h2 align="center">Registrese en nuestra pagina</h2></br>
<form method="post" action="ingresarusuario.php" align="center">




Nombre: <input type="text" name="nombre"><br><br>
Contrase&ntilde;a: <input type="password" name="pass" maxlength="8"></br><br>
Nivel: <select name="nivel" id="nivel"  tabindex="2" >
				    <option value="0" selected="selected">0</option>
				    <option value="1">1</option>
				    
</select>



<input type="submit" value="Registrar"/>



</form>
<?php
include "alta_seg.php";

if (isset($_GET['error_formulario'])=='true') echo "<h3 align='center'>Por favor, introduzca los valores  en los campos y no deje ninguno vac&iacute;o<h3/>";
	if (isset($_GET['usu_existe'])) echo "<h2 align='center'>Usuario repetido.Introduzca otro nombre.<h2/>";
	if (isset($_GET['registro'])=='correcto') echo "<h2 align='center'>Su cuenta ha sido creada con el exito m&aacute;s rotundo<h2/>";
echo "
<center>
<input type='button' value='Volver a inicio' onClick='javascript: location =\"index.php\";' /></br>
<input type='button' value='Atras' onClick='javascript: location =\"acceso.php\";' />
</center>";
?>

</body>
</html>


