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
    <h1>Lista de Reservaciones Activas</h1>
    <section>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Tipo de Servicio</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Sacerdote Asignado</th>
                    <th>No. de Asistentes</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query = "SELECT * FROM inforeservacion";
                $conexion = mysqli_query($db, $query);
                ?>
                <?php while ($reservaciones = mysqli_fetch_assoc($conexion)) : ?>
                    <tr class="centrar-texto">
                        <?php
                        $servicioID = $reservaciones['servicioID'];
                        $tipoServicio = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM servicio WHERE id=$servicioID"));
                        $usuarioID = $reservaciones['usuarioID'];
                        $tipoUsuario = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM usuario WHERE id='$usuarioID'"));
                        ?>
                        <td><?php echo $tipoUsuario['nombre']; ?> <?php echo $tipoUsuario['apellido'] ?></td>
                        <td><?php echo $tipoServicio['servicio'] ?></td>
                        <td><?php echo $reservaciones['fecha'] ?></td>
                        <td><?php echo $reservaciones['hora'] ?></td>
                        <td><?php echo $reservaciones['sacerdote'] ?></td>
                        <td><?php echo $reservaciones['asistentes'] ?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $reservaciones['id']; ?>">
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