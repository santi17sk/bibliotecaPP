<?php
require_once '../../libs/conexion.php';
require_once '../../libs/funciones.php';

if (!empty($_REQUEST['nombreCategoria'])) {
    $sql = "INSERT INTO biblioteca.categorias (nombre) VALUES (?);";
    $agregar = prepare_query($conexion, $sql, [$_REQUEST['nombreCategoria']]);
    $id = $agregar->insert_id;
    $nuevaCategoria = "SELECT * from biblioteca.categorias where id_categoria = $id";
    $cmd = prepare_select($conexion, $nuevaCategoria);
    $nuevaCategoria = $cmd->fetch_assoc();
?>
    <tr>
        <td><?= $nuevaCategoria['id_categoria'] ?></td>
        <td><?= $nuevaCategoria['nombre'] ?></td>
        <td class="acciones">
            <button class="btn btn-red margin__auto" id="<?= $nuevaCategoria['id_categoria'] ?>">Eliminar</a>
        </td>
    </tr>
<?php } ?>

<?php
if (!empty($_REQUEST['idEliminar'])) {
    $sql = "DELETE FROM biblioteca.categorias WHERE (id_categoria = $_REQUEST[idEliminar]);";
    prepare_select($conexion,$sql);
}
?>
