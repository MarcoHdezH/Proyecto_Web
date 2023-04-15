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
$consulta = mysqli_query($db, "SELECT * FROM servicio");
incluirTemplate('headerU');

$servicioID = '';
$fecha = '';
$hora = '';
$asistentes = '';
$sacerdote = '';
$errores = [];

$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /user/listaReservaciones.php');
}else{
    $result=mysqli_query($db,"SELECT * FROM usuario WHERE id=$id");
    if(!$result){
        header('Location: /user/listaReservaciones.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servicioID = mysqli_real_escape_string($db, $_POST['servicio']);
    $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
    $hora = '12:00';
    $asistentes = mysqli_real_escape_string($db, $_POST['asistentes']);
    $sacerdote = mysqli_real_escape_string($db, $_POST['sacerdote']);

    if(!$servicioID){
        $errores[] = "Debes Escoger un Servicio Parroquial";
    }

    if(!$fecha){
        $errores[] = "Debes Escoger una fecha para el evento";
    }

    if(!$asistentes){
        $errores[] = "Debes Especificar el Número de Asistentes al Evento";
    }else{
        if($asistentes<10 || $asistentes>120){
            $errores[] = "El número de Asistentes debo oscilar entre 10 y 120 Personas.";
        }
    }

    if(!$sacerdote){
        $errores[] = "Debes Escoger un Sacerdote para la Misa";
    }

    if(empty($errores)){
        //Registrando Datos en BD
        session_start();
        $usuarioID= $_SESSION['id'];
        $query="INSERT INTO infoReservacion(fecha,hora,sacerdote,asistentes,usuarioID) VALUES ('$fecha','$hora','$sacerdote','$asistentes','$usuarioID')";
        $result = mysqli_query($db,$query);
        $query="INSERT INTO reservaciones(usuarioID,servicioID) VALUES ($usuarioID,$servicioID)";
        $result = mysqli_query($db,$query);
        header('Location: /user');
    }
}
?>

<main class="contenedor seccion">
    <h1>¡Actualiza tus Datos!</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" action="/user/reservacion.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información de Usuario</legend>

            <label for="nombre">Nombre(s):</label>
            <input type="text"  id="nombre" name="nombre">

            <label for="apellido">Apellido(s):</label>
            <input type="text"  id="apellido" name="apellido">

            <label for="telefono">Telefono de Contacto:</label>
            <input type="tel"  id="nombre" name="nombre">

            <label for="correo">Correo Electronico</label>
            <input type="correo"  id="correo" name="correo">

            <label for="password">Contraseña</label>
            <input type="correo"  id="password" name="password">

        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
    <a href="/user" class="boton-rojo-block">Regresar</a>
</main>

<?php
mysqli_close($db);
incluirTemplate('footerU');
?>