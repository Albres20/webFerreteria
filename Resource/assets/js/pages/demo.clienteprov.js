$(document).ready(function () {
    "use strict";
    $("#clienteproveedor-datatable").DataTable({
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            },
            info: "Mostrando clientes / proveedores _START_ al _END_ de _TOTAL_",
            lengthMenu: 'Mostrar <select class=\'form-select form-select-sm ms-1 me-1\'><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> clientes / proveedores',
        },
        pageLength: 5,
        select: { style: "multi" },
        order: [
            [1, "asc"]
        ],
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded"), $("#clienteproveedor-datatable_length label").addClass("form-label")
        }
    });

    $('#modalCliente').on('show.bs.modal', function (evnt) {
        var valueBottom = $(evnt.relatedTarget).val();

        //nuevo cliente
        if (valueBottom == 'btnNuevocl') {
            console.log(valueBottom);
            $("#formnewclienteprov").trigger("reset");
            $("#formnewclienteprov").attr("action", "clienteProveedor/newClienteProveedor");

            if (document.getElementsByClassName("bg-primary")) {
                $(".modal-header").removeClass("bg-primary");
                $(".btnGuardar").removeClass("btn-primary");
                $(".btn-sm").removeClass("btn-outline-primary");
            }
            $(".modal-header").addClass("bg-danger");
            $(".btnGuardar").addClass("btn-danger");
            $(".btn-sm").addClass("btn-outline-danger");
            $(".modal-title").text("Nuevo Cliente / Proveedor");
        }
    });
});

//funcion para editar cliente
function editarCliente(id) {
    console.log(id);
    $("#formnewclienteprov").trigger("reset");
    $("#formnewclienteprov").attr("action", "clienteProveedor/updateClienteProveedor/" + id);
    //capturar la primera fila para editar o borrar el registro
    var fila = $("#fila-" + id).closest("tr");

    var tipodoc = fila.find("td").eq(3).text();
    //capturar antes del guin del string
    var tipodoc = tipodoc.substring(0, tipodoc.indexOf("-") - 1);
    var numdoc = fila.find("td").eq(3).text();
    //capturar a partir del guion del string
    var numdoc = numdoc.substring(numdoc.indexOf("-") + 2);
    var nombrelegal = fila.find("td").eq(2).text();
    var direccion = fila.find("td").eq(5).text();
    direccion = direccion.trim(); //quitar espacios en blanco
    var tipo = fila.find("td").eq(4).text();
    console.log(tipodoc);
    console.log(numdoc);
    var telefono = fila.find("td").eq(6).text();
    telefono = telefono.trim(); //quitar espacios en blanco
    // var correo
    // var datosAdicionales
    // dar un value checked a todos los inputs type radio
    $('input:radio[name="cp_tipodocum"]').filter('[value="' + tipodoc + '"]').prop('checked', true);
    //si el tipodoc es DNI guardar en el input
    if (tipodoc == "DNI") {
        // $("#tipodoc").val(tipodoc);
        $("#cp_numdocumDNI").val(numdoc);
    }
    //si el tipodoc es RUC guardar en el input
    else if (tipodoc == "RUC") {
        // $("#tipodoc").val(tipodoc);
        $("#cp_numdocumRUC").val(numdoc);
    }
    $("#cp_nombrelegal").val(nombrelegal);
    $("#cp_direccion").val(direccion);
    $("#cp_tipo").val(tipo);
    $("#cp_telefono").val(telefono);

    //$(".modal-header").removeclass("bg-danger");
    if (document.getElementsByClassName("bg-danger")) {
        $(".modal-header").removeClass("bg-danger");
        $(".btnGuardar").removeClass("btn-danger");
        $(".btn-sm").removeClass("btn-outline-danger");
    }
    $(".modal-header").addClass("bg-primary");
    $(".btnGuardar").addClass("btn-primary");
    $(".btn-sm").addClass("btn-outline-primary");
    $(".modal-title").text("Editar Cliente / Proveedor");
    $("#modalCliente").modal("show");
}

//funcion para eliminar cliente
function eliminarCliente(id) {
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
            location.href = url + "clienteProveedor/delete/" + id;
        }
    })
}
