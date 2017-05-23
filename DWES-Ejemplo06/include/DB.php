<?php
require_once('Usuario.php');

class DB { 
    
    /**
     * Funcion ejecutaConsulta, que conectará a la base de datos y ejecutará la
     * consulta SQL pasada como parametro.
     * 
     * @param type $sql String con la consulta SQL a ejecutar
     * 
     * @return type
     */
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=examen";
        $usuario = 'dwes';
        $contrasena = 'dwes';
        
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
		
        if (isset($dwes)){
            $resultado = $dwes->query($sql); 
        } 
            
        return $resultado;
            //print_r($resultado); sale:
            //PDOStatement Object ( [queryString] => SELECT * FROM usuariosapp ) 
    }

    /**
     * Function obtenerUsuarios, que obtiene de la base de datos todos los usuarios
     * existentes en la tabla usuariosapp. En el caso de no existir resultados
     * devuelve un valor booleano FALSE para controlar los resultados en la 
     * aplicacion
     * 
     * @return type
     */
    public static function obtenerUsuarios() {
        $sql = "SELECT * FROM usuariosapp";
        $resultado = self::ejecutaConsulta ($sql);
            //print_r($resultado); 
            //PDOStatement Object ( [queryString] => SELECT * FROM usuariosapp ) 
        $usuarios = array();
            //print_r($usuarios);
            //sale:  Array ( )  
	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            //print_r($row);
            //Sale solo el primer registro de la tabla
            //Array ( [id] => 1 
            //[0] => 1
            //[usuario] => usuexam
            //[1] => usuexam
            //[password] => 87f0d2ea970b00c9bb5cb0cc572cd00f1cbf5f6b 
            //[2] => 87f0d2ea970b00c9bb5cb0cc572cd00f1cbf5f6b
            //[nombre] => UsuarioExam
            //[3] => UsuarioExam 
            //[ap1] => Junio
            //[4] => Junio 
            //[ap2] => 2013 
            //[5] => 2013
            //[tfno] => 
            //[6] => )
            
            //Mientras existan registros, vamos añadiendolos al array
            while ($row != null) {
                $usuarios[] = new Usuario($row);
                $row = $resultado->fetch();
            }
	}
        
        //MODIFICACION: Devuelve false si no hay resultados y el array de usuarios
        //en caso contrario
        return !empty($usuarios) ? $usuarios : false;	
    }
	
    /**
     * Funcion eliminarUsuario, que recibira como parametro el id de un usuario
     * y se procederá a su eliminacion de la base de datos.
     * 
     * Devolverá true o false si se ha podido eliminar o no
     * 
     * @param type $idUsuario ID del Usuario a eliminar
     * 
     * @return boolean
     */
    public static function eliminarUsuario($idUsuario){
        $sql = "DELETE FROM usuariosapp WHERE id = $idUsuario ";
        $resultado = self::ejecutaConsulta ($sql);
        //print_r($resultado); 
        //PDOStatement Object ( [queryString] => DELETE FROM usuariosapp WHERE id = 3 ) 
        if($resultado != false){
            $borrado=true;
        }else{
            $borrado=false;

        }
        return $borrado;
    }

}
