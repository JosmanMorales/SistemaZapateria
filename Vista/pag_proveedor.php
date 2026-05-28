<?php
require 'encabezado.php';
?>  
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- parte del encabezado-->
                <div class="row">
                    <div class="col-md-12 text-center text-sm-left">
                        <span>Lista de Proveedores</span>
                    </div>
                    <div class="col-md-12 mt-2 text-center text-sm-right">
                        <button type="button" class="btn btn-secondary ml-2" data-toggle="modal" data-target="#modalProveedor">
                        <i class="fas fa-plus-circle"></i> Nuevo
                        </button>
                    </div>
                </div>         
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->proveedor();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>

<!--Modal para registro-->
<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Registro de Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form-proveedor" class="text-center">    

                <div class="form-row" >
                <div class="icono3 col-md-6">
                    <i class="fas fa-user-alt"></i>                    
                    <input type="text" name="nombre" id="nombre" class="form-control pl-5 mt-3"   placeholder="Ingrese el nombre" onkeyup="cerrar();">                    
                    <span data-toggle="tooltip" class="float-right" title="Debe escribir el nombre del proveedor"></span>
                </div>
                <div class="icono3 col-md-6">       
                    <i class="fas fa-directions"></i> 
                    <input type="text" name="direccion" id="direccion" class="form-control pl-5 mt-3"    placeholder="Ingrese la direccion" onkeyup="cerrar2();">
                    <span data-toggle="tooltip2" class="float-right" title="Debe escribir una direccion"></span> 
                </div>
                </div>

              <div class="form-row">
              <div class="icono3 col-md-6">        
                    <i class="fas fa-mobile-alt"></i>
                    <input type="text" maxlength="8" class="form-control pl-5 mt-3" id="telefono" name="telefono"   onKeyPress="return soloNumeros(event)" placeholder="Ingrese el Telefono" onkeyup="cerrar3();">
                    <span data-toggle="tooltip3" class="float-right"  title="Debe escribir un numero de telefono"></span>
                </div>

                <div class="icono3 col-md-6">
                     <i class="fas fa-envelope-square"></i>                   
                    <input type="text" name="email" id="email" class="form-control pl-5 mt-3"   placeholder="Ingrese el email" onkeyup="cerrar4();">                    
                    <span data-toggle="tooltip4" class="float-right"   title="Debe escribir un email"></span>
                </div>
                
              </div>
                
                <label for="" class="mt-3">Codigo Marca</label>
                <select name="id_marca" id="id_marca" class="form-control"  >
                <option value="" ></option>
                <?php
                $filas=$Cargar->buscarMarca();
                if($filas){
                    foreach($filas as $fila){
                        echo '<option value="'.$fila['id_marca'].'">'.$fila['id_marca']." ".$fila['nombre'].'</option>';
                    }
                }else{
                    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
                    echo '<script>
                        swal({
                            icon: "error",
                            title: "Atención",
                            text: "Para poder guardar proveedores debe guardar marcas",
                        }).then(function () {	        
                            window.location.href="http://localhost/Proyecto_zapateria/Ver/marca";					
                        });
                        </script>
                    ';

                }
                ?>
                </select>

                
                <div class="col-md-12 mt-4 informacion1" style="width:15%; margin-left: auto; margin-right: auto;">        
                <input id="file-upload1" name="img-1" onchange='cambiar(); cerrar6();' onclick="cambio()" type="file" style='display: none;'/>
                    <img class="img-fluid img-prev1 img1" id="img1" src="../assets/img/no_disponible.jpg" width="100" height="100" />                        
                </div>
                <span data-toggle="tooltip6" class="centro"  title="Debe seleccionar una imagen"></span>
                <div class="text-center">                
                    <div id="info1"></div>
                    <label for="file-upload1" class="subir mt-4">
                    <i class="fas fa-images"></i> Cambiar Imagen
                    </label>                    
                </div>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" onclick="enviar_proveedor();" class="btn btn-secondary">Guardar Proveedor</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para registro-->

<!--Modal para actualizar-->
<div class="modal fade" id="actualizarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100" id="exampleModalScrollableTitle">Actualizar Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form enctype="multipart/form-data" id="form_proveedorA" name="form_proveedorA">
                <input type="hidden" name="id_proveedor">

                <div class="form-row">
                    <div class="icono3 col-md-6">
                        <i class="fas fa-user-alt"></i>                    
                        <input type="text" name="nombre" id="nombre" class="form-control pl-5 mt-3"  placeholder="Ingrese el nombre">                    
                    </div>
                    <div class="icono3 col-md-6">        
                        <i class="fas fa-directions"></i> 
                        <input type="text" name="direccion" id="direccion" class="form-control pl-5 mt-3"   placeholder="Ingrese la direccion">
                    </div>

                </div>

               <div class="form-row">
                <div class="icono3 col-md-6">        
                        <i class="fas fa-mobile-alt"></i>
                        <input type="text" maxlength="8" class="form-control pl-5 mt-3" id="telefono" name="telefono"  onKeyPress="return soloNumeros(event)" placeholder="Ingrese el Telefono">
                    </div>
                
                    <div class="icono3 col-md-6">
                        <i class="fas fa-envelope-square"></i>                   
                        <input type="text" name="email" id="email" class="form-control pl-5 mt-3"  placeholder="Ingrese el email">                    
                    </div>
               </div>

                <label for="" class="mt-3">Codigo Marca</label>
                <select name="id_marca" id="id_marca" class="form-control">
                <option value=""></option>
                <?php
                $filas=$Cargar->buscarMarca();
                if($filas){
                    foreach($filas as $fila){
                        echo '<option value="'.$fila['id_marca'].'">'.$fila['id_marca']." ".$fila['nombre'].'</option>';
                    }
                }
                ?>
                </select>

                
                <div class="col-md-12 mt-4 informacion2" style="width:15%; margin-left: auto; margin-right: auto;">        
                <input id="file-upload2" name="img-2" onchange='cambiar2()' onclick="cambio2()" type="file" style='display: none;'/>
                    <img class="img-fluid img-prev1 img2" id="imagenProveedor" src="../assets/img/no_disponible.jpg" width="100" height="100" />                        
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
        <button type="button" onclick="actualizar_proveedor();" class="btn btn-secondary">Actualizar Proveedor</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
        </div>
      </div>
    </div>
  </div>
<!--Modal para actualizar-->
<?php
require 'pie.php';
?>
<script src="../assets/js/Proveedor.js"></script>
<script src="../assets/js/Login.js"></script>
