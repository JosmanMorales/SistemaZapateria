<?php
require 'conexion.php';
Class Detalle_ingreso{
    public function buscarDetalle_ingreso(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from detalle_ingreso";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(isset($rows)){
            return $rows;
        }
        
    }
    
    public function InsertarDetalle_ingreso($cantidad,$precio_compra,$precio_venta,$id_ingreso,$id_zapato){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into detalle_ingreso(cantidad,precio_compra,precio_venta,id_ingreso,id_zapato) values(:cantidad,:precio_compra,:precio_venta,:id_ingreso,:id_zapato)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':cantidad',$cantidad);
        $estado->bindParam(':precio_compra',$precio_compra);
        $estado->bindParam(':precio_venta',$precio_venta);
        $estado->bindParam(':id_ingreso',$id_ingreso);
        $estado->bindParam(':id_zapato',$id_zapato);
        

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    public function EliminarDetalle_ingreso($id_detalle_ingreso){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from detalle_ingreso where id_detalle_ingreso=:id_detalle_ingreso";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_detalle_ingreso',$id_detalle_ingreso);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }
  
    public function ActualizarDetalle_ingreso($cantidad,$precio_compra,$precio_venta,$id_ingreso,$id_zapato,$id_detalle_ingreso){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update detalle_ingreso set cantidad=:cantidad, precio_compra=:precio_compra,precio_venta=:precio_venta,id_ingreso=:id_ingreso,id_zapato=:id_zapato where id_detalle_ingreso=:id_detalle_ingreso";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':cantidad',$cantidad);
        $estado->bindParam(':precio_compra',$precio_compra);
        $estado->bindParam(':precio_venta',$precio_venta);
        $estado->bindParam(':id_ingreso',$id_ingreso);
        $estado->bindParam(':id_zapato',$id_zapato);
        $estado->bindParam(':id_detalle_ingreso',$id_detalle_ingreso);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

}
?>