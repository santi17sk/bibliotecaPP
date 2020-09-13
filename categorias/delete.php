<?php

require_once '../libs/header.php';

if(!empty($_GET['idCategoria'])){
    $id = $_GET['idCategoria'];

    $sql = "DELETE FROM categorias WHERE id_categoria = $id";
    
    $save = prepare_query($conexion, $sql, [$id], 'i');
    if($save){
        header('Location: index.php');
    }else{
        echo 'Error al borrar';
    }
}

?>



<?php require_once '../libs/footer.php'; ?>