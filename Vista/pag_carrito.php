<?php
require 'encabezado.php';
?>  

<div class="row no-gutters">
    <div class="col-md-12">
        <!-- parte del encabezado-->
        <div class="row">
            <div class="col-md-12 text-center text-sm-left">
                <span>Productos cargados al carrito</span>
            </div>
        </div>         
            <!-- parte del encabezado-->
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>Codigo de producto</th>
                        <th>Estilo</th>
                        <th>Descripcion</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th>Total</th>
                        <th>Quitar del carrito</th>
                    </tr>
                </thead>

                <tbody id="tabla_zapatos">

                </tbody>
            </table>

            <center><button class="btn btn-danger" data-toggle="modal" data-target="#modalPagar">Pasar a pagar</button></center>
    </div>
</div>

<!--Modal para registro-->
<div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Formulario de pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form-pagar">   
                    
            <div class="form-row">
                <div class="icono3 col-md-6">
                        <i class="fas fa-ticket-alt"></i>                   
                        <input type="text" name="tipo" id="tipo_comprobante" class="form-control pl-5 mt-3"   placeholder="Ingrese el tipo comprobate" onkeyup="cerrar();">                    
                        <span data-toggle="tooltip" class="float-right" title="Debe escribir el tipo de comprobante"></span>
                    </div>

                    <div class="icono3 col-md-6">        
                        <i class="fas fa-clipboard-check"></i>
                        <input type="text" name="serie" id="serie_comprobante" class="form-control pl-5 mt-3"    placeholder="Ingrese la serie comprobante" onkeyup="cerrar2();">
                        <span data-toggle="tooltip2" class="float-right" title="Debe escribir la serie de comprobante"></span>
                    </div>
            
            </div>

                <div class="form-row">
                    <div class="icono3 col-md-6">
                        <i class="fas fa-clock"></i>                   
                        <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control pl-5 mt-3" onkeyup="cerrar3();" >                    
                        <span data-toggle="tooltip3" class="float-right" title="Debe agregar la fecha y hora"></span>
                    </div>

                    <div class="icono3 col-md-6">
                        <i class="fas fa-star-half-alt"></i>                  
                        <input type="text" name="estados" id="estados" class="form-control pl-5 mt-3"   placeholder="Ingrese el estado" onkeyup="cerrar4();">                    
                        <span data-toggle="tooltip4" class="float-right" title="Debe agregar el estado del ingreso"></span>
                    </div>
                </div>

 

                        <label for="" class="mt-3">Seleccine cliente que pagara</label>
                            <select name="id_cliente" id="id_cliente" class="form-control">
                            <option value=""></option>
                            <?php
                            $Cargar = new Cargar();
                            $filas=$Cargar->buscarCliente();
                            if($filas){
                                foreach($filas as $fila){
                                    echo '<option value="'.$fila['id_cliente'].'">'.$fila['id_cliente']." ".$fila['nombre'].'</option>';
                                }
                            }else{
                                echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                                echo '<script>
                                    swal({
                                        icon: "error",
                                        title: "Atención",
                                        text: "Para poder vender debe guardar Clientes",
                                    }).then(function () {	        
                                        window.location.href="http://localhost/Proyecto_zapateria/Ver/cliente";					
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
        <button type="button" onclick="enviar_pago();" class="btn btn-secondary">Confirmar Venta</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para registro-->
<?php
require 'pie.php';
?>

<script src="../assets/js/Mostrar_zapatos.js"></script>
<script src="../assets/js/Pagar.js"></script>