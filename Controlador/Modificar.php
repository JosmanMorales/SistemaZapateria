<?php
require "Controlador.php";
class Modificar extends Controlador{
    public function usuario(){
        $consultas=$this->modelo('Perfil');
        $id=$_POST['id_usuario'];
        $nombre=$_POST['nombre'];
        $dpi=$_POST['dpi'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $password=$_POST['password'];
  
      

        if($_FILES['img-1']['name']!=""){
            $ruta="assets/img/fotos_users/".$_FILES['img-1']['name'];
            $imagen=$_FILES['img-1']['name'];
            if(move_uploaded_file($_FILES['img-1']['tmp_name'],$ruta)){
               
                        $mensaje=$consultas->ActualizarUsuarioI($nombre,$dpi,$direccion,$telefono,$correo,$password,$imagen,$id);
                        echo json_encode($mensaje);
                        session_start();
                        $_SESSION['nombre']=$nombre;
                        $_SESSION['dpi']=$dpi;
                        $_SESSION['direccion']=$direccion;
                        $_SESSION['telefono']=$telefono;
                        $_SESSION['correo']=$correo;
                        $_SESSION['password']=$password;
                        $_SESSION['imagen']=$imagen;                
                        return true;
                    
                    
                
                
            }
        }else{            
                $mensaje=$consultas->ActualizarUsuario($nombre,$dpi,$direccion,$telefono,$correo,$password,$id);
                echo json_encode($mensaje);
                session_start();
                $_SESSION['nombre']=$nombre;
                $_SESSION['dpi']=$dpi;
                $_SESSION['direccion']=$direccion;
                $_SESSION['telefono']=$telefono;
                $_SESSION['correo']=$correo;
                $_SESSION['password']=$password;          
                return true;
        }
       
        return true;
    }

    /*Marca*/
    public function marca(){
        $consultas=$this->modelo('Marca');
        $id=$_POST['id_marca'];
        $nombre=$_POST['nombre'];
        $origen=$_POST['origen'];
      
        if($_FILES['img-2']['name']!=""){
            $ruta="assets/img/".$_FILES['img-2']['name'];
            $imagen=$_FILES['img-2']['name'];
            if(move_uploaded_file($_FILES['img-2']['tmp_name'],$ruta)){           
                      $mensaje=$consultas->ActualizarMarcaI($nombre,$origen,$imagen,$id);
                      echo json_encode($mensaje);           
                      return true;
                  }                        
        }else{            
                $mensaje=$consultas->ActualizarMarca($nombre,$origen,$id);
                echo json_encode($mensaje);        
                return true;
        }
       
        return true;
    }

    /*Proveedor*/
    public function proveedor(){
        $consultas=$this->modelo('Proveedor');
        $id=$_POST['id_proveedor'];
        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $id_marca=$_POST['id_marca'];

        if($_FILES['img-2']['name']!=""){
            $ruta="assets/img/".$_FILES['img-2']['name'];
            $imagen=$_FILES['img-2']['name'];
            if(move_uploaded_file($_FILES['img-2']['tmp_name'],$ruta)){
                $mensaje=$consultas->ActualizarProveedorI($nombre,$direccion,$telefono,$email,$imagen,$id_marca,$id);
                echo json_encode($mensaje);           
                return true;
            }
        }else{            
                $mensaje=$consultas->ActualizarProveedor($nombre,$direccion,$telefono,$email,$id_marca,$id);
                echo json_encode($mensaje);        
                return true;
        }
        return true;
    }

    /*Cliente*/
    public function cliente(){
        $consultas=$this->modelo('Cliente');
        $id=$_POST['id_cliente'];
        $nombre=$_POST['nombre'];
        $dpi=$_POST['dpi'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];       

        $mensaje=$consultas->ActualizarCliente($nombre,$dpi,$direccion,$telefono,$email,$id);
                echo json_encode($mensaje);        
                return true;       
    }

    /*Zapato*/
    public function zapato(){
        $consultas=$this->modelo('Zapato');
        $id_zapato=$_POST['id_zapato'];
        $estilo=$_POST['estilo'];
        $descripcion=$_POST['descripcion'];
        $talla=$_POST['talla'];
        $stock=$_POST['stock'];
        $precio=$_POST['precio'];

        if($_FILES['img-2']['name']!=""){
            $ruta="assets/img/".$_FILES['img-2']['name'];
            $imagen=$_FILES['img-2']['name'];
            if(move_uploaded_file($_FILES['img-2']['tmp_name'],$ruta)){
                $mensaje=$consultas->ActualizarZapatoI($estilo,$descripcion,$talla,$stock,$precio,$imagen,$id_zapato);
                echo json_encode($mensaje);           
                return true;
            }
        }else{            
                $mensaje=$consultas->ActualizarZapato($estilo,$descripcion,$talla,$stock,$precio,$id_zapato);
                echo json_encode($mensaje);        
                return true;
        }
        return true;
    }

    /*Ingreso*/
    public function ingreso(){
        $consultas=$this->modelo('Ingresos');
        $id_ingreso=$_POST['id_ingreso'];
        $tipo_comprobante=$_POST['tipo_comprobante'];
        $serie_comprobante=$_POST['serie_comprobante'];
        $no_comprobante=$_POST['no_comprobante'];
        $fecha_hora=$_POST['fecha_hora'];
        $total_compra=$_POST['total_compra'];
        $estados=$_POST['estados'];
        $id_proveedor=$_POST['id_proveedor'];
       
    
        $mensaje=$consultas->ActualizarIngreso($tipo_comprobante,$serie_comprobante,$no_comprobante,$fecha_hora,$total_compra,$estados,$id_proveedor,$id_ingreso);
        echo json_encode($mensaje);
        return true;
    }

    /*Detalle Ingreso*/
    public function detalle_ingreso(){
        $consultas=$this->modelo('Detalle_ingreso');
        $id_detalle_ingreso=$_POST['id_detalle_ingreso'];
        $cantidad=$_POST['cantidad'];
        $precio_compra=$_POST['precio_compra'];
        $precio_venta=$_POST['precio_venta'];
        $id_ingreso=$_POST['id_ingreso'];
        $id_zapato=$_POST['id_zapato'];    

        $mensaje=$consultas->ActualizarDetalle_ingreso($cantidad,$precio_compra,$precio_venta,$id_ingreso,$id_zapato,$id_detalle_ingreso);
                echo json_encode($mensaje);        
                return true;     
    }

}
?>