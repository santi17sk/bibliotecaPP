$(document).ready(function () {

    var botonAgregar = $('#agregarCategoria');
    botonAgregar.click(function () {
        var categoria = $('#nombreCategoria').val();
        if (categoria == "") {
            alert('Porfavor escriba una categoria');
        } else {
            $.ajax({
                type: "POST",
                url: "http://localhost/biblioteca/consultasAjax/peticionesCategoras/createDeleteCategorias.php",
                data: { nombreCategoria: categoria }
            }).done(function (retorno) {
                $('#cuerpoTablaCategorias').append(retorno);
            });
        }
    });


    $('.tabla__contenedor').on('click', '.acciones button', function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "http://localhost/biblioteca/consultasAjax/peticionesCategoras/createDeleteCategorias.php",
            data: { idEliminar: id }
        }).done(function () {
            $('#' + id).parent().parent().hide();
        });
    })
});
