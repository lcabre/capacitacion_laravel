import $ from "jquery";
require('datatables.net-bs4');


$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    /**
     * Ejemplo de borrado con plugin larave-datables
     */
    let table = LaravelDataTables['proyects-table'];

    $(document).on('click','.delete', function () {
        let button = $(this);
        let form = button.closest('form');
        $.ajax({
            type: 'DELETE',
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                console.log(response);
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
