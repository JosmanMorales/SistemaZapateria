function enviar_ingresos(){
    var tipo_comprobante = document.getElementById('tipo_comprobante').value;
    var serie_comprobante = document.getElementById('serie_comprobante').value;
    var no_comprobante = document.getElementById('no_comprobante').value;
    var fecha_hora = document.getElementById('fecha_hora').value;
    var estados = document.getElementById('estados').value;
    var id_proveedor = document.getElementById('id_proveedor').value;
    var id_usuario = document.getElementById('id_usuario').value;
    
    
    if(tipo_comprobante.length>0 && serie_comprobante.length>0 && no_comprobante.length>0 && fecha_hora.length>0 && estados.length>0 && id_proveedor.length>0 && id_usuario.length>0){
            var formData= new FormData(document.getElementById('form-ingresos'));
            $.ajax({
                type: "POST",
                url: "http://localhost/Proyecto_zapateria/Insertar/ingreso",
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
                        $('#modalIngresos').modal("hide");	        
                        window.location.href='http://localhost/Proyecto_zapateria/Ver/ingresos';					
                    });                                   
            });

    }else{
        if(tipo_comprobante.length==0){
            $('[data-toggle="tooltip"]').tooltip('show');
        }
        if(serie_comprobante.length==0){
            $('[data-toggle="tooltip2"]').tooltip('show');
        }
        if(no_comprobante.length==0){
            $('[data-toggle="tooltip3"]').tooltip('show');
        }
        if(fecha_hora.length==0){
            $('[data-toggle="tooltip4"]').tooltip('show');
        }
        if(estados.length==0){
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

function cerrar6(){
    $('[data-toggle="tooltip6"]').tooltip('hide');
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
                    formData.append('id_ingreso',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/Proyecto_zapateria/Eliminar/ingreso",
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
                                    window.location.href='http://localhost/Proyecto_zapateria/ver/ingresos';        
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
                        document.form_ingresoA.id_ingreso.value=$(this).html();
                    }
                    if(conteo==1){
                        document.form_ingresoA.tipo_comprobante.value=$(this).html();
                    } 
                    if(conteo==2){                                                    
                        document.form_ingresoA.serie_comprobante.value=$(this).html();
                    } 
                    if(conteo==3){
                        document.form_ingresoA.no_comprobante.value=$(this).html();
                    }    
                    if(conteo==4){
                        document.form_ingresoA.fecha_hora.value=$(this).html();
                    }     
                    if(conteo==5){
                        document.form_ingresoA.total_compra.value=$(this).html();
                    }   
                    if(conteo==6){
                        document.form_ingresoA.estados.value=$(this).html();
                    }   
                    if(conteo==7){
                        document.form_ingresoA.id_proveedor.value=$(this).html();
                    }   
                    if(conteo==8){
                        document.form_ingresoA.id_usuario.value=$(this).html();
                    }   
                                                
            conteo++;
    });
}

function actualizar_ingreso(){
    var formData= new FormData(document.getElementById('form_ingresoA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/Proyecto_zapateria/Modificar/ingreso",
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
                $('#actualizarIngreso').modal("hide");	
                window.location.href='http://localhost/Proyecto_zapateria/ver/ingresos';					
            });
    });
}

