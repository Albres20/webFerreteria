$(document).ready(function() {
    $('#listaProductoCompra').hide();
    $("#buscarProductoCompra").keyup(function() {
        var busqueda = $(this).val();
        //var listaproductos = 'busqueda=' + busqueda;
        if (busqueda != '') {
            $.ajax({
                type: "POST",
                url: "resource/php/busquedaprodajax.php",
                data: {
                    search: busqueda
                },
                success: function(data) {
                    $("#listaProductoCompra").html(data).show();
                }
            });
        } else {
            $("#listaProductoCompra").hide();
            $("#listaProductoCompra").html('');
        }
    });
});