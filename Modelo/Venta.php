<?php
require 'conexion.php';
Class Venta{
    public function buscarVenta(){
        $id = 0;

        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from venta";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        foreach($rows as $fila){
            $id = $fila['id_venta'];
        }
        return $id;

    }

    public function buscarVenta2(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from venta";
        $estado=$conexion->prepare($sql);
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;

    }

    public function InsertarVenta($tipo,$serie,$fecha_hora,$total,$estados,$id_cliente,$id_usuario){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into venta(tipo_comprobante,serie_comprobante,fecha_hora,total_venta,estados,id_cliente,id_usuario) values(:tipo,:serie,:fecha_hora,:total_venta,:estados,:id_cliente,:id_usuario)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':tipo',$tipo);
        $estado->bindParam(':serie',$serie);
        $estado->bindParam(':fecha_hora',$fecha_hora);
        $estado->bindParam(':total_venta',$total);
        $estado->bindParam(':estados',$estados);
        $estado->bindParam(':id_cliente',$id_cliente);
        $estado->bindParam(':id_usuario',$id_usuario);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function insertarDetalleVenta($cantidad,$precio,$descuento,$total,$id_venta,$id_zapato){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into detalle_venta(cantidad,precio_venta,descuento,total,id_venta,id_zapato) values(:cantidad,:precio,:descuento,:total,:id_venta,:id_zapato)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':cantidad',$cantidad);
        $estado->bindParam(':precio',$precio);
        $estado->bindParam(':descuento',$descuento);
        $estado->bindParam(':total',$total);
        $estado->bindParam(':id_venta',$id_venta);
        $estado->bindParam(':id_zapato',$id_zapato);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function buscarVentaImprimir($id_venta){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from venta where id_venta=:id_venta";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_venta',$id_venta);
        $estado->execute();
        
        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;

    }

    public function buscarDetalleVentaImprimir($id_venta){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from detalle_venta where id_venta=:id_venta";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_venta',$id_venta);
        $estado->execute();
        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;

    }
    
    public function buscarClienteImprimir($id_cliente){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from cliente where id_cliente=:id_cliente";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_cliente',$id_cliente);
        $estado->execute();
        
        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function buscarUsuarioImprimir($id_usuario){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from usuario where id_usuario=:id_usuario";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_usuario',$id_usuario);
        $estado->execute();
        
        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function buscarZapatoImprimir($id_zapato){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from zapato where id_zapato = :id_zapato";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_zapato',$id_zapato);
        $estado->execute();
        

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;

    }
}

?>