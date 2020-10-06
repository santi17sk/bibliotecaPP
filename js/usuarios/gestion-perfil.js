(function(){
    const formulario = document.querySelector('#formularioGestion');
    // const resultado = document.querySelector('#resultado');

    document.addEventListener('DOMContentLoaded', () => {
        formulario.addEventListener('submit', validarFormulario);
    });

    function validarFormulario(e){
        e.preventDefault();
        
        const idUsuario = document.querySelector('#idUsuario').value;
        const nombre = document.querySelector('#nombre').value;
        const email = document.querySelector('#email').value;
        const passwordOld = document.querySelector('#passwordOld').value;
        const passwordNew = document.querySelector('#passwordNew').value;

        const objUsuario = {
            idUsuario,
            nombre,
            email,
            passwordOld,
            passwordNew
        };
        
        actualizarUsuario(objUsuario);
    }

    function actualizarUsuario(usuario){
        const {idUsuario, nombre, email, passwordOld, passwordNew} = usuario;

        const xmlhttp = new XMLHttpRequest();

        xmlhttp.open('POST', '/biblioteca/consultasAjax/peticionesUsuarios/update.php', true);
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState == 4){
                // resultado.textContent = xmlhttp.responseText;
                
            }
        };

        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlhttp.send(`idUsuario=${idUsuario}&nombre=${nombre}&email=${email}&passwordOld=${passwordOld}&passwordNew=${passwordNew}`);
    }
})();