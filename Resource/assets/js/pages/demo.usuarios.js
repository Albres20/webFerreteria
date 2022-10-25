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
    });
});

function editarUsuario(id) {
    console.log(id);
    $("#formuser").trigger("reset");
    $("#formuser").attr("action", "usuarios/updateUsuario/"+id);
    //capturar la primera fila para editar o borrar el registro
    var fila = $("#fila-" + id).closest("tr");
    //console.log(fila);
    var username = fila.find("td").eq(2).text();
    //quitar los espacios en blanco de username
    username = username.trim();
    var fullname = fila.find("td").eq(3).text();
    var email = fila.find("td").eq(4).text();
    var acceso = fila.find("td").eq(5).text();
    var estado = fila.find("td").eq(6).text();
    estado = estado.trim();
    console.log(estado);
    $("#validationTooltipUsername").val(username);
    //$("#validationTooltipUsername").prop("disabled", true);
    $("#validationTooltip01").prop("disabled", true);
    $(".passw").hide();
    $("#validationTooltip02").val(fullname);
    $("#validationTooltip03").val(email);
    $("#validationTooltip04").val(acceso);
    if(estado == "Activo"){
        $("#validationTooltip05").val(1);
    }else{
        $("#validationTooltip05").val(0);
    }
    //$(".modal-header").removeclass("bg-danger");
    if (document.getElementsByClassName("bg-danger")) {
        $(".modal-header").removeClass("bg-danger");
        $(".btnGuardar").removeClass("btn-danger");
    }
    $(".modal-header").addClass("bg-primary");
    $(".btnGuardar").addClass("btn-primary");
    $(".modal-title").text("Editar Usuario");
    $("#modalCRUD").modal("show");
}

function eliminarUsuario(id) {
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
            location.href = url + "usuarios/delete/" + id;
            /*$.post("usuarios/delete/"+id, function (status) {
                location.reload();
            });*/
        }
    })
}