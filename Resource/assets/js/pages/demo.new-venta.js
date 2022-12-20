$(document).ready(function() {
    //leer el input del id = buscarProducto por cada tecla que se presione
    $('#buscarProducto').typeahead({
        hint: true,
        highlight: true,
        minLength: 0,
        source: function(busqueda, resultado) {
            $.ajax({
                url: "nuevaVenta/buscarProducto",
                data: 'busqueda=' + busqueda,
                dataType: "json",
                type: "POST",
                success: function(data) {
                    resultado($.map(data, function(item) {
                        return item;
                    }));
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    });

    $('#consultaCliente').typeahead({
        hint: true,
        highlight: true,
        minLength: 0,
        source: function(busqueda, resultado) {
            $.ajax({
                url: "nuevaVenta/buscarCliente",
                data: 'busqueda=' + busqueda,
                dataType: "json",
                type: "POST",
                success: function(data) {
                    resultado($.map(data, function(item) {
                        return item;
                    }));
                    $("#btnBuscarProducto").attr('disabled', false);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    });
    //segun el cliente seleccionado, mostrar los datos en un div
    $('#consultaCliente').change(function() {
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
                success: function(data) {
                    //console.log(data);
                    if (data == null) {
                        console.log("no existe el cliente");
                    } else {
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
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    });

    $('#buscarProducto').change(function() {
        var producto = $(this).val();
        console.log(producto);
        if (producto != "") {
            $.ajax({
                url: "nuevaVenta/mostrarProducto",
                data: 'producto=' + producto,
                dataType: "json",
                type: "POST",
                success: function(data) {
                    if (data == null) {
                        console.log("no existe el producto");
                    } else {
                        console.log(data);
                        $("#cantidadproducto").focus();
                        $("#precioproducto").val(data.precio_producto);
                        $("#id").val(data.codigo);
                    }
                },
                error: function(data) {
                    console.log("no existe el producto");
                }
            });
        }
    });

    $("#btnBuscarCliente").click(function() {
        $('#consultaCliente').prop('disabled', false);
        $("#btnBuscarCliente").prop('disabled', true);
        $("#btnBuscarCliente").removeClass('btn-danger');
        $("#btnBuscarCliente").removeClass('mdi-cancel');
        $("#btnBuscarCliente").addClass('mdi-account-search');
        $("#btnBuscarCliente").addClass('btn-outline-secondary');
        $('#consultaCliente').val('');
        $('#tablaDatoCliente').html('');
    });

    $('.limpiarCliente').click(function() {
        console.log('limpiar');
        $('#consultaCliente').val('');
        $('#tablaDatoCliente').html('');
    });

    //form de agregar producto a la venta
    $("#addproductoventa").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr("action");
        var data = form.serialize();

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(data) {
                const res = JSON.parse(data);
                if (res == "ok") {
                    cargarProductos();
                    $.toast({
                        heading: "Producto agregado",
                        text: "Se ha registrado correctamente",
                        position: "top-right",
                        showHideTransition: 'plain',
                        loaderBg: "#0acf97",
                        icon: 'success',
                        hideAfter: 3500,
                        stack: 6
                    });
                    form.trigger("reset");
                }
                // console.log(data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

});
cargarProductos();

function cargarProductos() {
    $.ajax({
        type: "GET",
        url: "nuevaVenta/listarProductos",
        success: function(data) {
            const res = JSON.parse(data);
            let subtotal = 0;
            let total = 0;
            let impuestototal = 0;
            var html = '';
            res.forEach(row => {
                //añadir las filas a la tabla
                html += '<tr>';
                html += '<td>';
                // html += '<img src="resource/image/imgproductos/'+row.prd_imagen+'" alt="product-img" title="product-img" class="rounded me-3" height="64">';
                html += '<p class="m-0 d-inline-block align-middle font-16">';
                html += '<a class="text-body">' + row.prd_nombre + '</a>';
                html += "<br>";
                html += '<small class="me-2"><b>Catg:</b>' + row.cat_nombre + '</small>';
                html += '<small><b>Codigo:</b>' + row.prd_codigo + '</small>';
                html += "</p>";
                html += "</td>";
                html += '<td><input type="number" min="1" value="' + row.det_prec_prod + '" class="form-control" placeholder="Qty" style="width: 90px;"></td>';
                html += '<td><input type="number" min="1" value="' + row.det_cantidad + '" class="form-control" placeholder="Qty" style="width: 90px;"></td>';
                html += "<td>" + parseFloat(row.det_prec_total * 0.18).toFixed(2) + "</td>";
                impuestototal += row.det_prec_total * 0.18;
                html += "<td>" + parseFloat(row.det_prec_total - row.det_prec_total * 0.18).toFixed(2) + "</td>";
                subtotal += row.det_prec_total - row.det_prec_total * 0.18;
                html += "<td>" + parseFloat(row.det_prec_total).toFixed(2) + "</td>";
                total += row.det_prec_total;
                html += '<td><a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a></td>';
                html += "</tr>";
            });
            $("#detalleProductos").html(html);
            impuestototal = parseFloat(impuestototal).toFixed(2);
            $("#impuesto").html(impuestototal);
            subtotal = parseFloat(subtotal).toFixed(2);
            $("#subtotal").html(subtotal);
            // total = impuestototal + subtotal;
            total = parseFloat(total).toFixed(2);
            $("#total").html(total);
        },
        error: function(data) {
            //console.log(data);
        }
    });
}

function calcularPrecio(e) {
    e.preventDefault();
    const cantidad = $("#cantidadproducto").val();
    const precio = $("#precioproducto").val();
    const total = cantidad * precio;
    console.log(total);
}