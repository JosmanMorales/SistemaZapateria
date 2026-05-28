<?php
require 'encabezado.php';
?>  
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- parte del encabezado-->
                <div class="row">
                    <div class="col-md-12 text-center text-sm-left">
                        <span>Lista de Detalle de ingresos</span>
                    </div>
                    <div class="col-md-12 mt-2 text-center text-sm-right">
                        <button type="button" class="btn btn-secondary ml-2" data-toggle="modal" data-target="#modalDetalle_ingreso">
                        <i class="fas fa-plus-circle"></i> Nuevo
                        </button>
                        
                    </div>
                </div>         
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->detalle_ingreso();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>

<!--Modal para registro-->
<div class="modal fade" id="modalDetalle_ingreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Registro de Detalle de ingreso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form-detalle_ingreso">   
                    
                <div class="icono2">
                <i class="fas fa-list-ol"></i>                 
                    <input type="text" name="cantidad" id="cantidad" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)"   placeholder="Ingrese la cantidad"  onkeyup="cerrar();">                    
                </div>
                <span data-toggle="tooltip" class="float-right" title="Debe escribir una cantidad"></span>

                <div class="icono2">        
                <i class="fas fa-money-check-alt"></i>
                    <input type="text" name="precio_compra" id="precio_compra" class="form-control pl-5 mt-3"  onKeyPress="return soloNumeros(event)"     placeholder="Ingrese el precio de compra"  onkeyup="cerrar2();">
                </div>
                <span data-toggle="tooltip2" class="float-right" title="Debe escribir un precio de compra"></span>

                <div class="icono2">
                <i class="fas fa-money-bill-alt"></i>              
                    <input type="text" name="precio_venta" id="precio_venta" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)"   placeholder="Ingrese el precio de venta"  onkeyup="cerrar3();">                    
                </div>
                <span data-toggle="tooltip3" class="float-right" title="Debe escribir un precio de venta"></span>
              
                
                
                <label for="" class="mt-3">Codigo Ingreso</label>

                <select name="id_ingreso" id="id_ingreso" class="form-control">
                <option value=""></option>
                <?php
                $filas=$Cargar->buscarIngreso();
                if($filas){
                    foreach($filas as $fila){
                        echo '<option value="'.$fila['id_ingreso'].'">'.$fila['id_ingreso']." ".$fila['no_comprobante'].'</option>';
                    }
                }else{
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>
                        swal({
                            icon: "error",
                            title: "Atención",
                            text: "Para poder guardar Detalle de Ingresos debe guardar Ingresos",
                        }).then(function () {	        
                            window.location.href="http://localhost/Proyecto_zapateria/Ver/ingresos";					
                        });
                        </script>
                    ';
                }
                ?>
                </select>


                <label for="" class="mt-3">Codigo Zapato</label>

                <select name="id_zapato" id="id_zapato" class="form-control">
                <option value=""></option>
                <?php
                $filas=$Cargar->buscarZapato();
                if($filas){
                    foreach($filas as $fila){
                        echo '<option value="'.$fila['id_zapato'].'">'.$fila['id_zapato']." ".$fila['estilo'].'</option>';
                    }
                }else{
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>
                        swal({
                            icon: "error",
                            title: "Atención",
                            text: "Para poder guardar Detalle de Ingresos debe guardar Zapatos",
                        }).then(function () {	        
                            window.location.href="http://localhost/Proyecto_zapateria/Ver/zapatos";					
                        });
                        </script>
                    ';
                }
                ?>
                </select>

               

        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="enviar_detalle_ingreso();" class="btn btn-secondary">Guardar Detalle</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para registro-->

<!--Modal para actualizar-->
<div class="modal fade" id="actualizarDetalle_ingreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Actualizar Detalle Ingreso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form  id="form_detalle_ingresoA" name="form_detalle_ingresoA">
                <input type="hidden" name="id_detalle_ingreso">
                     
                <div class="icono2">
                <i class="fas fa-list-ol"></i>                 
                    <input type="text" name="cantidad" id="cantidad" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)"   placeholder="Ingrese la cantidad">                    
                </div>

                <div class="icono2">        
                <i class="fas fa-money-check-alt"></i>
                    <input type="text" name="precio_compra" id="precio_compra" class="form-control pl-5 mt-3"  onKeyPress="return soloNumeros(event)"     placeholder="Ingrese el precio de compra">
                </div>

                <div class="icono2">
                <i class="fas fa-money-bill-alt"></i>              
                    <input type="text" name="precio_venta" id="precio_venta" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)"   placeholder="Ingrese el precio de venta">                    
                </div>
              
                
                
                <label for="" class="mt-3">Codigo Ingreso</label>

                <select name="id_ingreso" id="id_ingreso" class="form-control">
                <option value=""></option>
                <?php
                $filas=$Cargar->buscarIngreso();
                if($filas){
                    foreach($filas as $fila){
                        echo '<option value="'.$fila['id_ingreso'].'">'.$fila['id_ingreso']." ".$fila['no_comprobante'].'</option>';
                    }
                }else{
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>
                        swal({
                            icon: "error",
                            title: "Atención",
                            text: "Para poder guardar Detalle de Ingresos debe guardar Ingresos",
                        }).then(function () {	        
                            window.location.href="http://localhost/Proyecto_zapateria/Ver/ingresos";					
                        });
                        </script>
                    ';
                }
                ?>
                </select>


                <label for="" class="mt-3">Codigo Zapato</label>

                <select name="id_zapato" id="id_zapato" class="form-control">
                <option value=""></option>
                <?php
                $filas=$Cargar->buscarZapato();
                if($filas){
                    foreach($filas as $fila){
                        echo '<option value="'.$fila['id_zapato'].'">'.$fila['id_zapato']." ".$fila['estilo'].'</option>';
                    }
                }else{
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>
                        swal({
                            icon: "error",
                            title: "Atención",
                            text: "Para poder guardar Detalle de Ingresos debe guardar Zapatos",
                        }).then(function () {	        
                            window.location.href="http://localhost/Proyecto_zapateria/Ver/zapatos";					
                        });
                        </script>
                    ';
                }
                ?>
                </select>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="actualizar_detalle_ingreso();" class="btn btn-secondary">Actualizar Detalle</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para actualizar-->
<?php
require 'pie.php';
?>
<script src="../assets/js/Detalle_ingreso.js"></script>
<script src="../assets/js/Login.js"></script>
