<?php
echo '

		
		<table width="100%" border="0" align="right" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<div align="left">
						<a href="home.php"> <img class="zoomIt" src="img/logo.png" title="Volver a Inicio" width="300" height="100" alt="Volver a Inicio"> </a>
					</div>
				</td>
				<td>
					<div align="center">
					SERVIDOR:  <b>'.$_SESSION["servidor"].'</b><br/><br/>
					USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b><br/><br/>
					DIRECTORIO ACTUAL: <b>'.$_SESSION["carpeta_actual"].'</b><br/><br/>
					</div>
				</td>
				<td>
					<div align="right">
					Cerrar Sesi&oacute;n<br/><br/>
					<a href="cerrar.php" class="button"/>
					<img class="zoomIt" src="img/exit.png" title="Cerrar Sesion" width="50" height="50" alt="Cerrar Sesion"></a><br/>
					</div>
				</td>
			</tr>
		</table>
		<hr/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<table width="30%" border="0" align="center" cellspacing="0" cellpadding="0" >
			<tr>
				<td>
					<div align="center"><p id="enlaces1">Cambiar Directorio</p>
						<a href="home.php" class="button"/><img class="zoomIt" src="img/cambiar.png" title="Cambiar directorio " width="50" height="50" alt="Cambiar Directorio"></a>
					</div>
				</td>
				<td>
					<div align="center"><p id="enlaces2">Borrar</p>
						<a href="borrar.php" class="button"/><img class="zoomIt" src="img/borrar.jpg" title="Borrar" width="50" height="50" alt="Borrar"></a>
					</div>
				</td>
				<td>
					<div align="center"><p id="enlaces3">Renombrar</p>
						<a href="renombrar.php" class="button"/><img class="zoomIt"  src="img/modificar.jpg" title="Renombrar" width="50" height="50" alt="Renombrar"> </a>
					</div>
				</td>
				<td>
					<div align="center"><p id="enlaces4">Crear Directorio</p>
						<a href="crear.php" class="button"/><img class="zoomIt" src="img/directorio.jpg" title="Crear directorio" width="50" height="50" alt="Crear directorio"></a>
					</div>
				</td>
				<td>
					<div align="center"><p id="enlaces5">Descargar Fichero</p>
						<a href="descargar.php" class="button"/><img class="zoomIt" src="img/download.png" title="Descargar fichero" width="50" height="50" alt="Descargar fichero"></a>
					</div>
				</td>
				<td>
					<div align="center"><p id="enlaces6">Subir Fichero</p>
						<a href="subida.php" class="button"/><img class="zoomIt" src="img/upload_file.jpg" title="Subir fichero" width="50" height="50" alt="Subir fichero"></a>
					</div>
				</td>
			<tr>
		</table>
';
?>