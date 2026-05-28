<?php
require 'conexion.php';
Class Cliente{
    public function buscarCliente(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from cliente";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(isset($rows)){
            return $rows;
        }
        
    }
    
    public function InsertarCliente($nombre,$dpi,$direccion,$telefono,$email){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into cliente(nombre,dpi,direccion,telefono,email) values(:nombre,:dpi,:direccion,:telefono,:email)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':dpi',$dpi);
        $estado->bindParam(':direccion',$direccion);
        $estado->bindParam(':telefono',$telefono);
        $estado->bindParam(':email',$email);
        

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    public function EliminarCliente($id_cliente){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from cliente where id_cliente=:id_cliente";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_cliente',$id_cliente);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }
  
    public function ActualizarCliente($nombre,$dpi,$direccion,$telefono,$email,$id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update cliente set nombre=:nombre, dpi=:dpi,direccion=:direccion,telefono=:telefono,email=:email where id_cliente=:id";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':nombre',$nombre);
        $estado->bindParam(':dpi',$dpi);
        $estado->bindParam(':direccion',$direccion);
        $estado->bindParam(':telefono',$telefono);
        $estado->bindParam(':email',$email);
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