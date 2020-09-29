$(document).ready(function () {
    // console.log('Estamos Listos');
    function buscar(elemento = "") {
        $.ajax({
            url: "http://localhost/biblioteca/consultasAjax/peticionesLibros/readLibros.php",
            type: "POST",
            data: { titulo: elemento },
        }).done(function (retorno) {
            $("#LibrosGridIndex").html(retorno);
        });
    }
    buscar();
    var buscador = $("#buscadorLibros");
    buscador.keyup(function () {
        var palabra = $(this).val();
        if (palabra != "") {
            buscar(palabra);
        } else {
            buscar(palabra);
        }
    });
});
