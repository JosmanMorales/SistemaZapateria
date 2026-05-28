<?php
require 'encabezado.php';

?>  
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- parte del encabezado-->
                <div class="row">
                    <div class="col-md-12 text-center text-sm-left">
                        <span>Lista de Zapatos</span>
                    </div>
                    <div class="col-md-12 mt-2 text-center text-sm-right">
                        <button type="button" class="btn btn-secondary ml-2" data-toggle="modal" data-target="#modalZapato">
                        <i class="fas fa-plus-circle"></i> Nuevo
                        </button>
                        
                    </div>
                </div>         
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->zapato();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>

<!--Modal para registro-->
<div class="modal fade" id="modalZapato" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Registro de Zapatos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form-zapato" class="text-center">  

                  <div class="icono2 ">
                    <i class="fas fa-shoe-prints"></i>                  
                        <input type="text" name="estilo" id="estilo" class="form-control pl-5 mt-3" placeholder="Ingrese el estilo" onkeyup="cerrar();">                    
                    </div>
                    <span data-toggle="tooltip" class="float-right" title="Debe escribir el estilo del zapato"></span>

                    <div class="icono2">        
                    <i class="fas fa-pen-square"></i>
                        <input type="text" name="descripcion" id="descripcion" class="form-control pl-5 mt-3" placeholder="Ingrese la descripcion" onkeyup="cerrar2();">
                    </div>
                    <span data-toggle="tooltip2" class="float-right" title="Debe escribir una descripcion"></span>

                  <div class="icono2">        
                    <i class="fas fa-sort-numeric-up"></i>
                        <input type="text" name="talla" id="talla" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)" placeholder="Ingrese la talla" onkeyup="cerrar3();">
                    </div>
                    <span data-toggle="tooltip3" class="float-right" title="Debe escribir la talla del zapato"></span>
                              
                <div class="col-md-12 mt-4 informacion1" style="width:15%; margin-left: auto; margin-right: auto;">        
                <input id="file-upload1" name="img-1" onchange='cambiar(); cerrar4();' onclick="cambio()" type="file" style='display: none;'/>
                    <img class="img-fluid img-prev1 img1" id="img1" src="../assets/img/no_disponible.jpg" width="100" height="100" />                        
                </div>
                <span data-toggle="tooltip4" class="centro" title="Debe seleccionar una imagen"></span>
                <div class="text-center">                
                    <div id="info1"></div>
                    <label for="file-upload1" class="subir mt-4">
                    <i class="fas fa-images"></i> Cambiar Imagen
                    </label>                    
                </div>


        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="enviar_zapato();" class="btn btn-secondary">Guardar Zapato</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para registro-->

<!--Modal para actualizar-->
<div class="modal fade" id="actualizarZapato" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Actualizar Zapato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
        <form enctype="multipart/form-data" id="form_zapatoA" name="form_zapatoA">
                <input type="hidden" name="id_zapato">
      
                <div class="form-row">

                  <div class="icono3 col-md-6">
                    <i class="fas fa-shoe-prints"></i>                  
                        <input type="text" name="estilo" id="estilo" class="form-control pl-5 mt-3" placeholder="Ingrese el estilo">                    
                    </div>
                    <div class="icono3 col-md-6">        
                    <i class="fas fa-pen-square"></i>
                        <input type="text" name="descripcion" id="descripcion" class="form-control pl-5 mt-3" placeholder="Ingrese la descripcion">
                    </div>

                </div>

              <div class="form-row">
              
                <div class="icono3 col-md-4">        
                  <i class="fas fa-sort-numeric-up"></i>
                      <input type="text" name="talla" id="talla" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)" placeholder="Ingrese la talla">
                  </div>

                  <div class="icono3 col-md-4">        
                  <i class="fas fa-sort-numeric-up"></i>
                      <input type="text" name="stock" id="stock" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)" placeholder="Ingrese el stock">
                  </div>

                  <div class="icono3 col-md-4">        
                  <i class="fas fa-sort-numeric-up"></i>
                      <input type="text" name="precio" id="precio" class="form-control pl-5 mt-3" onKeyPress="return soloNumeros(event)" placeholder="Ingrese el precio">
                  </div>
              </div>

                
                <div class="col-md-12 mt-4 informacion2" style="width:15%; margin-left: auto; margin-right: auto;">        
                <input id="file-upload2" name="img-2" onchange='cambiar2()' onclick="cambio2()" type="file" style='display: none;'/>
                    <img class="img-fluid img-prev1 img2" id="imagenZapato" src="../assets/img/no_disponible.jpg" width="100" height="100" />                        
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
        <button type="button" onclick="actualizar_zapato();" class="btn btn-secondary">Actualizar Zapato</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para actualizar-->
<?php
require 'pie.php';
?>
<script src="../assets/js/Zapato.js"></script>
<script src="../assets/js/Login.js"></script>