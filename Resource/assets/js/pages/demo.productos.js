$(document).ready(function() {
    "use strict";
    $("#products-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            info: "Mostrando productos _START_ al _END_ de _TOTAL_",
            lengthMenu: 'Mostrar <select class=\'form-select form-select-sm ms-1 me-1\'><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> productos'
        },
        pageLength: 5,
        select: { style: "multi" },
        order: [
            [1, "asc"]
        ],
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded"), $("#products-datatable_length label").addClass("form-label")
        }
    });

    $('#modalCRUD').on('show.bs.modal', function (evnt) {
        var valueBottom = $(evnt.relatedTarget).val();

        //nuevo producto
        if (valueBottom == 'btnNuevoProd') {
            console.log(valueBottom);
            $("#formproduct").trigger("reset");
            $("#formproduct").attr("action", "productos/newProductos");

            if (document.getElementsByClassName("bg-primary")) {
                $(".modal-header").removeClass("bg-primary");
                $(".btnGuardar").removeClass("btn-primary");
            }
            $(".modal-header").addClass("bg-danger");
            $(".btnGuardar").addClass("btn-danger");
            $(".modal-title").text("Nuevo Producto");
        }
    });
});

//editar producto
function editarProducto(id) {
    console.log(id);
    $("#formproduct").trigger("reset");
    $("#formproduct").attr("action", "productos/updateProductos/"+id);
    //capturar la primera fila para editar o borrar el registro
    var fila = $("#fila-" + id).closest("tr");
    //console.log(fila);
    var codigo = fila.find("td").eq(1).text();
    var imagen = fila.find("td").eq(2).find("img").attr("src");
    //acortar direccion de imagen
    var imagen = imagen.substring(31);
    console.log(imagen);
    var nombre = fila.find("td").eq(2).text();
    //quitar los espacios en blanco de nombre
    var nombre = nombre.trim();
    var marca = fila.find("td").eq(3).text();
    var categoria = fila.find("td").eq(6).text();
    //console.log(categoria);
    var preciocompra = fila.find("td").eq().text();
    var ganancia = fila.find("td").eq().text();
    var precioventa = fila.find("td").eq(4).text();
    var stock = fila.find("td").eq(5).text();

    $("#codigopd").val(codigo);
    $("#nombre").val(nombre);
    $("#imagePreview").attr("src", imagen);
    $("#marca").val(marca);
    $("#categoria").val(categoria);
    $("#buying_price").val(preciocompra);
    $("#profit").val(ganancia);
    $("#selling_price").val(precioventa);
    $("#stock").val(stock);
    

    //$(".modal-header").removeclass("bg-danger");
    if (document.getElementsByClassName("bg-danger")) {
        $(".modal-header").removeClass("bg-danger");
        $(".btnGuardar").removeClass("btn-danger");
    }
    $(".modal-header").addClass("bg-primary");
    $(".btnGuardar").addClass("btn-primary");
    $(".modal-title").text("Editar Producto");
    $("#modalCRUD").modal("show");
}

//eliminar producto
function eliminarProducto(id) {
    console.log(id);
    Swal.fire({
        title: '¿Está seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, borrarlo!',
        cancelButtonText: '¡No, cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            var url = "http://localhost/webFerreteria/";
            location.href = url + "productos/delete/" + id;
            /*$.post("usuarios/delete/"+id, function (status) {
                location.reload();
            });*/
        }
    })
}