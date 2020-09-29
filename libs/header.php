<?php
session_start();
require_once 'conexion.php';
require_once 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Fuentes de Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,400;0,700;0,900;1,300&display=swap" rel="stylesheet">
    <!--Normalized-->
    <link rel="stylesheet" href="/biblioteca/assets/css/normalize.css">
    <!--Estilos-->
    <link rel="stylesheet" href="/biblioteca/assets/css/style.css">
    <title>Tú Biblioteca</title>
</head>

<body>
    <header class="style__site">
        <div class="contenedor">
            <div class="barra">
                <div class="titulo">
                    <a href="../">
                        <h1>Tu<span class="fw__900">Biblioteca</span></h1>
                    </a>
                </div>
                <div class="items">
                    <form action="" class="buscador">
                        <input type="search" placeholder="Buscar" id="buscadorLibros">
                    </form>
                    <?php if (isset($_SESSION['User'])) : ?>
                        <a href=""><?= $_SESSION['User']['Nick']; ?></a>
                        <a href="/biblioteca/acceso/logout.php">Cerrar Sesión</a>
                    <?php else : ?>
                        <a href="/biblioteca/acceso/login.php">Iniciar Sesión</a>
                        <a href="/biblioteca/acceso/registro.php">Registrarse</a>
                    <?php endif; ?>


                    <a href="">Editar Perfil</a>
                </div>

            </div>
            <div class="links__secundarios">
                <a href="#">Categorías</a>
                <a href="/biblioteca/index.php">inicio</a>
                <a href="#">Contacto</a>
                <a href="#">Sobre Nosotros</a>
                <?php if(isset($_SESSION['User']) && $_SESSION['User']['Rol'] == 'admin'): ?>
                    <a href="/biblioteca/libros/">Dashboard</a>
                <?php endif;?>
            </div>
        </div>
    </header>
    <!-- <div class="contenedor"> -->