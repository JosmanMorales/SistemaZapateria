function enviar_pago(){
    var tipo_comprobante = document.getElementById('tipo_comprobante').value;
    var serie_comprobante = document.getElementById('serie_comprobante').value;
    var estados = document.getElementById('estados').value;
    var fecha_hora = document.getElementById('fecha_hora').value;

    if(tipo_comprobante.length>0 && serie_comprobante.length>0 && fecha_hora.length >0 && estados.length>0){
            var formData= new FormData(document.getElementById('form-pagar'));
            var zapatos = localStorage.getItem('zapatos');
            var zapatos_aux = JSON.parse(localStorage.getItem('zapatos'));
            var cantidad_zapato = zapatos_aux.length;
            var total = 0;
            
            for(var i=0; i<cantidad_zapato;i++){
                total += parseFloat(zapatos_aux[i].total);
            }
            formData.append('total',total);

            $.ajax({
                type: "POST",
                url: "http://localhost/Proyecto_zapateria/Insertar/venta",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
                
            }).done(function(response){
                var mensaje =JSON.parse(response);
                console.log(mensaje);
                $.ajax({
                    type : "POST",
                    url : "http://localhost/Proyecto_zapateria/Insertar/venta_dos",
                    data : {data : zapatos},
                    cache : false
                }).done(function(response2){ 
                    var mensaje2 =JSON.parse(response2);
                    console.log(mensaje2);
                    localStorage.clear();
                    //inicio del swal para imprimir
                    swal({
                        title: "¿Desea imprimir la factura?",
                        text: "",
                        icon: "info",
                        buttons: {
                            confirm : {text:'Si deseo imprimir',className:'sweet-info'},
                            cancel : 'Cancelar'
                        },
                        dangerMode: true
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                            window.location.href='http://localhost/Proyecto_zapateria/Factura/imprimir/'+mensaje2;
                            
                        } else {
                            window.location.href='http://localhost/Proyecto_zapateria/Ver/carrito';
                        }
                      });   
                      //Final del swal para imprimir
                });            
            });

    }else{
        if(tipo_comprobante.length==0){
            $('[data-toggle="tooltip"]').tooltip('show');
        }
        if(serie_comprobante.length==0){
            $('[data-toggle="tooltip2"]').tooltip('show');
        }
        if(fecha_hora.length==0){
            $('[data-toggle="tooltip3"]').tooltip('show');
        }
        if(estados.length==0){
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
