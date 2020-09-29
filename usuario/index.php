<?php
require_once '../libs/header.php';


$sql = "SELECT * FROM usuarios";

$usuarios = prepare_select($conexion, $sql);
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


            <main class="contenedor inicio" id="tablaUsuarios">


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
                                    <td class="acciones" id="<?="accion$usuario[Id_Usuario]"?>">
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
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
                    <script src="http://localhost/biblioteca/js/usuarios.js"></script>
                </table>
            </main>


        </div>
    </div>

</div>



<!-- FINAL -->

<?php require_once '../libs/footer.php'; ?>