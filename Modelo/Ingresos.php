<?php
require 'conexion.php';
Class Ingresos{
    public function buscarIngreso(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from ingreso";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        if(isset($rows)){
            return $rows;
        }else {
            return null;
        }
    }

    public function InsertarIngresos($tipo_comprobante,$serie_comprobante,$no_comprobante,$fecha_hora,$estados,$id_proveedor,$id_usuario){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into ingreso(tipo_comprobante,serie_comprobante,no_comprobante,fecha_hora,estados,id_proveedor,id_usuario) values(:tipo_comprobante,:serie_comprobante,:no_comprobante,:fecha_hora,:estados,:id_proveedor,:id_usuario)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':tipo_comprobante',$tipo_comprobante);
        $estado->bindParam(':serie_comprobante',$serie_comprobante);
        $estado->bindParam(':no_comprobante',$no_comprobante);
        $estado->bindParam(':fecha_hora',$fecha_hora);
        $estado->bindParam(':estados',$estados);
        $estado->bindParam(':id_proveedor',$id_proveedor);
        $estado->bindParam(':id_usuario',$id_usuario);
        
        
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function EliminarIngreso($id_ingreso){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from ingreso where id_ingreso=:id_ingreso";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_ingreso',$id_ingreso);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }
  
    public function ActualizarIngreso($tipo_comprobante,$serie_comprobante,$no_comprobante,$fecha_hora,$total_compra,$estados,$id_proveedor,$id_ingreso){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update ingreso set tipo_comprobante=:tipo_comprobante, serie_comprobante=:serie_comprobante,no_comprobante=:no_comprobante,fecha_hora=:fecha_hora,total_compra=:total_compra, estados = :estados, id_proveedor = :id_proveedor where id_ingreso=:id_ingreso";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':tipo_comprobante',$tipo_comprobante);
        $estado->bindParam(':serie_comprobante',$serie_comprobante);
        $estado->bindParam(':no_comprobante',$no_comprobante);
        $estado->bindParam(':fecha_hora',$fecha_hora);
        $estado->bindParam(':total_compra',$total_compra);
        $estado->bindParam(':estados',$estados);
        $estado->bindParam(':id_proveedor',$id_proveedor);
        $estado->bindParam(':id_ingreso',$id_ingreso);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }   
}
?>