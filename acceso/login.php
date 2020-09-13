<?php
require_once '../libs/header.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $conexion->real_escape_string($_POST['email']);
    $password = $conexion->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM biblioteca.usuarios where Email=?";

    $datos = prepare_select($conexion, $sql, [$email]);
    if ($datos->num_rows > 0) {
        $filas = $datos->fetch_assoc();
        if ($filas['Clave'] == $password) {
            $_SESSION['User'] = $filas;
        } else {
            $_SESSION['error'] = 'La contraseña es incorrecta';
        }
    } else {
        $_SESSION['error'] = 'El email ingresado no esta registrado';
    }
} elseif (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['error'] = 'Ambos campos son obligatorios';
}

?>
<div class="contenedor">
    <div class="form-container">
        <div class="form">
            <?php if (isset($_SESSION['User'])) : ?>
                <?php header('Location: /biblioteca/index.php'); ?>
            <?php elseif (isset($_SESSION['error']) && isset($_REQUEST['Ingresar'])) : ?>
                <div class="alert_red"><?= $_SESSION['error']; ?> :(</div>
            <?php endif; ?>

            <h2 class="title">INICIAR SESION</h2>
            <form action="login.php" method="POST">
                <input type="email" placeholder="Example@gmail.com" name="email" required> <br>
                <br>
                <input type="password" placeholder="Password" name="password" required> <br>
                <input type="submit" value="Ingresar" name="Ingresar"><br>
                <a href="/biblioteca/acceso/registro.php">¿No tenes cuenta? Registrate ahora.</a>
            </form>

        </div>
        <img src="/biblioteca/assets/img/login-registro.jpg" alt="" class="derecha">
    </div>
</div>
<?php require_once '../libs/footer.php'; ?>