<?php
//En función de la sección en la que estemos, el valor de la variable url variará:
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
echo '			<!--Datos, Logotipo e Icono de cierre de sesión-->		  	
				<table width="80%" border="0" class="petarda" align="center" cellspacing="3" cellpadding="3" >
					<tr>		
						<td width="25%"  class="datos">
							SERVIDOR:  <b>'.$_SESSION["servidor"].'</b><br/><br/>
							USUARIO ACTUAL: <b>'.$_SESSION["usuario"].'</b><br/><br/>
							DIRECTORIO ACTUAL: <b>'.str_replace('//', '/',$_SESSION["carpeta_actual"]).'</b><br/><br/>
						</td>
						<td width="50%" align="center">	
							<a href="home.php" class="logotipo"> <h1 align="center"> FTP-WEB</h1> </a>
						</td>
						<td witdth="25%" align="center">
							<font color="green">	<b>Cerrar Sesi&oacute;n</b></font><br/>
							<a href="cerrar.php" align="center"  onclick="return confirmar()">    
							<img src="img/exit.PNG" align="center" title="Cerrar Sesion" width="50" height="50" alt="Cerrar Sesion"></a>
						</td>
					</tr>
				</table>
				<br/>
				<br/>
				<!--Tabla con los botones que dirigen a las diferentes secciones-->
				<table width="80%" border="0" align="center" cellspacing="3" cellpadding="3" >
					<tr>
						<td width="20%"align="center" class="enlaces';
								if (strpos($url,'descargar')!== false) {
									echo ' seleccionado';
								}else echo' ajeno';
								echo '">
							Descargar fichero
						</td>
						<td width="20%" align="center" class="enlaces';
								if (strpos($url,'subida')!== false) {
									echo ' seleccionado';
								}else echo' ajeno';
								echo '">
							Subir fichero
						</td>
						<td width="20%" align="center" class="enlaces';
								if (strpos($url,'borrar')!== false) {
									echo ' seleccionado';
								}else echo' ajeno';
								echo '">
							Borrar
						</td>
						<td width="20%" align="center" class="enlaces';
								if (strpos($url,'crear')!== false) {
									echo ' seleccionado';
								}else echo' ajeno';
								echo '">
							Crear Directorio
						</td>
						<td width="20%" align="center" class="enlaces';
								if (strpos($url,'renombrar')!== false) {
									echo ' seleccionado';
								}else echo' ajeno';
								echo '">
							Renombrar
						</td>
					</tr>
					<tr>
						<td>
							<div align="center">
								<a href="descargar.php" class="button"/><img class="zoomIt';
								if (strpos($url,'descargar')!== false) {
									echo ' seleccionado2';
								}else echo' ajeno2';
								echo ' " src="img/download.PNG" title="Descargar fichero" width="50" height="50" alt="Descargar fichero"></a>
							</div>
						</td>
						<td>
							<div align="center">
								<a href="subida.php" class="button"/><img class="zoomIt';
								if (strpos($url,'subida')!== false) {
									echo ' seleccionado2';
								}else echo' ajeno2';
								echo '" src="img/upload_file.PNG" title="Subir fichero" width="50" height="50" alt="Subir fichero"></a>
							</div>
						</td>
						<td>
							<div align="center">
								<a href="borrar.php" class="button"/><img class="zoomIt';
								if (strpos($url,'borrar')!== false) {
									echo ' seleccionado2';
								}else echo' ajeno2';
								echo ' " src="img/borrar.PNG" title="Borrar" width="50" height="50" alt="Borrar"></a>
							</div>
						</td>
						<td>
							<div align="center">
								<a href="crear.php" class="button"/><img class="zoomIt';
								if (strpos($url,'crear')!== false) {
									echo ' seleccionado2';
								}else echo' ajeno2';
								echo '"   src="img/directorio.PNG" title="Crear directorio" width="50" height="50" alt="Crear directorio"></a>
							</div>
						</td>
						<td>
							<div align="center">
								<a href="renombrar.php" class="button"/><img class="zoomIt';
								if (strpos($url,'renombrar')!== false) {
									echo ' seleccionado2';
								}else echo' ajeno2';
								echo '" src="img/modificar.PNG" title="Renombrar" width="50" height="50" alt="Renombrar"> </a>
							</div>
						</td>
					</tr>
				</table>
			
';
?>
