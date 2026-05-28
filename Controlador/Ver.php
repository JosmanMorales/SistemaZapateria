<?php
require 'Controlador.php';
require 'Cargar.php';
Class Ver extends Controlador{
    public function login(){
        $this->vista2('pag_login');
    }
    public function registro(){
        $this->vista2('pag_registro');
    }
    public function dashboard(){
        $this->vista2('pag_dashboard');
    }
    public function perfil(){
        $this->vista2('pag_perfil');
    }
    public function editar_perfil(){
        $this->vista2('pag_editar_perfil');
    }
    public function marca(){      
        $this->vista2('pag_marca');
    }
    public function proveedor(){      
        $this->vista2('pag_proveedor');
    }
    public function cliente(){      
        $this->vista2('pag_cliente');
    }
    public function zapato(){      
        $this->vista2('pag_zapato');
    }

    public function ingresos(){      
        $this->vista2('pag_ingreso');
    }

    public function detalle_ingreso(){      
        $this->vista2('pag_detalle_ingreso');
    }
    public function productos(){      
        $this->vista2('pag_productos');
    }
    public function carrito(){      
        $this->vista2('pag_carrito');
    }
    public function ventas_hechas(){      
        $this->vista2('pag_ventas_hechas');
    }

    public function aux(){      
        $this->vista2('pag_login');
    }
}
?>