import $ from "jquery";
require('datatables.net-bs4');


$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    let table = $('#dg-table').DataTable();

    $('.delete').on('click', function (event) {
        event.preventDefault();
        let button = $(this);
        let form = button.closest('form');
        $.ajax({
            type: 'DELETE',
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                console.log(response);
                table.draw(true);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});
