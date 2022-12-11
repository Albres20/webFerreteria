$(document).ready(function () {
    //leer el input del id = buscarProducto por cada tecla que se presione
    $('#buscarProducto').typeahead({
        hint: true, 
        highlight: true,
        minLength: 0,
        source: function (busqueda, resultado) {
            $.ajax({
                url: "nuevaVenta/buscarProducto",
                data: 'busqueda=' + busqueda,
                dataType: "json",
                type: "POST",
                success: function (data) {
                    resultado($.map(data, function (item) {
                        return item;
                    }));
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });

    $('#consultaCliente').typeahead({
        hint: true, 
        highlight: true,
        minLength: 0,
        source: function (busqueda, resultado) {
            $.ajax({
                url: "nuevaVenta/buscarCliente",
                data: 'busqueda=' + busqueda,
                dataType: "json",
                type: "POST",
                success: function (data) {
                    resultado($.map(data, function (item) {
                        return item;
                    }));
                    $("#btnBuscarProducto").attr('disabled', false);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
    //segun el cliente seleccionado, mostrar los datos en un div
    $('#consultaCliente').change(function () {
        var cliente = $(this).val();
        $("#btnNuevoCliente").attr('disabled', false);
        console.log(cliente);
        $.ajax({
            url: "nuevaVenta/mostrarCliente",
            data: 'cliente=' + cliente,
            dataType: "json",
            type: "POST",
            success: function (data) {
                //console.log(data);
                var html = "";
                html += "<div class='form-group row required mt-3 mb-2'>";
                html += "<div class='col-sm-4'><strong class='mdi mdi-account'> Nombre</strong></div>";
                html += "<div class='col-sm-8'>"+ data.nombre + "</div>";
                html += "</div>";
                html += "<div class='form-group row mb-2'>";
                html += "<div class='col-sm-4'><strong class='mdi mdi-card-account-details'>"+" "+ data.tipo +"</strong></div>";
                html += "<div class='col-sm-8'>"+ data.num +"</div>";
                html += "</div>";
                html += "<div class='form-group row'>";
                html += "<div class='col-sm-4'><strong class='mdi mdi-map-marker'> Dirección</strong></div>";
                html += "<div class='col-sm-8'>"+ data.dir +"</div>";
                html += "</div>";
                html += "<div class='text-right mt-2'>";
                html += "<a type='button' id='limpiarCliente' class='float-right' style='float: right; /*display:none;*/ '>Elegir otro cliente</a>";
                html += "</div>";
                $("#tablaDatoCliente").html(html);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $('#buscarProducto').change(function () {
        var producto = $(this).val();
        console.log(producto);
        $.ajax({
            url: "nuevaVenta/mostrarProducto",
            data: 'producto=' + producto,
            dataType: "json",
            type: "POST",
            success: function (data) {
                console.log(data);
                $("#cantidadproducto").val(data.stock);
                $("#precioproducto").val(data.precio);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $('#limpiarCliente').click(function(){
        $('#consultaCliente').val('');
        $('#tablaDatoCliente').html('');
      });
});
