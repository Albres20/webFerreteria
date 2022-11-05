$(document).ready(function() {
    "use strict";
    $("#categories-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            info: "Mostrando categorías _START_ al _END_ de _TOTAL_",
            lengthMenu: 'Mostrar <select class="form-select form-select-sm ms-1 me-1"><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> categorías'
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

    $('#modalAgregarCategoria').on('show.bs.modal', function (evnt) {
        var valueBottom = $(evnt.relatedTarget).val();

        //nueva categoria
        if (valueBottom == 'btnNuevo') {
            console.log(valueBottom);
            $("#formnewcatg").trigger("reset");
            $("#formnewcatg").attr("action", "categorias/newCategorias");
            if (document.getElementsByClassName("bg-primary")) {
                $(".modal-header").removeClass("bg-primary");
                $(".btnGuardar").removeClass("btn-primary");
            }
            $(".modal-header").addClass("bg-danger");
            $(".btnGuardar").addClass("btn-danger");
            $(".modal-title").text("Nueva Categoria");
        }
    });
});

function editarCategoria(id) {
    console.log(id);
    $("#formnewcatg").trigger("reset");
    $("#formnewcatg").attr("action", "categorias/updateCategoria/"+id);
    //capturar la primera fila para editar o borrar el registro
    var fila = $("#fila-" + id).closest("tr");
    //console.log(fila);
    var categorias_nombre = fila.find("td").eq(2).text();
    var categorias_color = fila.find("td").find(".progress-sm").attr("data-color");

    $("#validationTooltip02").val(categorias_nombre);
    $("#example-color").val(categorias_color);

    if (document.getElementsByClassName("bg-danger")) {
        $(".modal-header").removeClass("bg-danger");
        $(".btnGuardar").removeClass("btn-danger");
    }
    $(".modal-header").addClass("bg-primary");
    $(".btnGuardar").addClass("btn-primary");
    $(".modal-title").text("Editar Categoria");
    $("#modalAgregarCategoria").modal("show");
}

function eliminarCategoria(id) {
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
            var url = "http://localhost:8080/webFerreteria/";
            location.href = url + "categorias/delete/" + id;
            /*$.post("usuarios/delete/"+id, function (status) {
                location.reload();
            });*/
        }
    })
}