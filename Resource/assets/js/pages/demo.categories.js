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
            $("#formnewuser").trigger("reset");
            $("#formnewuser").attr("action", "categorias/newCategorias");
            $("#validationTooltip02").prop("disabled", false);
            $(".passw").show();
            if (document.getElementsByClassName("bg-primary")) {
                $(".modal-header").removeClass("bg-primary");
                $(".btnGuardar").removeClass("btn-primary");
            }
            $(".modal-header").addClass("bg-danger");
            $(".btnGuardar").addClass("btn-danger");
            $(".modal-title").text("Nuevo Usuario");
        }
    });
});

function editarCategoria(id) {
    console.log(id);
    $("#formnewuser").trigger("reset");
    $("#formnewuser").attr("action", "categorias/newCategorias"+id);
    //capturar la primera fila para editar o borrar el registro
    var fila = $("#fila-" + id).closest("tr");
    //console.log(fila);
    var categorias_nombre = fila.find("td").eq(2).text();
    //quitar los espacios en blanco de username
    categorias_nombre = categorias_nombre.trim();
    var categorias_color = fila.find("td").eq(3).text();
    //estado = estado.trim();
    //console.log(estado);
    //$("#validationTooltipUsername").val(username);
    //$("#validationTooltipUsername").prop("disabled", true);
    //$("#validationTooltip01").prop("disabled", true);
    $(".passw").hide();
    $("#validationTooltip02").val(categorias_nombre);

    //$(".modal-header").removeclass("bg-danger");
    if (document.getElementsByClassName("bg-danger")) {
        $(".modal-header").removeClass("bg-danger");
        $(".btnGuardar").removeClass("btn-danger");
    }
    $(".modal-header").addClass("bg-primary");
    $(".btnGuardar").addClass("btn-primary");
    $(".modal-title").text("Editar Usuario");
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
            var url = "http://localhost/webFerreteria/";
            location.href = url + "categorias/delete/" + id;
            /*$.post("usuarios/delete/"+id, function (status) {
                location.reload();
            });*/
        }
    })
}