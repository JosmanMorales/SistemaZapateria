function enviar_proveedor(){
    var nombre = document.getElementById('nombre').value;
    var direccion = document.getElementById('direccion').value;
    var telefono = document.getElementById('telefono').value;
    var email = document.getElementById('email').value;
    var imagen = document.getElementById('file-upload1').value;


    if(nombre.length>0 && direccion.length>0 && telefono.length>0 && email.length>0 && imagen.length>0){
        var formData= new FormData(document.getElementById('form-proveedor'));
        $.ajax({
            type: "POST",
            url: "http://localhost/Proyecto_zapateria/Insertar/proveedor",
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
                    $('#modalProveedor').modal("hide");	        
                    window.location.href='http://localhost/Proyecto_zapateria/Ver/proveedor';					
                });    
    
                            
        });
    }else{
        if(nombre.length==0){
            $('[data-toggle="tooltip"]').tooltip('show');
        }
        if(direccion.length==0){
            $('[data-toggle="tooltip2"]').tooltip('show');
        }
        if(telefono.length==0){
            $('[data-toggle="tooltip3"]').tooltip('show');
        }
        if(email.length==0){
            $('[data-toggle="tooltip4"]').tooltip('show');
        }
        if(imagen.length==0){
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
                    formData.append('id_proveedor',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/Proyecto_zapateria/Eliminar/proveedor",
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
                                    window.location.href='http://localhost/Proyecto_zapateria/ver/proveedor';        
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
                        document.form_proveedorA.id_proveedor.value=$(this).html();
                    }
                    if(conteo==1){
                        document.form_proveedorA.nombre.value=$(this).html();
                    }  
                    if(conteo==2){
                        document.form_proveedorA.direccion.value=$(this).html();
                    }    
                    if(conteo==3){
                        document.form_proveedorA.telefono.value=$(this).html();
                    }     
                    if(conteo==4){
                        document.form_proveedorA.email.value=$(this).html();
                    }   
                    if(conteo==5){
                        $("#imagenProveedor").attr("src","../assets/img/"+$("#imagen"+id).attr("alt"));
                        
                    }               
                    if(conteo==6){                                                    
                        document.form_proveedorA.id_marca.value=$(this).html();
                    }
            
            conteo++;
    });
}

function actualizar_proveedor(){
    var formData= new FormData(document.getElementById('form_proveedorA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/Proyecto_zapateria/Modificar/proveedor",
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
                $('#actualizarProveedor').modal("hide");	
                window.location.href='http://localhost/Proyecto_zapateria/ver/proveedor';					
            });
    });
}
