<?php
require 'encabezado.php';

?>  
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- parte del encabezado-->
                <div class="row">
                    <div class="col-md-12 text-center text-sm-left">
                        <span>Lista de ventas hechas</span>
                    </div>
                </div>         
                <!-- parte del encabezado-->

                <!-- Cuerpo de la página-->
                <?php
                $Cargar = new Cargar();
                $Cargar->ventas_hechas();
                ?>
                <!-- Cuerpo de la página-->
            </div>
        </div>

<?php
require 'pie.php';
?>
