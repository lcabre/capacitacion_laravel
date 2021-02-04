import $ from "jquery";

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let boton = $('#enviar');

    //Bindeo de evento click sobre el boton
    boton.on('click',function (event) {
        let form = $('#pepe');

        console.log(form.attr('action'));
        console.log(form.serialize());

        $.ajax({
            method: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            success: function (response) {
                console.log("todo bien");
                console.log(response);
            },
            error: function (error) {
                console.log("todo mal");
                console.log(error);
                $('.container.pepe').addClass('pepe2');
                $('.container.pepe').removeClass('pepe2');
                $('.container.pepe').fadeOut();
                $('.container.pepe').hide();
                $('.container.pepe').show();

                let nuevadiv = $('<div class="alert-danger">agregada</div>');
                $('.pepe').append(nuevadiv);

                console.log($('.navbar').find('button.navbar-toggler'));
                console.log($('button.navbar-toggler').closest('#app'));
            }
        });

    });

    let name = $('input[name="email"]');

    name.on('keyup', function (event) {
        console.log($(this).val());
        $('#imprimir_texto').text($(this).val());
    })

    $('.delete').on('click',function (event) {
        console.log($(this).closest('tr').data('id'));
    });
});