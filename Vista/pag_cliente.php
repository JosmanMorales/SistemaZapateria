<?php
require 'encabezado.php';
?>  
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- parte del encabezado-->
                <div class="row">
                    <div class="col-md-12 text-center text-sm-left">
                        <span>Lista de Clientes</span>
                    </div>
                    <div class="col-md-12 mt-2 text-center text-sm-right">
                        <button type="button" class="btn btn-secondary ml-2" data-toggle="modal" data-target="#modalCliente">
                        <i class="fas fa-plus-circle"></i> Nuevo
                        </button>
                       
                    </div>
                </div>         
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->cliente();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>

<!--Modal para registro-->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Registro de Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form-cliente">   
                    
                <div class="icono2">
                    <i class="fas fa-user-alt"></i>                    
                    <input type="text" name="nombre" id="nombre" class="form-control pl-5 mt-3"  placeholder="Ingrese el nombre" onkeyup="cerrar();">                    
                </div>
                <span data-toggle="tooltip" class="float-right" title="Debe escribir el nombre del cliente"></span>
                <div class="icono2">
                    <i class="fas fa-id-card-alt"></i>                   
                    <input type="text" maxlength="13" class="form-control pl-5 mt-3" id="dpi" name="dpi" onKeyPress="return soloNumeros(event)" placeholder="Ingrese el DPI" onkeyup="cerrar2();">                   
                </div>
                <span data-toggle="tooltip2" class="float-right" title="Debe escribir el DPI del cliente"></span>
                <div class="icono2">        
                    <i class="fas fa-directions"></i> 
                    <input type="text" name="direccion" id="direccion" class="form-control pl-5 mt-3"    placeholder="Ingrese la direccion" onkeyup="cerrar3();">
                </div>
                <span data-toggle="tooltip3" class="float-right" title="Debe escribir una direccion"></span>

                <div class="icono2">        
                    <i class="fas fa-mobile-alt"></i>
                    <input type="text" maxlength="8" class="form-control pl-5 mt-3" id="telefono" name="telefono"  onKeyPress="return soloNumeros(event)" placeholder="Ingrese el Telefono" onkeyup="cerrar4();">
                </div>
                <span data-toggle="tooltip4" class="float-right" title="Debe escribir un numero de telefono"></span>
              
                <div class="icono2">
                     <i class="fas fa-envelope-square"></i>                   
                    <input type="text" name="email" id="email" class="form-control pl-5 mt-3"   placeholder="Ingrese el email" onkeyup="cerrar5();">                    
                </div>
                <span data-toggle="tooltip5" class="float-right" title="Debe escribir un email"></span>

        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="enviar_cliente();" class="btn btn-secondary">Guardar Cliente</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para registro-->

<!-- Modal para actualizar -->
<div class="modal fade" id="actualizarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Actualizar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form  id="form_clienteA" name="form_clienteA">
                <input type="hidden" name="id_cliente">
                <div class="icono2">
                    <i class="fas fa-user-alt"></i>                    
                    <input type="text" name="nombre" id="nombre" class="form-control pl-5 mt-3"  placeholder="Ingrese el nombre">                    
                </div>
                <div class="icono2">
                    <i class="fas fa-id-card-alt"></i>                   
                    <input type="text" maxlength="13" class="form-control pl-5 mt-3" id="dpi" name="dpi" onKeyPress="return soloNumeros(event)" placeholder="Ingrese el DPI">                   
                </div>
                <div class="icono2">        
                    <i class="fas fa-directions"></i> 
                    <input type="text" name="direccion" id="direccion" class="form-control pl-5 mt-3"    placeholder="Ingrese la direccion">
                </div>

                <div class="icono2">        
                    <i class="fas fa-mobile-alt"></i>
                    <input type="text" maxlength="8" class="form-control pl-5 mt-3" id="telefono" name="telefono"  onKeyPress="return soloNumeros(event)" placeholder="Ingrese el Telefono">
                </div>
              
                <div class="icono2">
                     <i class="fas fa-envelope-square"></i>                   
                    <input type="text" name="email" id="email" class="form-control pl-5 mt-3"   placeholder="Ingrese el email">                    
                </div>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="actualizar_cliente();" class="btn btn-secondary">Actualizar Cliente</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para actualizar-->
<?php
require 'pie.php';
?>
<script src="../assets/js/Cliente.js"></script>
<script src="../assets/js/Login.js"></script>