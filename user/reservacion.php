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
    }else{
        $dis="SELECT * FROM inforeservacion WHERE fecha='$fecha'";
        $dispinibilidad = mysqli_query($db,$dis);
        if($dispinibilidad->num_rows>0){
            $errores[] = "Esta fecha ya no esta Disponible";
        }
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
        $query="INSERT INTO infoReservacion(fecha,hora,sacerdote,asistentes,usuarioID,servicioID) VALUES ('$fecha','$hora','$sacerdote','$asistentes','$usuarioID','$servicioID')";
        $result = mysqli_query($db,$query);
        header('Location: /user');
    }
}
?>

<main class="contenedor seccion">
    <h1>¡Aparta hoy mismo! Registra tus datos de Reservacion.</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" action="/user/reservacion.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información de Reservación</legend>

            <label for="servicio">¿Que tipo de evento desea Reservar?</label>
            <select name="servicio" id="servicio">
                <option value="" disabled selected>-- Seleccione una Opción --</option>
                <?php while ($servicio = mysqli_fetch_assoc($consulta)) : ?>
                    <option <?php echo $servicioID===$servicio['id'] ? 'selected' : ''; ?> value="<?php echo $servicio['id'] ?>"><?php echo $servicio['servicio'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="fecha">Fecha del Evento (Mes):</label>
            <input type="date" min="<?php echo date("Y");echo "-"; echo date("m"); echo "-";echo date("d");?>" max="2023-12-31" id="fecha" name="fecha" value="<?php echo $fecha ?>">

            <label for="hora">Hora del Evento (Por Disposición, la hora del evento siempre es Programada a las 12:00 horas)</label>
            <input type="time" value="12:00" id="hora" name="hora" disabled>

            <label for="asistentes">Numero de Asistentes (Recuerda que la capacidad de Nuestra Iglesia es de 120 Personas)</label>
            <input type="number" name="asistentes" id="asistentes" value="<?php echo $asistentes ?>">

            <label>¿Quién de nuestros sacerdotes te gustaría que oficiara la misa?</label>
            <a href="/user/eventos.php"> Conoce a los Miembros de Nuestra Iglesia</a>
            <select name="sacerdote">
                <option value="" disabled selected>-- Seleccione una Opción --</option>
                <option value="Arcadio Flores Calalpa">Arcadio Flores Calalpa</option>
                <option value="Jorge Lopez Arciga">Jorge López Árciga</option>
                <option value="Juan Rangel  Muñoz">Juan Rangel Muñoz</option>
            </select>
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
    <a href="/user" class="boton-rojo-block">Regresar</a>
</main>

<?php
mysqli_close($db);
incluirTemplate('footerU');
?>