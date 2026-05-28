<?php
require 'Controlador.php';

class Verificar extends Controlador{
    public function usuario(){
        $consultas=$this->modelo('Login');
        $correo=$_POST['correo'];
        $pass=$_POST['password'];
        $incorrecto=false;
        $filas=$consultas->buscarUsuario();

        if($filas){
            foreach($filas as $fila){
                if(($correo==$fila['email']) && ($pass==$fila['password'])){
                    if($fila['status']!=0){
                        session_start();
                        $_SESSION['id_usuario']=$fila['id_usuario'];
                        $_SESSION['nombre']=$fila['nombre'];
                        $_SESSION['dpi']=$fila['dpi'];
                        $_SESSION['direccion']=$fila['direccion'];
                        $_SESSION['telefono']=$fila['telefono'];
                        $_SESSION['email']=$fila['email'];
                        $_SESSION['password']=$fila['password'];
                        $_SESSION['imagen']=$fila['imagen'];   
                        $mensaje='Bienvenido';
                        $incorrecto=false;
                        echo json_encode($mensaje);    
                        return true;                                     
                    }                    
                    $mensaje='Esta cuenta no ha sido activada, vaya a su correo y dele click en el enlace';
                    echo json_encode($mensaje);
                    return true;  
                }else{
                   $incorrecto=true; 
                }
            }
        }else{
            $mensaje='No hay usuarios registrados';
                echo json_encode($mensaje);
                return true;
        }

        if($incorrecto==true){
            $mensaje='Correo o Contraseña incorrecta';
            echo json_encode($mensaje);
            return true; 
        }
    }
}
?>