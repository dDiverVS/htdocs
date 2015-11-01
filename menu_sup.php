<?php
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

echo '			
		  		<span class="datos" >
						<!--SISTEMA: <b>'.php_uname("s").'</b><br/><br/>-->
						SERVIDOR:  <b>'.$_SESSION["servidor"].'</b><br/><br/>
						USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b><br/><br/>
						DIRECTORIO ACTUAL: <b>'.$_SESSION["carpeta_actual"].'</b><br/><br/>
						
						
					
				</span>
			
		
				<span class="logo" >
					
						<a href="home.php"> <img src="img/logo.png" alig title="Volver a Inicio" width="350" height="100" alt="Volver a Inicio"> </a>
					
				</span>
				<span class="enlaces" >
					
					<b>Cerrar Sesi&oacute;n</b>
				</span>
				<span class="iconocerrar" >
					<a href="cerrar.php" class="button">
					<img class="zoomIt"   src="img/exit.png" title="Cerrar Sesion" width="50" height="50" alt="Cerrar Sesion"></a>
				
				</span>
			
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		
		<table width="30%" border="0" align="center" cellspacing="3" cellpadding="3" >
			<tr>
				<th class="enlaces ';
						if (strpos($url,'descargar')!== false) {
							echo 'seleccionado" ';
						}
						echo '">
					Descargar fichero
				</th>
				<th class="enlaces ';
						if (strpos($url,'subida')!== false) {
							echo 'seleccionado" ';
						}
						echo '">
					Subir fichero
				</th>
				<th class="enlaces ';
						if (strpos($url,'borrar')!== false) {
							echo 'seleccionado" ';
						}
						echo '">
					Borrar
				</th>
				<th class="enlaces ';
						if (strpos($url,'crear')!== false) {
							echo 'seleccionado" ';
						}
						echo '" >
					Crear Directorio
				</th>
				<th class="enlaces ';
						if (strpos($url,'renombrar')!== false) {
							echo 'seleccionado" ';
						}
						echo '">
					Renombrar
				</th>
			</tr>

			<tr>
				<td>
					<div align="center">
						<a href="descargar.php" class="button"/><img class="zoomIt ';
						if (strpos($url,'descargar')!== false) {
							echo 'seleccionado2" ';
						}
						echo ' " src="img/download.png" title="Descargar fichero" width="50" height="50" alt="Descargar fichero"></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="subida.php" class="button"/><img class="zoomIt ';
						if (strpos($url,'subida')!== false) {
							echo 'seleccionado2" ';
						}
						echo '" src="img/upload_file.jpg" title="Subir fichero" width="50" height="50" alt="Subir fichero"></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="borrar.php" class="button"/><img class="zoomIt ';
						if (strpos($url,'borrar')!== false) {
							echo 'seleccionado2" ';
						}
						echo ' " src="img/borrar.jpg" title="Borrar" width="50" height="50" alt="Borrar"></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="crear.php" class="button"/><img class="zoomIt ';
						if (strpos($url,'crear')!== false) {
							echo 'seleccionado2" ';
						}
						echo '"   src="img/directorio.jpg" title="Crear directorio" width="50" height="50" alt="Crear directorio"></a>
					</div>
				</td>
				<td>
					<div align="center">
						<a href="renombrar.php" class="button"/><img class="zoomIt ';
						if (strpos($url,'renombrar')!== false) {
							echo 'seleccionado2" ';
						}
						echo '" src="img/modificar.jpg" title="Renombrar" width="50" height="50" alt="Renombrar"> </a>
					</div>
				</td>
				
				
				
				
			<tr>
		</table>
';
?>