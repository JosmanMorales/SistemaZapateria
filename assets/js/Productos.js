function mostrar_msg(zapatos){
    swal({
        title: "¡Atención!",
        text: "¿Cuántos zapatos de este estilo desea cargar al carrito?",
        icon: "info",
        content: "input",
        button: {
            text: "Agregar al carrito",
            closeModal: false,
        },
    })
    .then((value) => {
        if (!value) throw null;

        var cantidadIngresada = parseInt(value);
        var cantidadEnStock = zapatos.stock; // La cantidad en stock está en zapatos.stock

        if (cantidadIngresada > cantidadEnStock) {
            swal("Error", "Está intentando agregar una cantidad mayor a la disponible en stock", "error");
            swal.stopLoading();
            swal.close();
        } else {
            var tot = parseFloat(value) * parseFloat(zapatos.precio);
            var array_zapato = {
                id_zapato: zapatos.id_zapato,
                estilo: zapatos.estilo,
                descripcion: zapatos.descripcion,
                talla: zapatos.talla,
                precio: zapatos.precio,
                imagen: zapatos.imagen,
                cantidad: cantidadIngresada,
                total: tot
            };
            var temp = JSON.parse(localStorage.getItem('zapatos')) || [];
            temp.push(array_zapato);
            localStorage.setItem('zapatos', JSON.stringify(temp));
            swal("Zapato(s) cargados al carrito");
            swal.stopLoading();
            swal.close();
        }
    })
    .catch(err => {
        if (err) {
            swal("Hubo un error");
        } else {
            swal("No ha escrito nada");
        }
        swal.stopLoading();
        swal.close();
    });
}
