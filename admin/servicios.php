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
        $acciones[] = "Servicio Eliminado Exitosamente";
        $delete = "DELETE FROM servicio WHERE id=$id";
        $deletereservacion = "DELETE FROM inforeservacion WHERE servicioID=$id";
        $resultado = mysqli_query($db, $delete);
        mysqli_query($db, $deletereservacion);
        header('Location: ');
    }
}
?>

<main class="contenedor centrar-contenido opUsuario">
    <h1>Lisa de Servicios Registrados</h1>
    <section>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>Nombre de Servicio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $query = "SELECT * FROM servicio";
                $conexion = mysqli_query($db, $query);
                ?>
                <?php while ($servicios = mysqli_fetch_assoc($conexion)) : ?>
                    <tr class="centrar-texto">
                        <td><?php echo $servicios['servicio'] ?></td>
                        <td>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $servicios['id']; ?>">
                                <input class="boton-rojo-block" type="submit" value="Eliminar">
                            </form>
                            <a class="boton-amarillo-block" href="/admin/actualizarServicio.php?id=<?php echo $servicios['id'] ?>">Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </section>
    <a href="/admin/crearServicio.php" class="boton-verde-block">Registrar Nuevo Servicio</a>
    <a href="/admin/verServicios.php" class="boton-verde-block">Ver Servicios (Más Detalle)</a>
    <a href="/admin" class="boton-verde-block">Regresar</a>
</main>

<?php
incluirTemplate('footerA');
?>