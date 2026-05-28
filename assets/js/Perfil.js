function enviar_usuario(id){
    var formData= new FormData(document.getElementById('form-perfil'));
    formData.append('id_usuario',id);
    $.ajax({
        type: "POST",
        url: "http://localhost/Proyecto_zapateria/Modificar/usuario",
        data: formData,
        cache: false,
        contentType: false,
        processData: false 
    }).done(function(response){
        var mensaje =JSON.parse(response);
        console.log(mensaje);
            swal({
                icon: 'success',
                title: 'Atención',
                text: 'Datos actualizados',
            }).then(function () {	        
                window.location.href='http://localhost/Proyecto_zapateria/Ver/dashboard';					
            });                         
    }); 
}
function enviar_usuario2(id){
    var formData= new FormData(document.getElementById('form-perfil2'));
    formData.append('id_usuario',id);
    $.ajax({
        type: "POST",
        url: "http://localhost/Proyecto_zapateria/Modificar/usuario",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
        
    }).done(function(response){
        var mensaje =JSON.parse(response);
        console.log(mensaje);
            swal({
                icon: 'success',
                title: 'Atención',
                text: 'Datos actualizados',
            }).then(function () {	        
                window.location.href='http://localhost/Proyecto_zapateria/Ver/dashboard';					
            });                
    });
}

function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}