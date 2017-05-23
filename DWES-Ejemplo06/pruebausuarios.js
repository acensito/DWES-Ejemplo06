

//Al cargar la pagina...
window.onload = function(){
    //Llamamos a la función renderizaTabla para que dibuje la tabla actualizada
    renderizaTabla();
};


/**
 * Funcion renderizaTabla, que llamará a la funcion correspondiente xajax en el
 * lado servidor.
 */
function renderizaTabla(){
    //Llamamos a la funcion correspondiente que devolvera los datos de la tabla
    xajax_mostrarUsuarios();
}

/**
 * Funcion eliminarUsuario, al que se le pasará como parametro 
 * Esta función se activará con el evento onclick de los botones de eliminar
 * 
 * @param {type} idUsuario id del usuario a eliminar
 */
function eliminarUsuario(idUsuario){
    //Preguntamos si queremos eliminar el usuario, en caso positivo, pues lo que
    //hacemos es proceder a llamar a la funcion y pasarle el parametro del id
    //del usuario que queremos eliminar
    if(confirm('¿Desea eliminar este usuario?')){
        //console.log(idUsuario);
        xajax_eliminarUsuario(idUsuario);
    }
}








////// JavaScript Document
//
//function pedirAutorizacion(id){
//	
//	//alert(id);
//	//sale el numero id, el 1,2,3...
//    // Desactivamos el botón para no permitir dos pulsaciones y evitar errores.
//	xajax.$(id).disabled=true;
//    var borrarUsuario = confirm("¿Está seguro de que desea borrar al usuario?");
//	
//	
//if (borrarUsuario){
//		xajax_eliminarUsuario(id);
//	}else{
//		// Si el usuario no quiere borrar el registro debemos activar de nuevo el botón.
//		xajax.$(id).disabled=false;
//	}
//	
//	return borrarUsuario;
//}