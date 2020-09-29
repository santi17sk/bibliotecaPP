<?php
require_once '../libs/header.php';

if (isset($_SESSION['User']) && $_SESSION['User']['Rol'] == 'admin') {
    $sql = "SELECT l.*, i.nombre FROM libros l INNER JOIN imagenes i ON l.id_imagen = i.id_imagen";

    $libros = prepare_select($conexion, $sql);
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
            <div class="bar__libros">
                <button class="btn btn__enviar"><a href="/biblioteca/libros/create.php">Agregar</a></button>
                <input type="search" name="" id="" placeholder="Buscar">
            </div>
            <main class="contenedor">
                <h2>Control de Libros</h2>
                <div class="contenido__principal">
                <?php if($libros->num_rows > 0): ?>
                    <?php while($libro = $libros->fetch_assoc()): ?>
                    <div class="libro">
                        <div class="imagen">
                            <img src="/biblioteca/libros/img/<?=$libro['nombre']?>" alt="Imagen de LIbro" style="height: 30rem;">
                        </div>
                        <div class="titulo">
                            <a href=<?="update.php?idLibro=$libro[id_libro]"?> style="color: #000;"><h3><?=$libro['titulo']?></h3></a>
                        </div>
                        <div class="descripcion">
                        <p><?=$libro['descripcion']?></p>
                </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </main>
            
        </div>
    </div>

</div>

<?php require_once '../libs/footer.php'; ?>