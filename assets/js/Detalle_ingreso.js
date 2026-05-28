function enviar_detalle_ingreso(){
    var cantidad = document.getElementById('cantidad').value;
    var precio_compra = document.getElementById('precio_compra').value;
    var precio_venta = document.getElementById('precio_venta').value;
    var id_ingreso = document.getElementById('id_ingreso').value;
    var id_zapato = document.getElementById('id_zapato').value;

    if(cantidad.length>0 && precio_compra.length>0 && precio_venta.length>0 && id_ingreso.length>0 && id_zapato.length>0){
        var formData= new FormData(document.getElementById('form-detalle_ingreso'));
        $.ajax({
            type: "POST",
            url: "http://localhost/Proyecto_zapateria/Insertar/detalle_ingreso",
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
                    $('#modalDetalle_ingreso').modal("hide");	        
                    window.location.href='http://localhost/Proyecto_zapateria/Ver/detalle_ingreso';					
                });    
    
                            
        });

    }else{
        if(cantidad.length==0){
            $('[data-toggle="tooltip"]').tooltip('show');
        }
        if(precio_compra.length==0){
            $('[data-toggle="tooltip2"]').tooltip('show');
        }
        if(precio_venta.length==0){
            $('[data-toggle="tooltip3"]').tooltip('show');
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
                    formData.append('id_detalle_ingreso',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/Proyecto_zapateria/Eliminar/detalle_ingreso",
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
                                    window.location.href='http://localhost/Proyecto_zapateria/ver/detalle_ingreso';        
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
                        document.form_detalle_ingresoA.id_detalle_ingreso.value=$(this).html();
                    }
                    if(conteo==1){
                        document.form_detalle_ingresoA.cantidad.value=$(this).html();
                    } 
                    if(conteo==2){                                                    
                        document.form_detalle_ingresoA.precio_compra.value=$(this).html();
                    } 
                    if(conteo==3){
                        document.form_detalle_ingresoA.precio_venta.value=$(this).html();
                    }    
                    if(conteo==4){
                        document.form_detalle_ingresoA.id_ingreso.value=$(this).html();
                    }     
                    if(conteo==5){
                        document.form_detalle_ingresoA.id_zapato.value=$(this).html();
                    }   
                            
                  
            
            conteo++;
    });
}

function actualizar_detalle_ingreso(){
    var formData= new FormData(document.getElementById('form_detalle_ingresoA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/Proyecto_zapateria/Modificar/detalle_ingreso",
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
                window.location.href='http://localhost/Proyecto_zapateria/ver/detalle_ingreso';					
            });
    });
}
