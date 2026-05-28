<?php
require 'conexion.php';
Class Productos{
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


}
?>