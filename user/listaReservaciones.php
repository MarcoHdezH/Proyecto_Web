<?php
require '../includes/funciones.php';
require '../includes/config/database.php';
$auth = estaAutenticado();
if (!$auth) {
    header('Location: /');
} else {
    if ($_SESSION['type'] === 'users') {
        header('Location: ');
    } else {
        if ($_SESSION['type'] === 'admin') {
            header('Location: /admin');
        }
    }
}
$db = conectarDB();
$usuario = $_SESSION['usuario'];
incluirTemplate('headerU');
$acciones = [];

if($_SERVER['REQUEST_METHOD']==='POST'){
    $id = $_POST['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if($id){

        $acciones[]="Reservacion Eliminada Exitosamente";
        $delete="DELETE FROM inforeservacion WHERE id=$id";
        $resultado = mysqli_query($db,$delete);
        //Eliminando Reservacion
            header('Location: ');
    }
}

?>
<main class="contenedor centrar-contenido opUsuario">
    <h1>Reservaciones Activas</h1>
    <?php foreach($acciones as $accion): ?>
        <div class="alerta exito">
            <?php echo $accion ?>
        </div>
    <?php endforeach; ?>
    <section>
    <table class="propiedades">
        <thead>
            <tr>
                <th>Servicio Parroquial</th>
                <th>No. de Asistentes</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Sacerdote Asignado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $id=$_SESSION['id']; 
                $query="SELECT * FROM inforeservacion WHERE usuarioID=$id";
                $conexion = mysqli_query($db,$query);
            ?>
            <?php while ($reservacion = mysqli_fetch_assoc($conexion)) : ?>
                <tr class="centrar-texto">
                    <?php
                        $servicioID=$reservacion['servicioID'];
                        $tipoServicio=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM servicio WHERE id=$servicioID"))
                    ?>
                    <td><?php echo $tipoServicio['servicio'] ?></td>
                    <td><?php echo $reservacion['asistentes'] ?></td>
                    <td><?php echo $reservacion['fecha'] ?></td>
                    <td><?php echo $reservacion['hora'] ?></td>
                    <td><?php echo $reservacion['sacerdote'] ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $reservacion['id'];?>">
                            <input class="boton-rojo-block" type="submit" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="/user/actualizarReservacion.php?id=<?php echo $reservacion['id'] ?>">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    </section>
    <a href="/user" class="boton-verde-block">Regresar</a>

</main>

<?php
mysqli_close($db);
incluirTemplate('footerU');
?>