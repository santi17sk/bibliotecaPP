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

$sqlUsuario = "SELECT * from  biblioteca.usuarios";
$usuarios = prepare_select($conexion, $sqlUsuario);
?>
<table class="tabla__contenedor">
    <thead>
        <tr>
            <th colspan="6" class="padding__1">USUARIOS</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table__header">
            <td>ID</td>
            <td>Nick</td>
            <td>Nombre</td>
            <td>DNI</td>
            <td>Email</td>
            <td>Acciones</td>
        </tr>
        <?php if ($usuarios->num_rows > 0) : ?>
            <?php while ($usuario = $usuarios->fetch_assoc()) : ?>
                <tr>

                    <td><?= $usuario['Id_Usuario'] ?></td>
                    <td><?= $usuario['Nick'] ?></td>
                    <td><?= $usuario['Nombre'] ?></td>
                    <td><?= $usuario['Dni'] ?></td>
                    <td><?= $usuario['Email'] ?></td>
                    <td class="acciones" id="acciones">
                        <?php if ($usuario['Estado'] == 1) : ?>
                            <button class="btn btn-red" id="<?= $usuario['Id_Usuario'] ?>">Eliminar</button>

                        <?php else : ?>

                            <button class="btn btn-yellow" id="<?= $usuario['Id_Usuario'] ?>">Recuperar</button>
                        <?php endif; ?>
                    </td>

                </tr>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="alert_red">Todavía no hay usuarios registrados :(</div>
        <?php endif; ?>
    </tbody>

</table>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="http://localhost/biblioteca/js/usuarios.js"></script>