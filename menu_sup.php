<?php
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
echo '

		
		<table width="100%" border="0" align="right" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<div align="left">
						<a href="home.php"> <img src="img/logo.png" title="Volver a Inicio" width="200" height="100" alt="Volver a Inicio"> </a>
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

		<br/>
		
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		
		<table width="30%" border="0" align="center" cellspacing="0" cellpadding="0" >
			<tr>
				<th class="enlaces">
					Cambiar Directorio
				</th>
				<th class="enlaces">
					Crear Directorio
				</th>
				<th class="enlaces">
					Renombrar
				</th>
				<th class="enlaces">
					Borrar
				</th>
				<th class="enlaces">
					Descargar fichero
				</th>
				<th class="enlaces">
					Subir fichero
				</th>
				
			<tr>
				<td>
					<div align="center">

						<a href="home.php" class="button"/><img class="zoomIt" ';
						if (strpos($url,'home')!== false) {
							echo 'class="seleccionado" ';
						}
						echo 'src="img/cambiar.png" title="Cambiar directorio " width="50" height="50" alt="Cambiar Directorio"></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="crear.php" class="button"/><img class="zoomIt"  ';
						if (strpos($url,'crear')!== false) {
							echo 'class="seleccionado" ';
						}
						echo ' src="img/directorio.jpg" title="Crear directorio" width="50" height="50" alt="Crear directorio"></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="renombrar.php" class="button"/><img class="zoomIt" ';
						if (strpos($url,'renombrar')!== false) {
							echo 'class="seleccionado" ';
						}
						echo '	src="img/modificar.jpg" title="Renombrar" width="50" height="50" alt="Renombrar"> </a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="borrar.php" class="button"/><img class="zoomIt" ';
						if (strpos($url,'borrar')!== false) {
							echo 'class="seleccionado" ';
						}
						echo 'src="img/borrar.jpg" title="Borrar" width="50" height="50" alt="Borrar"></a>
					</div>
				</td>
				
				
				<td>
					<div align="center">
						<a href="descargar.php" class="button"/><img class="zoomIt"  ';
						if (strpos($url,'descargar')!== false) {
							echo 'class="seleccionado" ';
						}
						echo 'src="img/download.png" title="Descargar fichero" width="50" height="50" alt="Descargar fichero"></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="subida.php" class="button"/><img class="zoomIt"  ';
						if (strpos($url,'subida')!== false) {
							echo 'class="seleccionado" ';
						}
						echo 'src="img/upload_file.jpg" title="Subir fichero" width="50" height="50" alt="Subir fichero"></a>
					</div>
				</td>
			<tr>
		</table>
';
?>