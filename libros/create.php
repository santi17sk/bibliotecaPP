<?php
require_once '../libs/header.php';

if(!empty($_POST['nombre']) && !empty($_FILES['fileimagen']) && !empty($_POST['autor']) && 
    !empty($_POST['categoria']) && !empty($_POST['formato']) && !empty($_POST['estado']) && !empty($_POST['descripcion'])){
    $filename = $_FILES['fileimagen']['name'];
    $filetype = $_FILES['fileimagen']['type'];
    $path = $_SERVER['DOCUMENT_ROOT'].'/biblioteca/libros/img';//asi en algunas pc
    //$path = $_SERVER['DOCUMENT_ROOT'].'biblioteca/libros/img';//asi en otras pc

    move_uploaded_file($_FILES['fileimagen']['tmp_name'], $path .'/'. $filename);

    $categoria = $_POST['categoria'];
    $formato = $_POST['formato'];
    $estado = $_POST['estado'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO imagenes (nombre, path, principal) VALUES (?,?,1)";
    $save = prepare_query($conexion, $sql, [$filename, $path]);
    if($save->error){
        echo 'ocurrio un error';
    }else{
        $idImagen = $save->insert_id;
        $sql = "INSERT INTO libros (titulo, descripcion, autor, id_categoria, id_estado, id_imagen, id_formato) VALUES (?,?,?,?,?,?,?)";
        $save = prepare_query($conexion, $sql, [$nombre, $descripcion, $autor, $categoria, $estado, $idImagen, $formato]);
        if($save->error){
            echo 'Error al guardar libro';
        }else{
            header('Location: index.php');
        }

    }
}

$sql = "SELECT * FROM categorias";
$categorias = prepare_select($conexion, $sql);

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
            <div class="contenedor">
                <main class="">
                    <h2 class="no__margin">Agregar Libro</h2>

                    <form action="create.php" class="formulario" method="POST" enctype="multipart/form-data">

                        <div class="campo">
                            <label for="nombre">Titulo:</label>
                            <input type="text" id="nombre" name="nombre" class="no__margin">
                        </div>
                        <div class="campo">
                            <label for="fileimagen">Seleccionar Imagen</label>
                            <input type="file" name="fileimagen" id="imagen__select">
                        </div>
                        <div class="campo">
                            <label for="autor">Autor:</label>
                            <input type="text" name="autor">
                        </div>
                        <div class="campo">
                            <label for="categoria">Categoría:</label>
                            <select name="categoria" id="">
                                <?php if($categorias->num_rows > 0): ?>
                                    <option value="" selected disabled>Seleccione una categoria</option>
                                    <?php while($categoria = $categorias->fetch_assoc()): ?>
                                    <option value="<?=$categoria['id_categoria']?>"><?=$categoria['nombre']?></option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="campo">
                            <label for="formato">Fisico:</label>
                            <input type="checkbox" name="formato" value="1" id="">
                            <label for="formato">Digital:</label>
                            <input type="checkbox" name="formato" value="2" id="">
                            <label for="formato">Ambos:</label>
                            <input type="checkbox" name="formato" value="3" id="">
                        </div>

                        <div class="campo">
                            <label for="estado">Disponible</label>
                            <input type="radio" name="estado" value="1" id="">
                            <label for="estado">No Disponible</label>
                            <input type="radio" name="estado" value="2" id="">
                        </div>

                        <div class="descripcion">
                            <label for="descripcion">Descripcion:</label>
                            <textarea name="descripcion" id=""></textarea>
                        </div>
                        <input type="submit" value="Guardar">
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>

<?php require_once '../libs/footer.php'; ?>