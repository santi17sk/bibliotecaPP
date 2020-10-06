<?php
require_once '../libs/header.php';

$sql = "SELECT * FROM usuarios WHERE Id_Usuario = ?";
$usuarios = prepare_select($conexion, $sql, [$_SESSION['User']['Id_Usuario']]);

?>

<div class="contenedor">
    <div class="form-container" style="height: 540px;">
        <div class="form">
            <h2 class="title">EDITAR PERFIL</h2>
            <form action="" method="POST" id="formularioGestion">
                <?php if($usuarios->num_rows > 0): ?>
                    <?php $usuario = $usuarios->fetch_assoc(); ?>
                <input type="text" placeholder="Nombre" id="nombre" value="<?=$usuario['Nombre']?>" name="nombre" required> <br>
                <input type="hidden" name="idUsuario" id="idUsuario" value="<?=$_SESSION['User']['Id_Usuario']?>">
                <input type="email" placeholder="Example@gmail.com" value="<?=$usuario['Email']?>" id="email" name="email" required> <br>
                <input type="password" placeholder="Contraseña actual" id="passwordOld" name="passwordOld" required> <br>
                <input type="password" placeholder="Contraseña nueva" id="passwordNew" name="passwordNew" required> <br>
                <input type="submit" value="Confirmar cambios" style="width: 162px;"><br>
                <?php endif; ?>
            </form>
        </div>
        <img src="/biblioteca/assets/img/login-registro.jpg" alt="" class="derecha">
    </div>
    <div id="resultado"></div>
</div>
<script src="/biblioteca/js/usuarios/gestion-perfil.js"></script>
<?php require_once '../libs/footer.php'; ?>