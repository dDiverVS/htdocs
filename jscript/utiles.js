function confirmar()
{
	if(confirm(' \u00bfCerrar la sesi\u00f3n?'))
		return true;
	else
		return false;
}

 
function borrar()
{
	if(confirm(' \u00bfBorrar los ficheros seleccionados?'))
		return true;
	else
		return false;
}

function subidafichero()
{
	if(confirm(' \u00bfSubir ficheros seleccionados?(Si ya existen en el servidor, se sobreescribir\u00e1n)'))
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
