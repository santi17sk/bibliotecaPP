<?php

require_once '../libs/header.php';

if(!empty($_GET['idUsuario'])){
    $id = $_GET['idUsuario'];

    $sql = "UPDATE usuarios SET Estado = 0 WHERE Id_Usuario = ?";
    
    $save = prepare_query($conexion, $sql, [$id], 'i');
    if($save){
        header('Location: index.php');
    }else{
        echo 'Error al borrar';
    }
}

?>



<?php require_once '../libs/footer.php'; ?>