function enviar_cliente(){
    var nombre = document.getElementById('nombre').value;
    var dpi = document.getElementById('dpi').value;
    var direccion = document.getElementById('direccion').value;
    var telefono = document.getElementById('telefono').value;
    var email = document.getElementById('email').value;

    if(nombre.length>0 && dpi.length>0 && direccion.length>0 && telefono.length>0 && email.length>0){   
        var formData= new FormData(document.getElementById('form-cliente'));
        $.ajax({
            type: "POST",
            url: "http://localhost/Proyecto_zapateria/Insertar/cliente",
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
                    text: 'Datos Registrados',
                }).then(function () {
                    $('#modalCliente').modal("hide");	        
                    window.location.href='http://localhost/Proyecto_zapateria/Ver/cliente';					
                });    
    
                            
        });
    }else{
        if(nombre.length==0){
            $('[data-toggle="tooltip"]').tooltip('show');
        }
        if(dpi.length==0){
            $('[data-toggle="tooltip2"]').tooltip('show');
        }
        if(direccion.length==0){
            $('[data-toggle="tooltip3"]').tooltip('show');
        }
        if(telefono.length==0){
            $('[data-toggle="tooltip4"]').tooltip('show');
        }
        if(email.length==0){
            $('[data-toggle="tooltip5"]').tooltip('show');
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


function mostrar_msg(id){
    swal({
        title: "¿Está seguro eliminar el dato",
        text: "Esta acción es irreversible",
        icon: "warning",
        buttons: {
            confirm : {text:'Si deseo eliminarlo',className:'sweet-warning'},
            cancel : 'Cancelar'
        },
        dangerMode: true
      })
      .then((willDelete) => {
        if (willDelete) {
            var formData= new FormData();
                    formData.append('id_cliente',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/Proyecto_zapateria/Eliminar/cliente",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                    }).done(function(response){
                            var mensaje = JSON.parse(response);
                            console.log(mensaje);
                            swal({
                                    icon: 'success',
                                    title: 'Atención',
                                    text: 'Se ha eliminado el dato',
                                    }).then(function () {							
                                    window.location.href='http://localhost/Proyecto_zapateria/ver/cliente';        
                                    });                                    
                    });
        } else {
          swal("No se eliminó el dato");
        }
      });
}


function cargar(id){
    var conteo=0;
    $("#cargar"+id).parents("tr").find("td").each(function(){
            
                    if(conteo==0){
                        document.form_clienteA.id_cliente.value=$(this).html();
                    }
                    if(conteo==1){
                        document.form_clienteA.nombre.value=$(this).html();
                    } 
                    if(conteo==2){                                                    
                        document.form_clienteA.dpi.value=$(this).html();
                    } 
                    if(conteo==3){
                        document.form_clienteA.direccion.value=$(this).html();
                    }    
                    if(conteo==4){
                        document.form_clienteA.telefono.value=$(this).html();
                    }     
                    if(conteo==5){
                        document.form_clienteA.email.value=$(this).html();
                    }   
                            
                  
            
            conteo++;
    });
}

function actualizar_cliente(){
    var formData= new FormData(document.getElementById('form_clienteA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/Proyecto_zapateria/Modificar/cliente",
        data: formData,
        cache: false,
        contentType: false,
        processData: false
        
    }).done(function(response){
            swal({
            icon: 'success',
            title: 'Atención',
            text: 'Se ha actualizado correctamente',
            }).then(function () {	
                $('#actualizarCliente').modal("hide");	
                window.location.href='http://localhost/Proyecto_zapateria/ver/cliente';					
            });
    });
}
