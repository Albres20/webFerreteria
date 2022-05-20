$(document).ready(function() {
    "use strict";
    $("#users-datatable").DataTable({
        columnDefs: [{
            targets: -1,
            data: null,
            defaultContent: "<button type='button' class='action-icon' title='Actualizar usuario' data-bs-toggle='modal' data-bs-target='#modalCRUD' value='btnEditar' style='border-width: 0px; background-color: transparent;'> <i class='mdi mdi-square-edit-outline'></i></button> <a role='button' title='Eliminar usuario' class='action-icon btnBorrar'> <i class='mdi mdi-delete'></i></a>"
        }],
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            info: "Mostrando usuarios _START_ al _END_ de _TOTAL_",
            lengthMenu: 'Mostrar <select class=\'form-select form-select-sm ms-1 me-1\'><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> usuarios'
        },
        pageLength: 5,
        columns: [{ orderable: !1, targets: 0, render: function(e, l, a, o) { return "Mostrar" === l && (e = '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes"><label class="form-check-label">&nbsp;</label></div>'), e }, checkboxes: { selectRow: !0, selectAllRender: '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes"><label class="form-check-label">&nbsp;</label></div>' } }, { orderable: !0 }, { orderable: !0 }, { orderable: !0 }, { orderable: !0 }, { orderable: !0 }, { orderable: !0 }, { orderable: !1 }],
        select: { style: "multi" },
        order: [
            [1, "asc"]
        ],
        drawCallback: function() { $(".dataTables_paginate > .pagination").addClass("pagination-rounded"), $("#products-datatable_length label").addClass("form-label") }
    });
    var fila; //capturar la fila para editar o borrar el registro
    var opcion; //capturar la opcion para editar o borrar el registro
    //nuevo usuario
    $('#modalCRUD').on('show.bs.modal', function(evnt) {
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
            fila = $(this) //capturar la fila para editar o borrar el registro
            var id = fila.find("td:eq(1)").text();
            console.log(id);
            //var id = fila.find("td").eq(1).text();
            //var username = fila.find("td").eq(2).text();
            var username = fila.find('td:eq(2)').text();
            console.log(username);
            // fullname = fila.find('td:eq(3)').text();
            // email = fila.find('td:eq(4)').text();
            // acceso = fila.find('td:eq(5)').text();
            // estado = fila.find('td:eq(6)').text();

            $("#validationTooltipUsername").val(username);
            $("#validationTooltip01").prop("disabled", true);
            $(".passw").hide();
            // $("#validationTooltip02").val(fullname);
            // $("#validationTooltip03").val(email);
            // $("#validationTooltip04").val(acceso);
            // $("#validationTooltip05").val(estado);
            opcion = 2; //editar
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
    //borrar usuario
    $(document).on("click", ".btnBorrar", function() {
        //console.log(valueBottom);
        fila = $(this);
        var id = parseInt($(this).closest("tr").find('td:eq(1)').text());
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
                $("#formuser").attr("action", "usuarios/delete/" + id);
            }
        })
    })
});