llenar_tabla();

function llenar_tabla(){
    var tbody = document.querySelector("#tabla_zapatos");
    tbody.innerHTML = ' ';

    var zapatos = JSON.parse(localStorage.getItem('zapatos'));

        if(zapatos != null){
            var cant_zapatos = zapatos.length;
            var superTotal = 0;
            
            for(var i=0; i<cant_zapatos; i++){
                var fila = document.createElement('tr');
                var tdId = document.createElement('td'),
                    tdEstilo = document.createElement('td'),
                    tdDescripcion = document.createElement('td'),
                    tdTalla = document.createElement('td'),
                    tdPrecio = document.createElement('td'),
                    tdCantidad = document.createElement('td'),
                    tdImagen = document.createElement('img'),
                    tdTotal = document.createElement('td'),
                    tdQuitar = document.createElement('button');

                //parametros para la imagen
                tdImagen.setAttribute("width","100");
                tdImagen.setAttribute("height","75");

                //parametros para el boton
                tdQuitar.setAttribute("class","btn btn-info");
                tdQuitar.setAttribute("onclick","quitar_zapato("+ i +")");

                //nodos para los td
                var nodoTextoId = document.createTextNode(zapatos[i].id_zapato),
                    nodoTextoEstilo = document.createTextNode(zapatos[i].estilo),
                    nodoTextoDescripcion = document.createTextNode(zapatos[i].descripcion),
                    nodoTextoTalla = document.createTextNode(zapatos[i].talla),
                    nodoTextoPrecio = document.createTextNode(zapatos[i].precio),
                    nodoTextoCantidad = document.createTextNode(zapatos[i].cantidad),
                    nodoTextoTotal = document.createTextNode(zapatos[i].total),
                    nodoTextoQuitar = document.createTextNode("Quitar");

                //agregar los parametros al td
                tdId.appendChild(nodoTextoId);
                tdEstilo.appendChild(nodoTextoEstilo);
                tdDescripcion.appendChild(nodoTextoDescripcion);
                tdTalla.appendChild(nodoTextoTalla);
                tdPrecio.appendChild(nodoTextoPrecio);
                tdCantidad.appendChild(nodoTextoCantidad);
                tdImagen.setAttribute("src","../assets/img/" + zapatos[i].imagen);
                tdTotal.appendChild(nodoTextoTotal);
                tdQuitar.appendChild(nodoTextoQuitar);

                //agregar los parametros al tr
                fila.appendChild(tdId);
                fila.appendChild(tdEstilo);
                fila.appendChild(tdDescripcion);
                fila.appendChild(tdTalla);
                fila.appendChild(tdPrecio);
                fila.appendChild(tdCantidad);
                fila.appendChild(tdImagen);
                fila.appendChild(tdTotal);
                fila.appendChild(tdQuitar);
                
                //agregar al tbody las filas
                tbody.appendChild(fila);

                //hacer la suma total
                superTotal += parseFloat(zapatos[i].total);


            }

            var fila2 = document.createElement("tr");
            var Total = document.createElement("td");
            var tdVacio = document.createElement("td"),
                tdVacio2 = document.createElement("td"),
                tdVacio3 = document.createElement("td"),
                tdVacio4 = document.createElement("td"),
                tdVacio5 = document.createElement("td"),
                tdVacio6 = document.createElement("td"),
                tdSuperTotal = document.createElement("td"),
                tdVacio7 = document.createElement("td");

            var nodoTextoTotal = document.createTextNode("Total a pagar");
            var nodoTextoVacio = document.createTextNode(""),
                nodoTextoVacio2 = document.createTextNode(""),
                nodoTextoVacio3 = document.createTextNode(""),
                nodoTextoVacio4 = document.createTextNode(""),
                nodoTextoVacio5 = document.createTextNode(""),
                nodoTextoVacio6 = document.createTextNode(""),
                nodoTextoSuperTotal = document.createTextNode(superTotal),
                nodoTextoVacio7 = document.createTextNode("");

            Total.appendChild(nodoTextoTotal);
            tdVacio.appendChild(nodoTextoVacio);
            tdVacio2.appendChild(nodoTextoVacio2);
            tdVacio3.appendChild(nodoTextoVacio3);
            tdVacio4.appendChild(nodoTextoVacio4);
            tdVacio5.appendChild(nodoTextoVacio5);
            tdVacio6.appendChild(nodoTextoVacio6);
            tdSuperTotal.appendChild(nodoTextoSuperTotal);
            tdVacio7.appendChild(nodoTextoVacio7);

            fila2.appendChild(Total);
            fila2.appendChild(tdVacio);
            fila2.appendChild(tdVacio2);
            fila2.appendChild(tdVacio3);
            fila2.appendChild(tdVacio4);
            fila2.appendChild(tdVacio5);
            fila2.appendChild(tdVacio6);
            fila2.appendChild(tdSuperTotal);
            fila2.appendChild(tdVacio7);

            tbody.appendChild(fila2);


        }
}

function quitar_zapato(posicion){
    var zapatos = JSON.parse(localStorage.getItem('zapatos'));
    var cant_zapatos = zapatos.length;
    var temp = [];

    for(i=0; i<cant_zapatos; i++){
        if(i!=posicion){
            temp.push(zapatos[i]);
        }
    }

    localStorage.setItem('zapatos',JSON.stringify(temp));
    location.reload();

}