<?php
require 'conexion.php';
Class Perfil{
    public function ActualizarUsuarioI($nombre,$dpi,$direccion,$telefono,$correo,$password,$imagen,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update usuario set nombre=:nombre, dpi=:dpi,direccion=:direccion,telefono=:telefono,email=:correo,password=:password,imagen=:imagen where id_usuario=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':dpi',$dpi);
        $estado->bindParam(':direccion',$direccion);
        $estado->bindParam(':telefono',$telefono);
        $estado->bindParam(':correo',$correo);
        $estado->bindParam(':password',$password);
        $estado->bindParam(':imagen',$imagen);
        $estado->bindParam(':id',$id);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    
    public function ActualizarUsuario($nombre,$dpi,$direccion,$telefono,$correo,$password,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update usuario set nombre=:nombre, dpi=:dpi,direccion=:direccion,telefono=:telefono,email=:correo,password=:password where id_usuario=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':dpi',$dpi);
        $estado->bindParam(':direccion',$direccion);
        $estado->bindParam(':telefono',$telefono);
        $estado->bindParam(':correo',$correo);
        $estado->bindParam(':password',$password);
        $estado->bindParam(':id',$id);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
}