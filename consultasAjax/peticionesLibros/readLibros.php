<?php
require_once '../../libs/conexion.php';
require_once '../../libs/funciones.php';
?>

<?php
if ($_REQUEST['titulo']) {
    $titulo = $_REQUEST['titulo'];
    $sql = "SELECT libros.* , imagenes.nombre FROM biblioteca.libros inner join biblioteca.imagenes where libros.id_imagen=imagenes.id_imagen and titulo like '%" . $titulo . "%'";
    $encabezado = "Coincidencias con '$titulo'";
} else {
    $sql = "SELECT libros.* , imagenes.nombre FROM biblioteca.libros inner join biblioteca.imagenes where libros.id_imagen=imagenes.id_imagen;";
    $encabezado = 'Libros Populares';
}

$libros = prepare_select($conexion, $sql);
?>
<?php if ($libros->num_rows > 0) : ?>
    <h2><?= $encabezado ?></h2>
    <div class="contenido__principal">
    <?php while ($libro = $libros->fetch_assoc()) : ?>
       
            <div class="libro">
                <div class="imagen">
                    <img src="libros/img/<?= $libro['nombre'] ?>" alt="Imagen de LIbro">
                </div>
                <div class="titulo">
                    <h3><?= $libro['titulo'] ?></h3>
                </div>
                <div class="descripcion">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, magni eligendi pariatur inventore quas consectetur labore reprehenderit assumenda harum, natus similique eum exercitationem ad quos facilis rerum voluptate est excepturi?</p>
                </div>
            </div>
    <?php endwhile ?>
    </div>
<?php else : ?>
    <h2><?= 'No se an encontrado coincidencias' . $encabezado ?></h2>
<?php endif ?>