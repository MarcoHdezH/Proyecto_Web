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
?>
<main>
    <section class="Usuario contenedor">
        <div class="imgUsuario contenido-centrado">
            <img src="/build/img/User.svg">
        </div>
        <div>
            <h1>Información de Usuario</h1>
            <div class="infoUsuario">
                <?php $result = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM usuario WHERE correo='$usuario' ")); ?>
                <h2>Nombre completo: &nbsp <span> <?php echo $result['nombre']; ?> <?php echo $result['apellido']; ?></span> </h2>
                <h2>Telefono: &nbsp <span> <?php echo $result['telefono']; ?> </span> </h2>
                <h2>Correo Electronico: &nbsp <span> <?php echo $result['correo']; ?> </span> </h2>
            </div>
        </div>
    </section>
    <section class="navegacion centrar-texto opUsuario">
        <a class="boton-amarillo texto-blanco" href="/user/reservacion.php">Crear una Nueva Reservacion</a>
        <a class="boton-amarillo texto-blanco" href="/user/eventos.php">Lista de Eventos Parroquiales</a>
        <a class="boton-amarillo texto-blanco" href="/user/listaReservaciones.php">Reservaciones Activas</a>
        <a class="boton-amarillo-block" href="/user/actualizarUsuario.php?id=<?php echo $_SESSION['id'] ?>">Editar Perfil</a>
        <a class="boton-amarillo texto-blanco" href="/includes/config/destroy.php">Cerrar Sesión</a>
    </section>
</main>

<?php
mysqli_close($db);
incluirTemplate('footerU');
?>