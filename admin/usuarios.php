<?php
require '../includes/funciones.php';
require '../includes/config/database.php';
$auth = estaAutenticado();
if (!$auth) {
    header('Location: /');
} else {
    if ($_SESSION['type'] === 'users') {
        header('Location: /user');
    } else {
        if ($_SESSION['type'] === 'admin') {
            header('Location: ');
        }
    }
}
incluirTemplate('headerA');
$db = conectarDB();

$acciones = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        $acciones[] = "Reservacion Eliminada Exitosamente";
        $delete = "DELETE FROM inforeservacion WHERE id=$id";
        $resultado = mysqli_query($db, $delete);
        header('Location: ');
    }
}
?>

<main class="contenedor centrar-contenido opUsuario">
    <h1>Lisa de Usuarios Registrados</h1>
    <section>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query = "SELECT * FROM usuario WHERE tipo='users'";
                $conexion = mysqli_query($db, $query);
                ?>
                <?php while ($usuarios = mysqli_fetch_assoc($conexion)) : ?>
                    <tr class="centrar-texto">
                        <td><?php echo $usuarios['nombre'] ?> <?php echo $usuarios['apellido'] ?></td>
                        <td><?php echo $usuarios['telefono'] ?></td>
                        <td><?php echo $usuarios['correo'] ?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $usuarios['id']; ?>">
                                <input class="boton-rojo-block" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </section>
    <a href="/admin" class="boton-verde-block">Regresar</a>
</main>

<?php
incluirTemplate('footerA');
?>