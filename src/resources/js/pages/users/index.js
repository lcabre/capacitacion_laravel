import $ from "jquery";
require('datatables.net-bs4');


$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * Datatables generado en frontend
     */
    // $('#tabla').dataTable();

    /**
     * Ejemplo de borrado con plugin larave-datables
     */
    let table = LaravelDataTables['users-table'];

    $(document).on('click','.delete', function () {
        let button = $(this);
        let form = button.closest('form');

        $.ajax({
            type: 'DELETE',
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                table
                    .row( button.closest('tr') )
                    .remove()
                    .draw();

            },
            error: function (error) {
                console.log(error);
            }
        });
    });

});