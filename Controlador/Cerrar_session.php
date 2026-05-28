<?php
require 'Controlador.php';

class Cerrar_session extends Controlador{
    public function cerrar(){
        session_start();
        session_destroy();
        header("Location: http://localhost/Proyecto_zapateria/ver/login");
    }
}

?>