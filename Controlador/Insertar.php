<?php
require 'Controlador.php';

class Insertar extends Controlador{
    public function usuario(){
        $consultas=$this->modelo('Login');
        $nombre=$_POST['nombre'];
        $dpi=$_POST['dpi'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $pass=$_POST['password'];

        $filas=$consultas->buscarUsuario();
        if($filas){
            foreach($filas as $fila){
                if($fila['email']!=$correo){
                    $aux=$consultas->enviarCorreo($correo, $nombre);
                    if($aux="enviado"){
                        $mensaje=$consultas->InsertarUsuario($nombre,$dpi,$direccion,$telefono,$correo,$pass);
                        echo json_encode($mensaje);
                        return true;
                    }
                }else{
                    $mensaje="error";
                    echo json_encode($mensaje);
                        return false;
                }
            }
        }else{
            $aux=$consultas->enviarCorreo($correo, $nombre);
            if($aux="enviado"){
                $mensaje=$consultas->InsertarUsuario($nombre,$dpi,$direccion,$telefono,$correo,$pass);
                echo json_encode($mensaje);
                return true;
            }
        }
        
        return true;
    }

    /*Marca*/
    public function marca(){
        $consultas=$this->modelo('Marca');
        $nombre=$_POST['nombre'];
        $origen=$_POST['origen'];

        if($_FILES['img-1']['name']!=""){
            $ruta="assets/img/".$_FILES['img-1']['name'];
            $imagen=$_FILES['img-1']['name'];
            if(move_uploaded_file($_FILES['img-1']['tmp_name'],$ruta)){
                $mensaje=$consultas->InsertarMarca($nombre,$origen,$imagen);
                echo json_encode($mensaje);            
                return true;
            }
        }
        return true;
    }
    /*Proveedor */
    public function proveedor(){
        $consultas=$this->modelo('Proveedor');
        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $id_marca=$_POST['id_marca'];
        
        if($_FILES['img-1']['name']!=""){
            $ruta="assets/img/".$_FILES['img-1']['name'];
            $imagen=$_FILES['img-1']['name'];
            if(move_uploaded_file($_FILES['img-1']['tmp_name'],$ruta)){
                $mensaje=$consultas->InsertarProveedor($nombre,$direccion,$telefono,$email,$imagen,$id_marca);
                echo json_encode($mensaje);            
                return true;
            }
        }
        return true;
    }


    /*Cliente */
        public function cliente(){
        $consultas=$this->modelo('Cliente');
        $nombre=$_POST['nombre'];
        $dpi=$_POST['dpi'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
    
        $mensaje=$consultas->InsertarCliente($nombre,$dpi,$direccion,$telefono,$email);
        echo json_encode($mensaje); 
        
        return true;
    }

    /*Zapato */
    public function zapato(){
        $consultas=$this->modelo('Zapato');
        $estilo=$_POST['estilo'];
        $descripcion=$_POST['descripcion'];
        $talla=$_POST['talla'];


        if($_FILES['img-1']['name']!=""){
            $ruta="assets/img/".$_FILES['img-1']['name'];
            $imagen=$_FILES['img-1']['name'];
            if(move_uploaded_file($_FILES['img-1']['tmp_name'],$ruta)){
                $mensaje=$consultas->InsertarZapato($estilo,$descripcion,$talla,$imagen);
                echo json_encode($mensaje);            
                return true;
            }
        }
        return true;
    }

    /*Ingreso */
    public function ingreso(){
        $consultas=$this->modelo('Ingresos');
        $tipo_comprobante=$_POST['tipo_comprobante'];
        $serie_comprobante=$_POST['serie_comprobante'];
        $no_comprobante=$_POST['no_comprobante'];
        $fecha_hora=$_POST['fecha_hora'];
        $estados=$_POST['estados'];
        $id_proveedor=$_POST['id_proveedor'];
        $id_usuario=$_POST['id_usuario'];
    
        $mensaje=$consultas->InsertarIngresos($tipo_comprobante,$serie_comprobante,$no_comprobante,$fecha_hora,$estados,$id_proveedor,$id_usuario);
        echo json_encode($mensaje);
        return true;
    }

    /*Detalle Ingreso*/
    public function detalle_ingreso(){
        $consultas=$this->modelo('Detalle_ingreso');
        $cantidad=$_POST['cantidad'];
        $precio_compra=$_POST['precio_compra'];
        $precio_venta=$_POST['precio_venta'];
        $id_ingreso=$_POST['id_ingreso'];
        $id_zapato=$_POST['id_zapato'];
    
        $mensaje=$consultas->InsertarDetalle_ingreso($cantidad,$precio_compra,$precio_venta,$id_ingreso,$id_zapato);
        echo json_encode($mensaje); 
        
        return true;
    }

        /*Venta*/
        public function venta(){
            $consultas=$this->modelo('Venta');
            $tipo=$_POST['tipo'];
            $serie=$_POST['serie'];
            $fecha_hora=$_POST['fecha_hora'];
            $total=$_POST['total'];
            $estados=$_POST['estados'];
            $id_cliente=$_POST['id_cliente']; 
            $id_usuario=$_POST['id_usuario'];
        
            $mensaje=$consultas->InsertarVenta($tipo,$serie,$fecha_hora,$total,$estados,$id_cliente,$id_usuario);
            echo json_encode($mensaje);
            return true;
        }

        /*Venta 2*/
        public function venta_dos(){
            $consultas=$this->modelo('Venta');
            $zapatos = json_decode(stripslashes($_POST['data']),true);
            $id_venta = $this->obtener_id_venta();
            
            if($zapatos){
                foreach($zapatos as $fila){
                    $id_zapato = $fila['id_zapato'];
                    $cantidad = $fila['cantidad'];
                    $precio = $fila['precio'];
                    $descuento = 0;
                    $total = $fila['total'];
                    $mensaje = $consultas->insertarDetalleVenta($cantidad,$precio,$descuento,$total,$id_venta,$id_zapato);

                }
            }
            
            echo json_encode($id_venta);
            return true;
        }

        /*Obtener Venta*/
        public function obtener_id_venta(){
            $id = 0;
            $consultas = $this->modelo("Venta");
            $id = $consultas->buscarVenta();
            return $id;
            
        }

    public function correo($datos){
        require 'Modelo/activar.php';
    }
}
?>