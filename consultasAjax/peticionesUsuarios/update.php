<?php
session_start();
require_once '../../libs/conexion.php';
require_once '../../libs/funciones.php';
if(!empty($_POST['idUsuario']) && !empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['passwordOld']) && !empty($_POST['passwordNew'])){
    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $passwordOld = $_POST['passwordOld'];
    $passwordNew = $_POST['passwordNew'];

    if($passwordOld === $_SESSION['User']['Clave']){
        $sql = "UPDATE usuarios SET Nombre = ? , Email = ? , Clave = ? WHERE Id_Usuario = ?";
        $save = prepare_query($conexion, $sql, [$nombre, $email, $passwordNew, $idUsuario]);
    }

    // echo $idUsuario.' '.$nombre. ' ' . $email . ' ' . $passwordOld . ' ' . $passwordNew;
}
?>