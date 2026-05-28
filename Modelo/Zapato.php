<?php
require 'conexion.php';
Class Zapato{
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

    public function buscarZapatoE($id){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="select imagen from zapato where id_zapato=:id_zapato";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_zapato',$id);
        
        $estado->execute();

        while($result = $estado->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }

    public function InsertarZapato($estilo,$descripcion,$talla,$imagen){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="insert into zapato(estilo,descripcion,talla,imagen) values(:estilo,:descripcion,:talla,:imagen)";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':estilo',$estilo);
        $estado->bindParam(':descripcion',$descripcion);
        $estado->bindParam(':talla',$talla);

        $estado->bindParam(':imagen',$imagen);

        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

    public function EliminarZapato($id_zapato){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="delete from zapato where id_zapato=:id_zapato";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':id_zapato',$id_zapato);

        if(!$estado){
            return 'Error al eliminar';
        }else{
            $estado->execute();
            return 'Datos eliminado';
        }
    }

    
    public function ActualizarZapatoI($estilo,$descripcion,$talla,$stock,$codigo,$imagen,$id_zapato){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update zapato set estilo=:estilo, descripcion=:descripcion,talla=:talla,stock=:stock,codigo=:codigo,imagen=:imagen where id_zapato=:id_zapato";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':estilo',$estilo);
        $estado->bindParam(':descripcion',$descripcion);
        $estado->bindParam(':talla',$talla);
        $estado->bindParam(':stock',$stock);
        $estado->bindParam(':codigo',$codigo);
        $estado->bindParam(':imagen',$imagen);
        $estado->bindParam(':id_zapato',$id_zapato);
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }
    
    public function ActualizarZapato($estilo,$descripcion,$talla,$stock,$codigo,$id_zapato){
        $modelo= new Conexion();
        $conexion=$modelo->obtener_conexion();
        $sql="update zapato set estilo=:estilo, descripcion=:descripcion,talla=:talla,stock=:stock,codigo=:codigo where id_zapato=:id_zapato";
        $estado=$conexion->prepare($sql);
        $estado->bindParam(':estilo',$estilo);
        $estado->bindParam(':descripcion',$descripcion);
        $estado->bindParam(':talla',$talla);
        $estado->bindParam(':stock',$stock);
        $estado->bindParam(':codigo',$codigo);
        $estado->bindParam(':id_zapato',$id_zapato);    
        if(!$estado){
            return 'Error al guardar';
        }else{
            $estado->execute();
            return 'Datos guardados con exito';
        }
    }

}
?>