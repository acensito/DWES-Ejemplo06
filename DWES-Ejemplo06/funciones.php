<?php
require_once('include/DB.php');
require_once('xajax/xajax_core/xajax.inc.php');

/**
 * Funcion mostrarUsuarios, que obtiene los usuarios de la base de datos y elabora
 * una tabla que devolverá a la etiqueta div con ID tablaUsuarios. En el caso de
 * no existir usuarios en la base de datos, mostrará en la tabla un mensaje.
 * 
 * @return \xajaxResponse
 */
function mostrarUsuarios(){
    //Preparamos la respuesta XAJAX que vamos a devolver
    $response = new xajaxResponse();
    
    //Llamamos a la base de datos para obtener los usuarios
    $usuarios = DB::obtenerUsuarios();   
    //Comenzamos a dibujar la tabla
    $texto = "";
    $texto .=  "<table>";
    $texto .=  "<tr><td>ID</td>"
            . "<td>USUARIO</td>"
            . "<td>CONTRASEÑA</td>"
            . "<td>NOMBRE</td>"
            . "<td>AP1</td>"
            . "<td>AP2</td>"
            . "<td>TLF</td"
            . "><td>ELIMINAR</td></tr>";
    //MODIFICACION: Incluimos un IF para dibujar la tabla o mostrar un mensaje
    //dependiendo si existen usuarios o no
    //Si existen usuarios devueltos por la BD
    if ($usuarios){
        //Recorremos los usuarios creando filas de la tabla
        foreach ($usuarios as $u){
            //MODIFICACION: Eliminamos el formulario porque no es necesario realizar 
            //un formulario dentro de la tabla para eliminar una fila, con solo
            //un boton asignandole el id, al crear un evento que escuche esos 
            //botones, recuperamos el id que tiene y llamaremos a la funcion
            //eliminar correspondiente pasandole como parametro el id
            //
            //Tambien lo ordeno el texto de esta manera, porque es más comodo de 
            //ver en pantalla
            $texto .=  "<tr><td>".$u->getId()."</td>"
                    . "<td>".$u->getUsuario()."</td>"
                    . "<td>".$u->getPassword()."</td>"
                    . "<td>".$u->getNombre()."</td>"
                    . "<td>".$u->getAp1()."</td>"
                    . "<td>".$u->getAp2()."</td>"
                    . "<td>".$u->getTelefono()."</td>"
                    . "<td><button id='".$u->getId()."' onclick='eliminarUsuario(this.id)'>Eliminar</button></td></tr>";
        }
    //En caso de no existir usuarios, la tabla se mostrará pero indicará que no
    //existen usuarios, por lo que añadimos la linea al texto correspondiente.
    } else {
        $texto .= '<tr><td colspan="7">No existen usuarios a mostrar</td></tr>';
    }
    //Cerramos el html de la tabla que vamos a mostrar
    $texto .= "</table>";
    
    //Indicamos que en la respuesta a devolver, que la tabla generada en la
    //variable $texto se asigne a la etiqueta con ID tablaUsuarios como contenido
    //html.
    $response->assign("tablaUsuarios", "innerHTML", $texto);
    
    //Devolvemos la respuesta
    return $response;
    
}
  
/**
 * Funcion eliminarUsuario, que recibira como parametro un id de usuario para 
 * que se proceda a eliminar de la base de datos
 * 
 * Una vez eliminado, llamamos como valor de retorno a la funcion mostrarUsuarios
 * para que actualice de forma automatica la tabla en la página
 * 
 * @param type $idUsuario Usuario a eliminar de la base de datos
 * 
 * @return type
 */
function eliminarUsuario($idUsuario){
    //Eliminamos el usuario pasado por parametro de la base de datos
    DB::eliminarUsuario($idUsuario);
    //Llamamos a la funcion mostrarUsuarios para que se encargue de actualizar 
    //la tabla de usuarios
    return mostrarUsuarios();	
}

  
$xajax = new xajax();
//Registramos las funciones que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION,"mostrarUsuarios");
$xajax->register(XAJAX_FUNCTION,"eliminarUsuario");
//Configuramos la ruta de xajax_js con los archivos necesarios
$xajax->configure('javascript URI','xajax');
//Activamos el modo debug (si se desea)
//$xajax->configure('debug', true);
//Indicamos que se procesen todas las peticiones que lleguen
$xajax->processRequest();