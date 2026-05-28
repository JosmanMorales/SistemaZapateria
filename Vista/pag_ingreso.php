<?php
require 'encabezado.php';
?>  
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- parte del encabezado-->
                <div class="row">
                    <div class="col-md-12 text-center text-sm-left">
                        <span>Lista de Ingreso</span>
                    </div>
                    <div class="col-md-12 mt-2 text-center text-sm-right">
                        <button type="button" class="btn btn-secondary ml-2" data-toggle="modal" data-target="#modalIngresos">
                        <i class="fas fa-plus-circle"></i> Nuevo
                        </button>
                    
                    </div>
                </div>         
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->ingresos();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>

<!--Modal para registro-->
<div class="modal fade" id="modalIngresos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Registro de Ingresos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form-ingresos">   
                    
            <div class="form-row">
                <div class="icono3 col-md-6">
                        <i class="fas fa-ticket-alt"></i>                   
                        <input type="text" name="tipo_comprobante" id="tipo_comprobante" class="form-control pl-5 mt-3"   placeholder="Tipo Comprobante (Factura / Recibo)" onkeyup="cerrar();">                    
                        <span data-toggle="tooltip" class="float-right" title="Debe escribir el tipo de comprobante"></span>
                    </div>

                    <div class="icono3 col-md-6">        
                        <i class="fas fa-clipboard-check"></i>
                        <input type="text" name="serie_comprobante" id="serie_comprobante" class="form-control pl-5 mt-3"   placeholder="Ingrese la serie comprobante" onkeyup="cerrar2();">
                        <span data-toggle="tooltip2" class="float-right" title="Debe escribir la serie de comprobante"></span>
                    </div>
            
            </div>

              <div class="form-row">
                <div class="icono3 col-md-6">
                        <i class="fas fa-clipboard-list"></i>                 
                        <input type="number" name="no_comprobante" id="no_comprobante" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)"   placeholder="Ingrese el numero de comprobante" onkeyup="cerrar3();">                    
                        <span data-toggle="tooltip3" class="float-right" title="Debe escribir el numero de comprobante"></span>
                    </div>
                
                    <div class="icono3 col-md-6">
                        <i class="fas fa-clock"></i>                   
                        <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control pl-5 mt-3" placeholder="Ingrese el estado" onkeyup="cerrar4();" >                    
                        <span data-toggle="tooltip4" class="float-right"></span>
                    </div>
              </div>

                <div class="form-row">

                    <div class="icono3 col-md-6">
                        <i class="fas fa-star-half-alt"></i>                  
                        <input type="text" name="estados" id="estados" class="form-control pl-5 mt-3"   placeholder="Ingrese el estado (Cancelado/ No Cancelado)" onkeyup="cerrar6();">                    
                        <span data-toggle="tooltip6" class="float-right" title="Debe agregar el estado del ingreso"></span>
                    </div>
                </div>
                
               
                <label for="" class="mt-3">Codigo Proveedor</label>

                <select name="id_proveedor" id="id_proveedor" class="form-control">
                <option value=""></option>
                <?php
                $filas_proveedores = $Cargar->buscarProveedor();
                $filas_marcas = $Cargar->buscarMarca();
                
                // Crear un array asociativo de marcas para un acceso más rápido
                $marcas = [];
                foreach($filas_marcas as $marca) {
                    $marcas[$marca['id_marca']] = $marca['nombre'];
                }

                if($filas_proveedores){
                    foreach($filas_proveedores as $proveedor){
                        $marca_nombre = isset($marcas[$proveedor['id_marca']]) ? $marcas[$proveedor['id_marca']] : 'Sin Marca';
                        echo '<option value="'.$proveedor['id_proveedor'].'">'.$proveedor['id_proveedor'].' '.$proveedor['nombre'].' - Marca: '.$marca_nombre.'</option>';
                    }
                } else {
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>
                        swal({
                            icon: "error",
                            title: "Atención",
                            text: "Para poder guardar Ingresos debe guardar Proveedores",
                        }).then(function () {	        
                            window.location.href="http://localhost/Proyecto_zapateria/Ver/proveedor";					
                        });
                        </script>
                    ';
                }
                ?>
                </select>

                <div class="icono2">
                                   
                     <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']?>" class="form-control pl-5 mt-3" >                    
                </div>

        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="enviar_ingresos();" class="btn btn-secondary">Guardar Ingresos</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para registro-->

<!--Modal para actualizar-->
<div class="modal fade" id="actualizarIngreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Actualizar Ingreso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form  id="form_ingresoA" name="form_ingresoA">
                <input type="hidden" name="id_ingreso">
                <div class="form-row">
                <div class="icono3 col-md-6">
                        <i class="fas fa-ticket-alt"></i>                   
                        <input type="text" name="tipo_comprobante" id="tipo_comprobante" class="form-control pl-5 mt-3"   placeholder="Tipo Comprobante (Factura / Recibo)" >                    
                    </div>

                    <div class="icono3 col-md-6">        
                        <i class="fas fa-clipboard-check"></i>
                        <input type="text" name="serie_comprobante" id="serie_comprobante" class="form-control pl-5 mt-3"    placeholder="Ingrese la serie comprobante" >
                        
                    </div>
            
            </div>
              <div class="form-row">
                <div class="icono3 col-md-6">
                        <i class="fas fa-clipboard-list"></i>                 
                        <input type="number" name="no_comprobante" id="no_comprobante" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)"   placeholder="Ingrese el numero de comprobante" >                    
                       
                    </div>
                
                    <div class="icono3 col-md-6">
                        <i class="fas fa-clock"></i>                   
                        <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control pl-5 mt-3" >                    
                       
                    </div>
              </div>

                <div class="form-row">
                    <div class="icono3 col-md-6">
                        <i class="fas fa-shopping-cart"></i>                 
                        <input type="number" name="total_compra" id="total_compra" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)"   placeholder="Ingrese el total de compra" >                    
                       
                    </div>

                    <div class="icono3 col-md-6">
                        <i class="fas fa-star-half-alt"></i>                  
                        <input type="text" name="estados" id="estados" class="form-control pl-5 mt-3"   placeholder="Ingrese el estado (Cancelado / No cancelado)" >                    
                        
                    </div>
                </div>
                
                <label for="" class="mt-3">Codigo Proveedor</label>

                <select name="id_proveedor" id="id_proveedor" class="form-control">
                <option value=""></option>
                <?php
                $filas_proveedores = $Cargar->buscarProveedor();
                $filas_marcas = $Cargar->buscarMarca();
                
                // Crear un array asociativo de marcas para un acceso más rápido
                $marcas = [];
                foreach($filas_marcas as $marca) {
                    $marcas[$marca['id_marca']] = $marca['nombre'];
                }

                if($filas_proveedores){
                    foreach($filas_proveedores as $proveedor){
                        $marca_nombre = isset($marcas[$proveedor['id_marca']]) ? $marcas[$proveedor['id_marca']] : 'Sin Marca';
                        echo '<option value="'.$proveedor['id_proveedor'].'">'.$proveedor['id_proveedor'].' '.$proveedor['nombre'].' - Marca: '.$marca_nombre.'</option>';
                    }
                }
                ?>
                </select>

                <div class="icono2">
                                   
                     <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']?>" class="form-control pl-5 mt-3" >                    
                </div>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="actualizar_ingreso();" class="btn btn-secondary">Actualizar Ingreso</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para actualizar-->
<?php
require 'pie.php';
?>
<script src="../assets/js/Ingresos.js"></script>
<script src="../assets/js/Login.js"></script>
