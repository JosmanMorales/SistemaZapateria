<?php
require 'encabezado.php';
?>
<div class="container">
    <h1 class="text-center">Editar Perfil</h1>  
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Form para dispositivos grandes-->
            <form class="mt-4 d-md-block d-none" id="form-perfil" enctype="multipart/form-data"> 
                <div class="form-row">

                    <div class="col-lg-6">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-image"></i>&nbsp;Foto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <?php 
                            if ($_SESSION['imagen']==null):
                            ?>
                            <img class="img-fluid" src="../assets/img/user_icon.jpg" width="100" height="100">
                            <?php 
                            else:
                            ?>
                            <img class="img-fluid" src="../assets/img/fotos_users/<?php echo $_SESSION['imagen'];?>" width="100" height="100">
                            <?php 
                            endif
                            ?>  
                        </div>  
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="input-group mb-4 informacion1">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-images"></i>&nbsp;&nbsp;Cambiar&nbsp;&nbsp; <br> Foto</div>
                            </div>
                            <input id="file-upload1" name="img-1" onchange='cambiar()' onclick="cambio()" type="file" style='display: none;'/>                                                                                   
                            <img class="img-fluid img-prev1 img1" src="../assets/img/no_disponible.jpg" width="100" height="100" />
                            &nbsp;
                            
                            <label for="file-upload1" class="subir mt-4">
                            <i class="fas fa-images"></i> Cambiar Imagen
                            </label> 
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div id="info1"></div>
                        </div>  
                    </div>

                    <div class="col-lg-6">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-signature"></i>&nbsp;Nombre&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $_SESSION['nombre'];?>">  
                        </div>  
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DPI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" maxlength="13" class="form-control" name="dpi" value="<?php echo $_SESSION['dpi'];?>">  
                        </div>  
                    </div>

                    <div class="col-lg-6">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i>&nbsp;Dirección&nbsp;&nbsp;&nbsp</div>
                            </div>
                            <input type="text" class="form-control" name="direccion" value="<?php echo $_SESSION['direccion'];?>">  
                        </div>  
                    </div>

                    <div class="col-lg-6">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-phone"></i>&nbsp;Telefono &nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" maxlength="8" class="form-control" name="telefono" value="<?php echo $_SESSION['telefono'];?>" onKeyPress="return soloNumeros(event)">  
                        </div>  
                    </div>  

                    <div class="col-lg-6">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-envelope"></i>&nbsp;Correo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <input type="text" class="form-control" name="correo" value="<?php echo $_SESSION['email'];?>">  
                        </div>  
                    </div>

                    <div class="col-lg-6">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-envelope"></i>&nbsp;Contraseña</div>
                            </div>
                            <input type="text" class="form-control" name="password" value="<?php echo $_SESSION['password'];?>">  
                        </div>  
                    </div>
                    <div class="col-md-4 offset-md-2 mt-5">
                        <button type="button" class="btn btn-primary btn-block" onclick="enviar_usuario(<?php echo $_SESSION['id_usuario']; ?>);">Actualizar Datos</button>
                    </div>
                    <div class="col-md-4 mt-5">
                        <a href="http://localhost/Proyecto_zapateria/Ver/dashboard" class="btn btn-danger btn-block">Cancelar</a>   
                    </div>
                                     
                </div>                
            </form>
            <!-- Form para dispositivos grandes-->

            <!--Form para dispositivos pequeños-->
            <form class="d-block d-md-none" id="form-perfil2" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="icono2 col-12">
                        <label for="" class="mt-3">Foto</label><br>
                        <?php 
                            if ($_SESSION['imagen']==null):
                        ?>
                            <img class="img-fluid" src="../assets/img/user_icon.jpg" width="100" height="100">
                        <?php 
                            else:
                        ?>
                            <img class="img-fluid" src="../assets/img/fotos_users/<?php echo $_SESSION['imagen'];?>" width="100" height="100">
                        <?php 
                            endif
                        ?>  
                    </div>
                    <div class="col-12 informacion2">
                        <label for="" class="mt-3">Cambiar Foto</label>                        
                        <input id="file-upload2" name="img-1" onchange='cambiar2()' onclick="cambio2()" type="file" style='display: none;'/>
                            <img class="img-fluid img-prev1 img2" src="../assets/img/no_disponible.jpg" width="100" height="100" />
                            &nbsp;
                            <div id="info2"></div>
                            <label for="file-upload2" class="subir mt-4">
                            <i class="fas fa-images"></i> Cambiar Imagen
                            </label>                             
                            
                    </div>

                    <div class="icono2 col-12">
                        <label for="" class="mt-3">Nombre</label>
                        <i class="fas fa-file-signature"></i>
                        <input type="text" name="nombre" class="form-control pl-5" value="<?php echo $_SESSION['nombre'];?>">
                    </div>
                    <div class="icono2 col-12">
                        <label for="" class="mt-3">DPI</label>
                        <i class="fas fa-id-card"></i>
                        <input type="number" name="dpi" class="form-control pl-5" value="<?php echo $_SESSION['dpi'];?>">
                    </div>
                    <div class="icono2 col-12">
                        <label for="" class="mt-3">Dirección</label>
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" name="direccion" class="form-control pl-5" value="<?php echo $_SESSION['direccion'];?>">
                    </div>
                    <div class="icono2 col-12">
                        <label for="" class="mt-3">Telefono</label>
                        <i class="fas fa-phone"></i>
                        <input type="number" name="telefono" class="form-control pl-5" value="<?php echo $_SESSION['telefono'];?>">
                    </div>
                    <div class="icono2 col-12">
                        <label for="" class="mt-3">Correo</label>
                        <i class="far fa-envelope"></i>
                        <input type="text" name="correo" class="form-control pl-5" value="<?php echo $_SESSION['email'];?>">
                    </div>
                    <div class="icono2 col-12">
                        <label for="" class="mt-3">Contraseña</label>
                        <i class="far fa-envelope"></i>
                        <input type="text" name="password" class="form-control pl-5" value="<?php echo $_SESSION['password'];?>">
                    </div>
                    <button type="button" class="btn btn-primary btn-block" onclick="enviar_usuario2(<?php echo $_SESSION['id_usuario']; ?>);">Actualizar Datos</button>
                    <a href="http://localhost/Proyecto_zapateria/Ver/dashboard" class="btn btn-danger btn-block">Cancelar</a>   
                </div>
            </form>
            <!--Form para dispositivos pequeños-->
        </div>
    </div>
</div>
<?php
require 'pie.php';
?>
<script src="../assets/js/cargar_img.js"></script>
<script src="../assets/js/Perfil.js"></script>

