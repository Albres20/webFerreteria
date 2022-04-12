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
});