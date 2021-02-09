import $ from "jquery";
require('datatables.net-bs4');


$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#dg-table').dataTable();
});
