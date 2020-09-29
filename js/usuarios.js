$(document).ready(function () {
    function UpDelUsuario(id, accion) {
        $.ajax({
            url: "http://localhost/biblioteca/consultasAjax/peticionesUsuarios/deleteusuarios.php",
            type: "POST",
            data: { id: id, accion: accion },
        }).done(function (retorno) {
            $("#accion" + id).html(retorno);
        });
    }

    $('.tabla__contenedor').on('click', '.acciones button', function () {
        var id = $(this).attr('id');
        UpDelUsuario(id);
    })
});