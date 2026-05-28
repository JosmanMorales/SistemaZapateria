<?php
require 'conexion.php';
require 'funciones.php';
Class Login{
    public function InsertarUsuario($nombre,$dpi,$direccion,$telefono,$correo,$pass){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into usuario(nombre,dpi,direccion,telefono,email,password) values(:nombre,:dpi,:direccion,:telefono,:correo,:pass)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':dpi',$dpi);
        $estado->bindParam(':direccion',$direccion);
        $estado->bindParam(':telefono',$telefono);
        $estado->bindParam(':correo',$correo);
        $estado->bindParam(':pass',$pass);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    public function enviarCorreo($correo,$nombre){
        $id=0;
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from usuario";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }

        if(isset($rows)){
            foreach($rows as $fila){
                $id=$fila['id_usuario']+1;
            }
        }else{
            $id=1;
        }

        $url_activacion="http://localhost/Proyecto_zapateria/Insertar/Correo/";
        $destino = array($correo => $nombre);
		$asunto = 'Confirma tu Cuenta';
        $mensaje = 'Estimado '.$nombre.' para poder activar tu cuenta favor de seguir el siguiente link,
					si no puedes hacer click, favor de copiar y pegarlo en la barra de direcciones de tu navegador.<br><br>'
					.$url_activacion.$id;
		enviarMail($destino,$asunto,$mensaje);
		return "enviado";
    }

    public function buscarUsuario(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from usuario";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(!isset($rows)){
            $rows=null;
        }
        return $rows;
    }
}
?>