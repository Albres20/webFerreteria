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
        //habilitar el boton de buscar cliente
        if (cliente == "") {
            $('#consultaCliente').prop('disabled', false);
            $("#btnBuscarCliente").prop('disabled', true);
            $("#btnBuscarCliente").removeClass('btn-danger');
            $("#btnBuscarCliente").removeClass('mdi-cancel');
            $("#btnBuscarCliente").addClass('mdi-account-search');
            $("#btnBuscarCliente").addClass('btn-outline-secondary');
        } else {
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
                    html += "<div class='col-sm-8'>" + data.nombre + "</div>";
                    html += "</div>";
                    html += "<div class='form-group row mb-2'>";
                    html += "<div class='col-sm-4'><strong class='mdi mdi-card-account-details'>" + " " + data.tipo + "</strong></div>";
                    html += "<div class='col-sm-8'>" + data.num + "</div>";
                    html += "</div>";
                    html += "<div class='form-group row'>";
                    html += "<div class='col-sm-4'><strong class='mdi mdi-map-marker'> Dirección</strong></div>";
                    html += "<div class='col-sm-8'>" + data.dir + "</div>";
                    html += "</div>";
                    html += "<div class='text-right mt-2'>";
                    html += "<a role='button' class='limpiarCliente float-right' id='limpiarCliente' style='float: right;'>Elegir otro cliente</a>";
                    html += "</div>";
                    $("#tablaDatoCliente").html(html);
                    $("#btnBuscarCliente").prop('disabled', false);
                    //cambiar la clase del boton de buscar cliente
                    $("#btnBuscarCliente").removeClass('mdi-account-search');
                    $("#btnBuscarCliente").removeClass('btn-outline-secondary');
                    $("#btnBuscarCliente").addClass('btn-danger');
                    $("#btnBuscarCliente").addClass('mdi-cancel');
                    //deshabilitar el input de consultaCliente
                    $('#consultaCliente').prop('disabled', true);

                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
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
                $("#cantidadproducto").focus();
                $("#precioproducto").val(data.precio_producto);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $("#btnBuscarCliente").click(function () {
        $('#consultaCliente').prop('disabled', false);
        $("#btnBuscarCliente").prop('disabled', true);
        $("#btnBuscarCliente").removeClass('btn-danger');
        $("#btnBuscarCliente").removeClass('mdi-cancel');
        $("#btnBuscarCliente").addClass('mdi-account-search');
        $("#btnBuscarCliente").addClass('btn-outline-secondary');
        $('#consultaCliente').val('');
        $('#tablaDatoCliente').html('');
    });

    $('.limpiarCliente').click(function () {
        console.log('limpiar');
        $('#consultaCliente').val('');
        $('#tablaDatoCliente').html('');
    });
});

function calcularPrecio(e){
    e.preventDefault();
    const cantidad = $("#cantidadproducto").val();
    const precio = $("#precioproducto").val();
    const total = cantidad * precio;
    console.log(total);
}
