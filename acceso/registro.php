<?php
require_once '../libs/header.php';

if (!empty($_POST['nickname']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    $nickname = $conexion->real_escape_string($_POST['nickname']);
    $email = $conexion->real_escape_string($_POST['email']);
    $password = $conexion->real_escape_string($_POST['password']);

    $sql = "INSERT INTO usuarios (Nick, Email, Clave) VALUES (?,?,?)";

    $save = prepare_query($conexion, $sql, [$nickname, $email, $password], 'sss');

    if ($save->error) {
        $_SESSION['registro'] = 'failed';
    } else {
        $_SESSION['registro'] = 'complete';
    }
}

?>
<div class="contenedor">
    <div class="form-container">
        <div class="form">
            <?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 'complete') : ?>
                <div class="alert_green">¡Se ha registrado exitosamente!</div>
            <?php elseif (isset($_SESSION['registro']) && $_SESSION['registro'] == 'failed') : ?>
                <div class="alert_red">No se pudo registrar. :(</div>
            <?php endif; ?>
            <?php if (isset($_SESSION['registro'])) {
                $_SESSION['registro'] = null;
                unset($_SESSION['registro']);
            } ?>

            <h2 class="title">REGISTRARSE</h2>
            <form action="registro.php" method="POST">
                <input type="text" placeholder="Nickname" name="nickname" required> <br>
                <input type="email" placeholder="Example@gmail.com" name="email" required> <br>
                <input type="password" placeholder="Password" name="password" required> <br>
                <input type="submit" value="Registrarse"><br>
                <a href="/biblioteca/acceso/login.php">¿Ya tenes cuenta? Inicia Sesión ahora.</a>
            </form>

        </div>
        <img src="/biblioteca/assets/img/login-registro.jpg" alt="" class="derecha">
    </div>
</div>
<?php require_once '../libs/footer.php' ?>