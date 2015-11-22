function confirmar()
{
	if(confirm('Estas seguro de cerrar la sesion?'))
		return true;
	else
		return false;
}

 
function borrar()
{
	if(confirm('Estas seguro de borrar los ficheros seleccionados?'))
		return true;
	else
		return false;
}

function subidafichero()
{
	if(confirm('Subir ficheros seleccionados?(Si ya existen en el servidor, se sobreescribir&aacute;n)'))
		return true;
	else
		return false;
}
function seleccionar_todo(){ 
   for (i=0;i<document.borrar_ftp.elements.length;i++) 
      if(document.borrar_ftp.elements[i].type == "checkbox")	
         document.borrar_ftp.elements[i].checked=1 
} 
function deseleccionar_todo(){ 
   for (i=0;i<document.borrar_ftp.elements.length;i++) 
      if(document.borrar_ftp.elements[i].type == "checkbox")	
         document.borrar_ftp.elements[i].checked=0 
}
