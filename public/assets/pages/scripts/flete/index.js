$(document).ready(function () {
    $('.flete_llegada').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val(),
            _method: 'put'
        }
        ajaxRequest(data, url, $(this));
    });

    $('.ver-gondola').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val()
        }
        ajaxRequest(data, url, 'verGondola');
    });

    function ajaxRequest(data, url, link) {
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (respuesta) {
                const fecha = respuesta.fecha_llegada;
                link.closest('tr').find('td.fecha-llegada').text(fecha);
                link.remove();

                 if (funcion == 'verGondola') {
                $('#modal-ver-gondola .modal-body').html(respuesta)
                $('#modal-ver-gondola').modal('show');
                }
            },
            error: function () {

            }
        });
    }
   
});
