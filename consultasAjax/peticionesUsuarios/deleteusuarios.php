<?php
require_once '../../libs/conexion.php';
require_once '../../libs/funciones.php';
?>

<?php
if (!empty($_REQUEST['id'])) {
    $sqlEstado = "SELECT Estado from  biblioteca.usuarios WHERE Id_Usuario = $_REQUEST[id]";
    $estado = prepare_select($conexion, $sqlEstado);
    $estado = $estado->fetch_assoc();
    if ($estado['Estado'] == 1) {
        $sql = "UPDATE biblioteca.usuarios SET Estado = 0 WHERE Id_Usuario =  $_REQUEST[id]";
    } else {
        $sql = "UPDATE biblioteca.usuarios SET Estado = 1 WHERE Id_Usuario =  $_REQUEST[id]";
    }

    prepare_select($conexion, $sql);
}

$sqlUsuario = "SELECT Estado,Id_Usuario from  biblioteca.usuarios WHERE Id_Usuario =  $_REQUEST[id]";
$usuarios = prepare_select($conexion, $sqlUsuario);
$usuario = $usuarios->fetch_assoc();
?>

<?php if ($usuario['Estado'] == 1) : ?>
    <button class="btn btn-red" id="<?= $usuario['Id_Usuario'] ?>">Eliminar</button>
<?php else : ?>
    <button class="btn btn-yellow" id="<?= $usuario['Id_Usuario'] ?>">Recuperar</button>
<?php endif; ?>