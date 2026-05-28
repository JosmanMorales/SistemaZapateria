<?php
require 'conexion.php';
Class Marca{
    public function buscarMarca(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from marca";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(isset($rows)){
            return $rows;
        }else{
            return null;
        }
        
    }
    public function buscarMarcaE($id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select imagen from marca where id_marca=:id_marca";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_marca',$id);
        
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }
    
    public function InsertarMarca($nombre,$origen,$imagen){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into marca(nombre,origen,imagen) values(:nombre,:origen,:imagen)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':origen',$origen);
        $estado->bindParam(':imagen',$imagen);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    public function EliminarMarca($id_marca){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from marca where id_marca=:id_marca";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_marca',$id_marca);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }
    public function ActualizarMarcaI($nombre,$origen,$imagen,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update marca set nombre=:nombre, origen=:origen,imagen=:imagen where id_marca=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':origen',$origen);
        $estado->bindParam(':imagen',$imagen);
        $estado->bindParam(':id',$id);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    public function ActualizarMarca($nombre,$origen,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update marca set nombre=:nombre, origen=:origen where id_marca=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':origen',$origen);    
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