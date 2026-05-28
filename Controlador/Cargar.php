<?php
Class Cargar extends Controlador{
    /********************Marca******************/

    public function marca(){
        $consultas=$this->modelo('Marca');

        $filas=$consultas->buscarMarca();
        echo '
            
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>no.</th>
                        <th>nombre</th>
                        <th>Origen</th>
                        <th>Imagen</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if($filas){            
            foreach($filas as $fila){
                echo '
                    <tr>
                        <td>'.$fila['id_marca'].'</td>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['origen'].'</td>                        
                        <td><img src="../assets/img/'.$fila['imagen'].'" class="img-fluid" width=60 height=4 alt="'.$fila['imagen'].'" id="imagen'.$fila['id_marca'].'"></td>
                        <td><button onclick="mostrar_msg('.$fila['id_marca'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar'.$fila['id_marca'].'" onclick="cargar('.$fila['id_marca'].')"; class="btn btn-warning" data-toggle="modal" data-target="#actualizarMarca"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
            
        }
        echo '<tbody></table>';
    }

    
    public function buscarMarca(){
        $consultas=$this->modelo('Busqueda');
        $filas=$consultas->buscarMarca();
        return $filas;
    }
/************Proveedor*********/

    public function proveedor(){
        $consultas=$this->modelo('Proveedor');

        $filas=$consultas->buscarProveedor();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>no.</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Imagen</th>
                        <th>Cod Marca</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if($filas){            
            foreach($filas as $fila){
                echo '
                    <tr>
                        <td>'.$fila['id_proveedor'].'</td>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['direccion'].'</td>   
                        <td>'.$fila['telefono'].'</td>  
                        <td>'.$fila['email'].'</td>                      
                        <td><img src="../assets/img/'.$fila['imagen'].'" class="img-fluid" width=60 height=4 alt="'.$fila['imagen'].'" id="imagen'.$fila['id_proveedor'].'"></td>
                        <td>'.$fila['id_marca'].'</td> 
                        <td><button onclick="mostrar_msg('.$fila['id_proveedor'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar'.$fila['id_proveedor'].'" onclick="cargar('.$fila['id_proveedor'].')"; class="btn btn-warning" data-toggle="modal" data-target="#actualizarProveedor"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
            
        }
        echo '<tbody></table></div>';
    }

    public function buscarProveedor(){
        $consultas=$this->modelo('Busqueda');
        $filas=$consultas->buscarProveedor();
        return $filas;
    }

    /******************CLIENTE*************/
    public function cliente(){
        $consultas=$this->modelo('Cliente');

        $filas=$consultas->buscarCliente();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>no.</th>
                        <th>Nombre</th>
                        <th>DPI</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if($filas){            
            foreach($filas as $fila){
                echo '
                    <tr>
                        <td>'.$fila['id_cliente'].'</td>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['dpi'].'</td>
                        <td>'.$fila['direccion'].'</td>   
                        <td>'.$fila['telefono'].'</td>  
                        <td>'.$fila['email'].'</td>                      
                        <td><button onclick="mostrar_msg('.$fila['id_cliente'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar'.$fila['id_cliente'].'" onclick="cargar('.$fila['id_cliente'].')"; class="btn btn-warning" data-toggle="modal" data-target="#actualizarCliente"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
            
        }
        echo '<tbody></table></div>';
    }

    public function buscarCliente(){
        $consultas=$this->modelo('Cliente');
        $filas=$consultas->buscarCliente();
        return $filas;
    }


    /***************ZAPATO**************/
    public function zapato(){
        $consultas=$this->modelo('Zapato');
        $filas=$consultas->buscarZapato();
        echo '
        <div class="table-responsive ">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>no.</th>
                        <th>estilo</th>
                        <th>descripcion</th>
                        <th>talla</th>
                        <th>stock</th>
                        <th>precio</th>
                        <th>imagen</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if($filas){            
            foreach($filas as $fila){
                echo '
                    <tr>
                        <td>'.$fila['id_zapato'].'</td>
                        <td>'.$fila['estilo'].'</td>
                        <td>'.$fila['descripcion'].'</td>    
                        <td>'.$fila['talla'].'</td>   
                        <td>'.$fila['stock'].'</td>   
                        <td>'.$fila['precio'].'</td>      
                        <td><img src="../assets/img/'.$fila['imagen'].'" class="img-fluid" width=60 height=4 alt="'.$fila['imagen'].'" id="imagen'.$fila['id_zapato'].'"></td>
                        <td><button onclick="mostrar_msg('.$fila['id_zapato'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar'.$fila['id_zapato'].'" onclick="cargar('.$fila['id_zapato'].')"; class="btn btn-warning" data-toggle="modal" data-target="#actualizarZapato"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }   
        }
        echo '<tbody></table></div>';
    }

    public function buscarZapato(){
        $consultas=$this->modelo('Busqueda');
        $filas=$consultas->buscarZapato();
        return $filas;
    }


    /*Ingreso */
    public function ingresos(){
        $consultas=$this->modelo('Ingresos');

        $filas=$consultas->buscarIngreso();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>no.</th>
                        <th>tipo_comprobante</th>
                        <th>serie_comprobante</th>
                        <th>no_comprobante</th>
                        <th>fecha_hora</th>
                        <th>total_compra</th>
                        <th>estado</th>
                        <th>id_proveedor</th>
                        <th>id_usuario</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if($filas){            
            foreach($filas as $fila){
                echo '
                    <tr>
                        <td>'.$fila['id_ingreso'].'</td>
                        <td>'.$fila['tipo_comprobante'].'</td>
                        <td>'.$fila['serie_comprobante'].'</td>    
                        <td>'.$fila['no_comprobante'].'</td>   
                        <td>'.$fila['fecha_hora'].'</td>   
                        <td>'.$fila['total_compra'].'</td>    
                        <td>'.$fila['estados'].'</td>   
                        <td>'.$fila['id_proveedor'].'</td>   
                        <td>'.$fila['id_usuario'].'</td>      

                        <td><button onclick="mostrar_msg('.$fila['id_ingreso'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar'.$fila['id_ingreso'].'" onclick="cargar('.$fila['id_ingreso'].')"; class="btn btn-warning" data-toggle="modal" data-target="#actualizarIngreso"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }   
        }
        echo '<tbody></table></div>';
    }

    public function buscarIngreso(){
        $consultas=$this->modelo('Busqueda');
        $filas=$consultas->buscarIngreso();
        return $filas;
    }


    /*Detalle Ingreso */
    public function detalle_ingreso(){
        $consultas=$this->modelo('Detalle_ingreso');

        $filas=$consultas->buscarDetalle_ingreso();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>no.</th>
                        <th>cantidad</th>
                        <th>precio_compra</th>
                        <th>precio_venta</th>
                        <th>id_ingreso</th>
                        <th>id_zapato</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if($filas){            
            foreach($filas as $fila){
                echo '
                    <tr>
                        <td>'.$fila['id_detalle_ingreso'].'</td>
                        <td>'.$fila['cantidad'].'</td>
                        <td>'.$fila['precio_compra'].'</td>    
                        <td>'.$fila['precio_venta'].'</td>   
                        <td>'.$fila['id_ingreso'].'</td>   
                        <td>'.$fila['id_zapato'].'</td>      

                        <td><button onclick="mostrar_msg('.$fila['id_detalle_ingreso'].');" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar'.$fila['id_detalle_ingreso'].'" onclick="cargar('.$fila['id_detalle_ingreso'].')"; class="btn btn-warning" data-toggle="modal" data-target="#actualizarDetalle_ingreso"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }   
        }
        echo '<tbody></table></div>';
    }

    /*Codigo para mostrar los productos*/
public function cargarZapato(){
    $consultas=$this->modelo('Productos');
    $filas=$consultas->buscarZapato();
    if($filas){
        foreach($filas as $fila){
            if($fila['precio'] != 0 && $fila['stock'] != 0){
                $zapatos = [
                    "id_zapato" => $fila['id_zapato'],
                    "estilo" => $fila['estilo'],
                    "descripcion" => $fila['descripcion'],
                    "talla" => $fila['talla'],
                    "precio" => $fila['precio'],
                    "stock" => $fila['stock'],
                    "imagen" => $fila['imagen']
                ];

                echo " 
                <div class='card card-cascade wider'>
                <div class='view view-cascade overlay'>
                    <img class='card-img-top' src='../assets/img/".$fila["imagen"]."' >
                    <a href='#!'>
                    <div class='mask rgba-white-slight'></div>
                    </a>
                </div>
                <div class='card-body card-body-cascade text-center'>
                    <h4 class='card-title'><strong>".$fila['estilo']."</strong></h4>
                    <p class='card-text'>".$fila['descripcion']."</p>
                    <i class='fas fa-level-up-alt'></i>  Talla: ".$fila['talla']." &nbsp;&nbsp;
                    <i class='fas fa-money-bill-alt'></i>  Precio: ".$fila['precio']." &nbsp;&nbsp;
                    <i class='fas fa-shoe-prints'></i>  Existencias: ".$fila['stock']."
                    <br><br>
                    <button type='button' class='btn btn-primary' onclick='mostrar_msg(".json_encode($zapatos).")'>Comprar Ahora</button>
                </div>
                </div>
                ";
            }
        }
    }
}


    /*Detalle Ingreso */
    public function ventas_hechas(){
        $consultas=$this->modelo('Venta');

        $filas=$consultas->buscarVenta2();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tipo</th>
                        <th>Serie</th>
                        <th>Fecha Hora</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Usuario</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if($filas){            
            foreach($filas as $fila){
                echo '
                    <tr>
                        <td>'.$fila['id_venta'].'</td>
                        <td>'.$fila['tipo_comprobante'].'</td>
                        <td>'.$fila['serie_comprobante'].'</td>    
                        <td>'.$fila['fecha_hora'].'</td>   
                        <td>'.$fila['total_venta'].'</td>   
                        <td>'.$fila['estados'].'</td>  
                        <td>'.$fila['id_cliente'].'</td>  
                        <td>'.$fila['id_usuario'].'</td>    
                        <td><a href="http://localhost/Proyecto_zapateria/Factura/imprimir/'.$fila['id_venta'].'" target="_blank" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                    </tr>
                ';
            }   
        }
        echo '<tbody></table></div>';
    }

}