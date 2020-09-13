
<?php
require_once '../libs/header.php';


if (!empty($_POST['nombre__cat'])) {

    $nombreCategoria = $conexion->real_escape_string($_POST['nombre__cat']);
    
    $sql = "INSERT INTO `biblioteca`.`categorias` (nombre) VALUES (?)";

    $save = prepare_query($conexion, $sql, [$nombreCategoria]);

    if ($save->error) {
        $_SESSION['categorias'] = 'failed';
        
    } else {
        $_SESSION['categorias'] = 'complete';
        header('Location: index.php');
    }
}

?>

