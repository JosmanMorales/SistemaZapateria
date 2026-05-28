<?php
Class Busqueda{
    /*SELECCIONAR MARCA */
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
    /*SELECCIONAR PROVEEDOR */

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
        }else{
            return null;
        }
        
    }


/*SELECCIONAR CLIENTE */
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
        }else{
            return null;
    }
            
}


        /*SELECCIONAR ZAPATO */
    public function buscarZapato(){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select * from zapato";
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

    /*SELECCIONAR INGRESO */

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
}