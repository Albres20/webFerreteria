$(document).ready(function() {
    $('#listaProductoCompra').hide();
    $("#buscarProductoCompra").keyup(function() {
        var busqueda = $(this).val();
        //var listaproductos = 'busqueda=' + busqueda;
        if (busqueda != '') {
            $.ajax({
                type: "POST",
                url: "resource/php/busquedaprodajax.php",
                data: 'search=' + busqueda,
                beforesend: function() {
                    $('#listaProductoCompra').show();
                    $('#listaProductoCompra').html('<div class="spinner-border text-danger" role="status"></div>');
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

function selectCountry(val) {
    $("#buscarProductoCompra").val(val);
    $("#listaProductoCompra").hide();
}