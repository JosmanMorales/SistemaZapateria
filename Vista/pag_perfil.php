<?php
require 'encabezado.php';
?>
<div class="container">
<h1 class="text-center">Perfil</h1>  
    <div class="row justify-content-center">              
        <div class="col-md-5">
            <!-- Card Wider -->
            <div class="card card-cascade wider">

            <!-- Card image -->
            <div class="view view-cascade overlay">
            <?php 
            if ($_SESSION['imagen']==null):
            ?>
            <img class="card-img-top" src="../assets/img/user_icon.jpg" alt="Card image cap">
            <?php 
            else:
            ?>
            <img class="card-img-top" src="../assets/img/fotos_users/<?php echo $_SESSION['imagen'];?>" alt="Card image cap">
            <?php 
            endif
            ?>            
            <a href="#!">
                <div class="mask rgba-white-slight"></div>
            </a>
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center pb-0">

            <!-- Title -->
            <h4 class="card-title"><strong><?php echo $_SESSION['nombre'];?></strong></h4>
            <!-- Text -->
            <p class="card-text">DPI: <?php echo $_SESSION['dpi'];?></p>
            <p class="card-text">Dirección: <?php echo $_SESSION['direccion'];?></p>
            <p class="card-text">Telefono: <?php echo $_SESSION['telefono'];?></p>
            <p class="card-text">Correo: <?php echo $_SESSION['email'];?></p>
           

            <!-- Card footer -->
            <div class="card-footer text-muted text-center mt-4">
               Admistrador
            </div>

            </div>

            </div>
            <!-- Card Wider -->
        </div>
    </div>
</div>
<?php
require 'pie.php';
?>