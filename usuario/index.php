<?php
require_once '../libs/header.php';

if (isset($_SESSION['User']) && $_SESSION['User']['Rol'] == 'admin') {
    $sql = "SELECT * FROM usuarios";

    $usuarios = prepare_select($conexion, $sql);
} else {
    header('Location: /biblioteca/acceso/login.php');
}

?>


<div class="flex">
    <div class="columnas-3 color__barra">
        <div class="bar__lateral">
            <h4>DASHBOARD</h4>
            <div class="con__lateral">
                <p><a href="/biblioteca/libros/index.php">Libros</a></p>
                <p><a href="/biblioteca/categorias/index.php">Categorias</a></p>
                <p><a href="/biblioteca/usuario/index.php">Usuarios</a></p>
            </div>
        </div>
    </div>
    <div class="columnas-9">
        <div class="contenido">


            <main class="contenedor">
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
                                    <td>
                                        <?php if ($usuario['Estado'] == 1) : ?>
                                            <a href="/biblioteca/usuario/delete.php?idUsuario=<?= $usuario['Id_Usuario'] ?>" class="btn btn-red">Eliminar</a>
                                        <?php else : ?>
                                            <a href="/biblioteca/usuario/recuperar.php?idUsuario=<?= $usuario['Id_Usuario'] ?>" class="btn btn-yellow">Recuperar</a>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert_red">Todavía no hay usuarios registrados :(</div>
                        <?php endif; ?>
                    </tbody>

                </table>
            </main>


        </div>
    </div>

</div>


<!-- FINAL -->

<?php require_once '../libs/footer.php'; ?>