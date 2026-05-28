<?php
require 'encabezado.php';
?>  
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- parte del encabezado-->
                <div class="row">
                    <div class="col-md-12 text-center text-sm-left">
                        <span>Lista de Marcas</span>
                    </div>
                    <div class="col-md-12 mt-2 text-center text-sm-right">
                        <button type="button" class="btn btn-secondary ml-2" data-toggle="modal" data-target="#modalMarca">
                        <i class="fas fa-plus-circle"></i> Nuevo
                        </button>
                      
                    </div>
                </div>         
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->marca();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>

<!--Modal para registro-->
<div class="modal fade" id="modalMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Registro de Marcas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form-marca" class="text-center">                
                <div class="icono2">
                    <i class="fas fa-file-signature"></i>                    
                    <input type="text" name="nombre" id="nombre" class="form-control pl-5 mt-3" placeholder="Ingrese el nombre" onkeyup="cerrar();">                    
                </div>
                <span data-toggle="tooltip" class="float-right" title="Debe escribir el nombre de la marca"></span>
                
                <div class="icono2">        
                    <i class="fas fa-globe-europe"></i>
                    <input type="text" name="origen" id="origen" class="form-control pl-5 mt-3" placeholder="Ingrese el origen">
                </div>
                <span data-toggle="tooltip2" class="float-right" title="Debe escribir un origen de la marca" onkeyup="cerrar2();"></span>
                
                <div class="col-md-12 mt-4 informacion1" style="width:30%; margin-left: auto; margin-right: auto;">        
                <input id="file-upload1" name="img-1" onchange='cambiar(); cerrar3();' onclick="cambio()" type="file" style='display: none;' />
                    <img class="img-fluid img-prev1 img1" id="img1" src="../assets/img/no_disponible.jpg" width="100" height="100" />                        
                </div>
                <span data-toggle="tooltip3" class="centro" title="Debe seleccionar una imagen"></span>
                <div class="text-center">                
                    <div id="info1"></div>
                    <label for="file-upload1" class="subir mt-4">
                    <i class="fas fa-images"></i> Cambiar Imagen
                    </label>                    
                </div>

        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="enviar_marca();" class="btn btn-secondary">Guardar Marca</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para registro-->

<!--Modal para actualizar-->
<div class="modal fade" id="actualizarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Actualizar Marca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form_marcaA" name="form_marcaA">
                <input type="hidden" name="id_marca">
                <div class="icono2">        
                   
                    <i class="fas fa-file-signature"></i>
                    <input type="text" name="nombre" class="form-control pl-5 mt-3" placeholder="Ingrese el nombre">
                </div>
                
                <div class="icono2">        
                    <i class="fas fa-globe-europe"></i>
                    <input type="text" name="origen" class="form-control pl-5 mt-3" placeholder="Ingrese el origen">
                </div>
                
                <div class="col-md-12 mt-4 informacion2" style="width:30%; margin-left: auto; margin-right: auto;">        
                <input id="file-upload2" name="img-2" onchange='cambiar2()' onclick="cambio2()" type="file" style='display: none;'/>
                    <img class="img-fluid img-prev1 img2" id="imagenMarca" src="../assets/img/no_disponible.jpg" width="100" height="100" />                        
                </div>
                <div class="text-center">                
                    <div id="info2"></div>
                    <label for="file-upload2" class="subir mt-4">
                    <i class="fas fa-images"></i> Cambiar Imagen
                    </label>                    
                </div>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="actualizar_marca();" class="btn btn-secondary">Actualizar Marca</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para actualizar-->
<?php
require 'pie.php';
?>
<script src="../assets/js/Marca.js"></script>