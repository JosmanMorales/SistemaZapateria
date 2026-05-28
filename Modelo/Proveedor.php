<?php
require 'conexion.php';
Class Proveedor{
    public function buscarProveedor(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from proveedor";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(isset($rows)){
            return $rows;
        }
        
    }
    public function buscarProveedorE($id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select imagen from proveedor where id_proveedor=:id_proveedor";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_proveedor',$id);
        
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }
    public function InsertarProveedor($nombre,$direccion,$telefono,$email,$imagen,$id_marca){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into proveedor(nombre,direccion,telefono,email,imagen,id_marca) values(:nombre,:direccion,:telefono,:email,:imagen,:id_marca)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':direccion',$direccion);
        $estado->bindParam(':telefono',$telefono);
        $estado->bindParam(':email',$email);
        $estado->bindParam(':imagen',$imagen);
        $estado->bindParam(':id_marca',$id_marca);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    public function EliminarProveedor($id_proveedor){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from proveedor where id_proveedor=:id_proveedor";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_proveedor',$id_proveedor);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }
    public function ActualizarProveedorI($nombre,$direccion,$telefono,$email,$imagen,$id_marca,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update proveedor set nombre=:nombre, direccion=:direccion,telefono=:telefono,email=:email,imagen=:imagen, id_marca=:id_marca where id_proveedor=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':direccion',$direccion);
        $estado->bindParam(':telefono',$telefono);
        $estado->bindParam(':email',$email);
        $estado->bindParam(':imagen',$imagen);
        $estado->bindParam(':id_marca',$id_marca);
        $estado->bindParam(':id',$id);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    public function ActualizarProveedor($nombre,$direccion,$telefono,$email,$id_marca,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update proveedor set nombre=:nombre, direccion=:direccion,telefono=:telefono,email=:email, id_marca=:id_marca where id_proveedor=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':direccion',$direccion);
        $estado->bindParam(':telefono',$telefono);
        $estado->bindParam(':email',$email);
        $estado->bindParam(':id_marca',$id_marca);
        $estado->bindParam(':id',$id);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

}
?>