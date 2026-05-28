<?php
require 'Controlador.php';

class Eliminar extends Controlador{
  /*Marca*/
      public function marca(){
          $consultas=$this->modelo('Marca');
          $datos=$_POST['id_marca'];
          $filas=$consultas->buscarMarcaE($datos); 
          if($filas){
            foreach($filas as $fila){
              $nombre_imagen=$fila['imagen'];
            }
          }       
          echo json_encode($nombre_imagen);
          unlink("assets/img/".$nombre_imagen);

          $consultas->EliminarMarca($datos);        
          return true;
    }

    /*Proveedor*/
    public function proveedor(){
        $consultas=$this->modelo('Proveedor');
        $datos=$_POST['id_proveedor'];
        $filas=$consultas->buscarProveedorE($datos); 
        if($filas){
          foreach($filas as $fila){
            $nombre_imagen=$fila['imagen'];
          }
        }       
        echo json_encode($nombre_imagen);
        unlink("assets/img/".$nombre_imagen);

        $consultas->EliminarProveedor($datos);        
        return true;
  }

      /*Cliente*/

      public function cliente(){
        $consultas = $this->modelo('Cliente');
        $datos=$_POST['id_cliente'];
        $mensaje=$consultas->EliminarCliente($datos);
        echo json_encode($mensaje); 

        return true;
    }

    /*Zapato*/

    public function zapato(){
      $consultas=$this->modelo('Zapato');
      $datos=$_POST['id_zapato'];
      $filas=$consultas->buscarZapatoE($datos); 
      if($filas){
        foreach($filas as $fila){
          $nombre_imagen=$fila['imagen'];
        }
      }       
      echo json_encode($nombre_imagen);
      unlink("assets/img/".$nombre_imagen);
  
      $consultas->EliminarZapato($datos);        
      return true;
  }

  /*Ingreso*/
  public function ingreso(){
    $consultas = $this->modelo('Ingresos');
    $datos=$_POST['id_ingreso'];
    $mensaje=$consultas->EliminarIngreso($datos);
    echo json_encode($mensaje); 

    return true;
}

  /*Detalle Ingreso*/
  public function detalle_ingreso(){
    $consultas = $this->modelo('Detalle_ingreso');
    $datos=$_POST['id_detalle_ingreso'];
    $mensaje=$consultas->EliminarDetalle_ingreso($datos);
    echo json_encode($mensaje); 

    return true;
}

  
}