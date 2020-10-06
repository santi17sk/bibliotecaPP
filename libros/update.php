<?php
require_once '../libs/header.php';

if (isset($_SESSION['User']) && $_SESSION['User']['Rol'] == 'admin' and !empty($_REQUEST['idLibro'])) {
    $sql = "SELECT l.*, i.nombre FROM libros l INNER JOIN imagenes i ON l.id_imagen = i.id_imagen and id_libro = $_REQUEST[idLibro]";

    $libros = prepare_select($conexion, $sql);
    $libro = $libros->fetch_assoc();
}

if (!empty($_REQUEST['guardar'])) {
    if (!empty($_REQUEST['descripcion']) and !empty($_REQUEST['titulo'])) {
        $sqlLibro = "UPDATE biblioteca.libros SET titulo = $_REQUEST[titulo], descripcion = $_REQUEST[descripcion] WHERE id_libro = $_REQUEST[id]";
        $acatualiza = prepare_select($conexion,$sqlLibro);
    }
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
                <h2 style="text-align: center;">Editar Libro</h2>
                <div class="editarLibro">
                    <form action="update.php" method="post">
                        <div class="libro" style="padding: 1rem;">
                            <div class="imagen">
                                <img src="/biblioteca/libros/img/<?= $libro['nombre'] ?>" alt="Imagen de LIbro">
                            </div>
                            <input type="hidden" name="id" value="<?=$libro['id_libro']?>">
                            <div class="grupfomr" style="margin-bottom: 1rem;">
                                <div class="titulo">
                                    <label for="titulo">titulo</label>
                                    <input style="margin: 0;" type="text" value="<?= $libro['titulo'] ?>" id="titulo" name="titulo">
                                </div>
                            </div>
                            <div class="descripcion">
                                <label">Descipcion</label>
                                    <textarea id="desc" name="descripcion"><?= $libro['descripcion'] ?></textarea>
                            </div>
                            <input type="submit" class="btn btn__enviar" value="Guardar" style="margin: 1rem auto;" name="guardar">
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

</div>

<?php require_once '../libs/footer.php'; ?>