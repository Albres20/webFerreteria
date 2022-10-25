$(document).ready(function () {
    "use strict";
    $("#users-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            info: "Mostrando usuarios _START_ al _END_ de _TOTAL_",
            lengthMenu: 'Mostrar <select class=\'form-select form-select-sm ms-1 me-1\'><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> usuarios'
        },
        pageLength: 5,
        select: { style: "multi" },
        order: [
            [1, "asc"]
        ],
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded"), $("#products-datatable_length label").addClass("form-label")
        }
    });

    //nuevo usuario
    $('#modalCRUD').on('show.bs.modal', function (evnt) {
        var valueBottom = $(evnt.relatedTarget).val();

        //nuevo usuario
        if (valueBottom == 'btnNuevo') {
            console.log(valueBottom);
            $("#formuser").trigger("reset");
            $("#formuser").attr("action", "usuarios/newUsuarios");
            $("#validationTooltip01").prop("disabled", false);
            $(".passw").show();
            if (document.getElementsByClassName("bg-primary")) {
                $(".modal-header").removeClass("bg-primary");
                $(".btnGuardar").removeClass("btn-primary");
            }
            $(".modal-header").addClass("bg-danger");
            $(".btnGuardar").addClass("btn-danger");
            $(".modal-title").text("Nuevo Usuario");
        }

        //editar usuario
        else if (valueBottom == 'btnEditar') {
            console.log(valueBottom);
            $("#formuser").attr("action", "usuarios/updateUsuario");
            // fila = $(this).closest("tr"); //capturar la fila para editar o borrar el registro
            // var id = parseInt($(this).closest("tr").find('td:eq(1)').text());
            // console.log(id);
            //var username = fila.find("td").eq(2).text();
            // var username = $(this).closest("tr").find('td:eq(2)').text();
            // var fullname = $(this).closest("tr").find('td:eq(3)').text();
            // var email = $(this).closest("tr").find('td:eq(4)').text();
            // var acceso = $(this).closest("tr").find('td:eq(5)').text();
            // var estado = $(this).closest("tr").find('td:eq(6)').text();

            // $("#validationTooltipUsername").val(username);
            // $("#validationTooltip01").prop("disabled", true);
            // $(".passw").hide();
            // $("#validationTooltip02").val(fullname);
            // $("#validationTooltip03").val(email);
            // $("#validationTooltip04").val(acceso);
            // $("#validationTooltip05").val(estado);
            //opcion = 2; //editar
            //$(".modal-header").removeclass("bg-danger");
            if (document.getElementsByClassName("bg-danger")) {
                $(".modal-header").removeClass("bg-danger");
                $(".btnGuardar").removeClass("btn-danger");
            }
            $(".modal-header").addClass("bg-primary");
            $(".btnGuardar").addClass("btn-primary");
            $(".modal-title").text("Editar Usuario");
            //$("#modalCRUD").modal("show")
        }
    });
});