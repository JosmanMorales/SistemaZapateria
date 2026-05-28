function enviar_zapato(){
    var estilo = document.getElementById('estilo').value;
    var descripcion = document.getElementById('descripcion').value;
    var talla = document.getElementById('talla').value;
    var imagen = document.getElementById('file-upload1').value;

 if(estilo.length>0 && descripcion.length>0 && talla.length>0 && imagen.length>0){
        var formData= new FormData(document.getElementById('form-zapato'));
        $.ajax({
            type: "POST",
            url: "http://localhost/Proyecto_zapateria/Insertar/zapato",
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
                    $('#modalZapato').modal("hide");	        
                    window.location.href='http://localhost/Proyecto_zapateria/Ver/zapato';					
                });    

                            
        });
 }else{
    if(estilo.length==0){
        $('[data-toggle="tooltip"]').tooltip('show');
    }
    if(descripcion.length==0){
        $('[data-toggle="tooltip2"]').tooltip('show');
    }
    if(talla.length==0){
        $('[data-toggle="tooltip3"]').tooltip('show');
    }
    if(imagen.length==0){
        $('[data-toggle="tooltip4"]').tooltip('show');
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
                    formData.append('id_zapato',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/Proyecto_zapateria/Eliminar/zapato",
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
                                    window.location.href='http://localhost/Proyecto_zapateria/ver/zapato';        
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
                            document.form_zapatoA.id_zapato.value=$(this).html();
                    }
                    if(conteo==1){
                           document.form_zapatoA.estilo.value=$(this).html();
                    }  
                    if(conteo==2){
                           document.form_zapatoA.descripcion.value=$(this).html();
                    }   
                    if(conteo==3){
                        document.form_zapatoA.talla.value=$(this).html();
                     }         
                    if(conteo==4){
                     document.form_zapatoA.stock.value=$(this).html();
                    }         
                    if(conteo==5){
                    document.form_zapatoA.precio.value=$(this).html();
                   }      
                   if(conteo==6){                                                    
                    $("#imagenZapato").attr("src","../assets/img/"+$("#imagen"+id).attr("alt"));
              }              
                  
            
            conteo++;
    });
}

function actualizar_zapato(){
    var formData= new FormData(document.getElementById('form_zapatoA'));

    $.ajax({
        type: "POST",
        url: "http://localhost/Proyecto_zapateria/Modificar/zapato",
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
                $('#actualizarZapato').modal("hide");	
                window.location.href='http://localhost/Proyecto_zapateria/ver/zapato';					
            });
    });
}
