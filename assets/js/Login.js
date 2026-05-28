function enviar_usuario(){
    var nombre = document.getElementById('nombre').value;
    var dpi = document.getElementById('dpi').value;
    var direccion = document.getElementById('direccion').value;
    var telefono = document.getElementById('telefono').value;
    var correo = document.getElementById('correo').value;
    var password = document.getElementById('password').value;

    if(nombre.length > 0 && dpi.length > 0 && direccion.length > 0 && telefono.length > 0 && correo.length > 0 && password.length > 0){
        var formData = new FormData(document.getElementById('form-login'));
        $('#loading-screen').css('display', 'block');
        console.log('Enviando solicitud Ajax');
        $.ajax({
            type: "POST",
            url: "http://localhost/Proyecto_zapateria/Insertar/usuario",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(response){
            $('#loading-screen').css('display', 'none');
            console.log('Respuesta recibida:', response);
            try {
                var mensaje = JSON.parse(response);
                console.log('Mensaje:', mensaje);
                if(mensaje == "error"){
                    swal({
                        icon: 'error',
                        title: 'Atención',
                        text: 'Este correo ya ha sido registrado',
                    }).then(function () {
                        window.location.href = 'http://localhost/Proyecto_zapateria/Ver/registro';					
                    });
                } else {
                    swal({
                        icon: 'success',
                        title: 'Atención',
                        text: 'Se ha registrado correctamente, para activar tu cuenta ve a tu correo y haz click en el enlace que te hemos mandado',
                    }).then(function () {
                        window.location.href = 'http://localhost/Proyecto_zapateria/Ver/login';					
                    });
                }
            } catch (e) {
                console.log('Error al parsear JSON:', e);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'Respuesta inesperada del servidor. Por favor, inténtelo nuevamente.'
                });
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('Error en la solicitud Ajax:', textStatus, errorThrown);
            $('#loading-screen').css('display', 'none');
            swal({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al procesar la solicitud. Por favor, inténtelo nuevamente.'
            });
        });
    } else {
        if(nombre.length == 0){
            $('[data-toggle="tooltip"]').tooltip('show');
        }
        if(dpi.length == 0){
            $('[data-toggle="tooltip2"]').tooltip('show');
        }
        if(direccion.length == 0){
            $('[data-toggle="tooltip3"]').tooltip('show');
        }
        if(telefono.length == 0){
            $('[data-toggle="tooltip4"]').tooltip('show');
        }
        if(correo.length == 0){
            $('[data-toggle="tooltip5"]').tooltip('show');
        }
        if(password.length == 0){
            $('[data-toggle="tooltip6"]').tooltip('show');
        }
    }
}

function cerrar(){
    $('[data-toggle="tooltip"]').tooltip('hide');
}
function cerrar2(){
    $('[data-toggle="tooltip2"]').tooltip('hide');
}
function cerrar3(){
    $('[data-toggle="tooltip3"]').tooltip('hide');
}
function cerrar4(){
    $('[data-toggle="tooltip4"]').tooltip('hide');
}
function cerrar5(){
    $('[data-toggle="tooltip5"]').tooltip('hide');
}
function cerrar6(){
    $('[data-toggle="tooltip6"]').tooltip('hide');
}

function ingresar_usuario(){
    var correo = document.getElementById('correoL').value;
    var password = document.getElementById('passwordL').value;

    if(correo.length > 0 && password.length > 0){
        var formData = new FormData(document.getElementById('form-loginL'));
        $('#loading-screen').css('display', 'block');
        $.ajax({
            type: "POST",
            url: "http://localhost/Proyecto_zapateria/Verificar/usuario",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(response){
            var mensaje = JSON.parse(response);
            $('#loading-screen').css('display', 'none');     
            if(mensaje == "Correo o Contraseña incorrecta"){
                swal({
                    title: 'Atención',
                    text: mensaje,
                    icon: 'error'
                }).then(function () {	        
                    window.location.href = 'http://localhost/Proyecto_zapateria/Ver/login';					
                });
            }
            if(mensaje == "Esta cuenta no ha sido activada, vaya a su correo y dele click en el enlace"){
                swal({
                    title: 'Atención',
                    text: mensaje,
                    icon: 'info'
                }).then(function () {	        
                    window.location.href = 'http://localhost/Proyecto_zapateria/Ver/login';					
                });
            }
            if(mensaje == "Bienvenido"){
                swal({
                    title: 'Atención',
                    text: mensaje,
                    icon: 'success'
                }).then(function () {	        
                    window.location.href = 'http://localhost/Proyecto_zapateria/Ver/dashboard';					
                });
            }                   
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('Error en la solicitud Ajax:', textStatus, errorThrown);
            $('#loading-screen').css('display', 'none');
            swal({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al procesar la solicitud. Por favor, inténtelo nuevamente.'
            });
        });
    } else {
        if(correo.length == 0){
            $('[data-toggle="tooltip7"]').tooltip('show');
        }
        if(password.length == 0){
            $('[data-toggle="tooltip8"]').tooltip('show');
        }
    }
}
function cerrar7(){
    $('[data-toggle="tooltip7"]').tooltip('hide');
}
function cerrar8(){
    $('[data-toggle="tooltip8"]').tooltip('hide');
}
function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}
