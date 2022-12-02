$(document).ready(function () {
    //leer el input del id = buscarProducto por cada tecla que se presione
    $('#buscarProducto').keyup(function () {
        //obtener el valor del input
        var valor = $(this).val();
        console.log(valor);
        //si el valor es diferente de vacio
        if (valor != "" && valor != " ") {
            //enviar el valor a la funcion buscarProducto
            buscarProducto(valor);
            //limpiar el div con id = resultadoBusqueda
        } else {
            //si el valor es vacio, mostrar todos los productos
            console.log("vacio");
        }
    });
    console.log("hola");
    // $('#buscarCliente').typeahead({
    //     minLength: 1,
    //     order: "asc",
    //     source: function (query, result) {
    //         console.log("nada");
    //         $.ajax({
    //             //url: '<?php echo URL . RQ ?>php/consulta_sunat1.php',
    //             url: "nuevaVenta/buscarCliente",
    //             method: "POST",
    //             data: { query: query },
    //             dataType: "json",
    //             success: function (data) {
    //                 result($.map(data, function (item) {
    //                     return item;
    //                 }));
    //             },
    //             error: function (XMLHttpRequest, textStatus, errorThrown) {
    //                 console.log(textStatus);
    //             }

    //         })
    //     }
    // });
});

function buscarProducto(consulta) {
    //funcion ajax
    $.ajax({
        //metodo
        type: "POST",
        //url para enviar la consulta
        //url: "nuevaVenta/buscarProducto",
        url: "nuevaVenta/buscarProducto",
        //tipo de dato que se espera de respuesta en formato json
        dataType: "json",
        //informacion a enviar
        data: 'consulta=' + consulta,
        //funcion que se ejecuta si la peticion es correcta
        success: function (response) {
            //mostrar los productos en el div con id = resultadoBusqueda mediante for
            var len = response.length;
            var html = "";
            for (var i = 0; i < len; i++) {
                var nombre = response[i].nombre;
                var precio = response[i].precio;
                var stock = response[i].stock;
                var codigo = response[i].codigo;
                //div con con dropdown

                var html = "<ol class='list-group'>";
                html += "<li class='list-group-item d-flex justify-content-between align-items-start'>";
                html += "<div class='ms-2 me-auto'>";
                html += "<div class='fw-bold'>" + nombre + "</div>";
                html += codigo + " - " + precio;
                html += "</div>";
                html += "<span class='badge bg-primary rounded-pill'>" + stock + "</span>";
                html += "</li>";
                html += "</ol>";
                $("#resultadoBusqueda").append(html);
            }
            html = "";
        }
    })
}

function buscarCliente(consulta) {
    //funcion ajax
    $.ajax({
        //metodo
        type: "POST",
        //url para enviar la consulta
        //url: "nuevaVenta/buscarCliente",
        url: "nuevaVenta/buscarCliente",
        //tipo de dato que se espera de respuesta en formato json
        dataType: "json",
        //informacion a enviar
        data: 'consultaCliente=' + consulta,
        //funcion que se ejecuta si la peticion es correcta
        success: function (response) {
            //mostrar los productos en el div con id = resultadoBusqueda mediante for
            var len = response.length;
            var html = "";
            for (var i = 0; i < len; i++) {
                var nombre = response[i].nombre;
                var tipoDOC = response[i].tipoDOC;
                var numDOC = response[i].numDOC;
                var direccion = response[i].direccion;
                //div con con dropdown

                var html = "<ol class='list-group'>";
                html += "<li class='list-group-item d-flex justify-content-between align-items-start'>";
                html += "<div class='ms-2 me-auto'>";
                html += "<div class='fw-bold'>" + nombre + "</div>";
                html += tipoDOC + " - " + numDOC;
                html += "</div>";
                html += direccion;
                html += "</li>";
                html += "</ol>";
                $("#resultadoBusquedaCliente").append(html);
            }
            html = "";
        }
    })
}