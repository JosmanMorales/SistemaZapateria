<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SISTEMA UMG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="../assets/css/style-login.css">
    <title>Login</title>
</head>
<body class="animate__animated animate__slideInLeft">
    <!--Login-->
    <div id="loading-screen" style="display:none">
        <img src="../assets/img/spinner.svg">
    </div>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-6 col-lg-7 izquierda2">

            </div>
            <div class="col-md-6 col-lg-5 derecha">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-md-12 px-5 text-center">
                    <img src="../assets/img/logo_zapato.png" alt="" class="img-fluid" width="100" heigth="100">
                        <h4>Registro</h4> 
                        <form action="" method="POST" id="form-login">
                            <div class="md-form form-sm">
                                <span data-toggle="tooltip" title="Debe escribir el nombre"></span>
                                <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required onkeyup="cerrar();">                    
                                <label for="materialLoginFormEmail">Nombre</label>
                            </div>
                            <div class="md-form form-sm">
                            <span data-toggle="tooltip2" title="Debe escribir el DPI"></span>
                                <input type="text" maxlength="13" class="form-control form-control-sm" id="dpi" name="dpi" required onkeyup="cerrar2();" onKeyPress="return soloNumeros(event)">
                                <label for="materialLoginFormEmail">Identificación Personal</label>
                            </div>
                            <div class="md-form form-sm">
                                <span data-toggle="tooltip3" title="Debe escribir la direccion"></span>
                                <input type="text" class="form-control form-control-sm" id="direccion" name="direccion" required onkeyup="cerrar3();">
                                <label for="materialLoginFormEmail">Dirección</label>
                            </div>
                            <div class="md-form form-sm">
                                <span data-toggle="tooltip4" title="Debe escribir el telefono"></span>
                                <input type="text" maxlength="8" class="form-control form-control-sm" id="telefono" name="telefono" required onkeyup="cerrar4();" onKeyPress="return soloNumeros(event)">
                                <label for="materialLoginFormEmail">Telefono</label>
                            </div>
                            <div class="md-form form-sm">
                                <span data-toggle="tooltip5" title="Debe escribir el correo"></span>
                                <input type="email" class="form-control form-control-sm" id="correo" name="correo" required onkeyup="cerrar5();">
                                <label for="materialLoginFormEmail">Correo</label>
                            </div>
                            <div class="md-form form-sm">
                                <span data-toggle="tooltip6" title="Debe escribir la contraseña"></span>
                                <input type="password" class="form-control form-control-sm" id="password" name="password" required onkeyup="cerrar6();">
                                <label for="materialLoginFormEmail">Password</label>
                            </div>                            
                            <button type="button"  class="btn btn-primary" onclick="enviar_usuario();">Registrarse</button>                            
                            <a href="http://localhost/Proyecto_zapateria/Ver/login" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--Login-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script src="../assets/js/Login.js"></script>
</body>
</html>