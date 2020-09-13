<?php
require_once '../libs/header.php';

if (isset($_SESSION['User']) && $_SESSION['User']['Rol'] == 'admin') {
    $sql = "SELECT * FROM categorias";

    $categorias = prepare_select($conexion, $sql);
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

                <h2>AGREGAR CATEGORIA</h2>
                <form action="create.php" method="POST" class="flex-center">
                    <div class="elemento">
                        <label for="nombre__cat" class="fw__700">Nombre: </label>
                        <input type="text" name="nombre__cat" placeholder="Añade una categoria" class="no__margin">
                    </div>
                    <div class="btn__categoria">
                        <input type="submit" value="Guardar">
                    </div>
                </form>
                <table class="tabla__contenedor">
                    <thead>
                        <tr>
                            <th colspan="6" class="padding__1">CATEGORIAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table__header">
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Acciones</td>
                        </tr>
                        <tr>
                            <?php if ($categorias->num_rows > 0) : ?>
                                <?php while ($categoria = $categorias->fetch_assoc()) : ?>
                        <tr>

                            <td><?= $categoria['id_categoria'] ?></td>
                            <td><?= $categoria['nombre'] ?></td>
                            <td class="">
                                <!-- <a href="" class="btn btn__modificar columnas-6-1">Modificar</a> -->
                                <a href="/biblioteca/categorias/delete.php?idCategoria=<?=$categoria['id_categoria']?>" class="btn btn-red margin__auto">Eliminar</a>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="alert_red">Todavía no hay usuarios registrados :(</div>
                <?php endif; ?>
                </tr>
                    </tbody>

                </table>
            </main>


        </div>
    </div>

</div>


<!-- FINAL -->

<?php require_once '../libs/footer.php'; ?>