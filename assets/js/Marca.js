function enviar_marca(){
    var nombre = document.getElementById('nombre').value;
    var origen = document.getElementById('origen').value;
    var imagen = document.getElementById('file-upload1').value;

    if(nombre.length>0 && origen.length>0 && imagen.length>0){
        var formData= new FormData(document.getElementById('form-marca'));
        $.ajax({
            type: "POST",
            url: "http://localhost/Proyecto_zapateria/Insertar/marca",
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
                    $('#modalMarca').modal("hide");	        
                    window.location.href='http://localhost/Proyecto_zapateria/Ver/marca';					
                });    
    
                            
        });
    }else{
        if(nombre.length==0){
            $('[data-toggle="tooltip"]').tooltip('show');
        }
        if(origen.length==0){
            $('[data-toggle="tooltip2"]').tooltip('show');
        }
        if(imagen.length==0){
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
                    formData.append('id_marca',id)
                    $.ajax({                            
                            type: "post",
                            url: "http://localhost/Proyecto_zapateria/Eliminar/marca",
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
                                    window.location.href='http://localhost/Proyecto_zapateria/ver/marca';        
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
                            document.form_marcaA.id_marca.value=$(this).html();
                    }
                    if(conteo==1){
                           document.form_marcaA.nombre.value=$(this).html();
                    }  
                    if(conteo==2){
                           document.form_marcaA.origen.value=$(this).html();
                    }               
                    if(conteo==3){                                                    
                          $("#imagenMarca").attr("src","../assets/img/"+$("#imagen"+id).attr("alt"));
                    }
            
            conteo++;
    });
}

function actualizar_marca(){

        var formData= new FormData(document.getElementById('form_marcaA'));

        $.ajax({
            type: "POST",
            url: "http://localhost/Proyecto_zapateria/Modificar/marca",
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
                    $('#actualizarMarca').modal("hide");	
                    window.location.href='http://localhost/Proyecto_zapateria/ver/marca';					
                });
        });


  

}
