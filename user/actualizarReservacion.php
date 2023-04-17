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

$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);
$servicio= '';
$fecha = '';
$sacerdote = '';
$asistentes = '';
$errores = [];

if(!$id){
    header('Location: /user');
}else{
    $result=mysqli_query($db,"SELECT * FROM inforeservacion WHERE id=$id");
    if($result->num_rows===0){
        header('Location: /user');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioID = $_SESSION['id'];
    $servicioID = mysqli_real_escape_string($db, $_POST['servicio']);
    $fecha = mysqli_real_escape_string($db, $_POST['fecha']);
    $sacerdote = mysqli_real_escape_string($db, $_POST['sacerdote']);
    $asistentes = mysqli_real_escape_string($db, $_POST['asistentes']);

    if(!$servicioID){
        $errores[] = "El tipo de Servicio Obligatorio";
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

    if(!$sacerdote){
        $errores[] = "Es Necesario Elegir a un Sacerdote";
    }

    if(!$asistentes){
        $errores[] = "Debes Especificar el Número de Asistentes al Evento";
    }else{
        if($asistentes<10 || $asistentes>120){
            $errores[] = "El número de Asistentes debo oscilar entre 10 y 120 Personas.";
        }
    }

    if(empty($errores)){
        //Actualizando Datos en BD
        $query="UPDATE inforeservacion SET fecha='$fecha',sacerdote='$sacerdote',asistentes='$asistentes',servicioID='$servicioID' WHERE id='$id'";
        mysqli_query($db,$query);
        header('Location: /user/listaReservaciones.php');
    }
}
?>

<main class="contenedor seccion">
    <h1>Modifica los datos de tu Reservación</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información de Usuario</legend>

            <?php
                $reservacion=mysqli_query($db,"SELECT * FROM inforeservacion WHERE id=$id");
                $datosReservacion=mysqli_fetch_assoc($reservacion);
                $servicioID=$datosReservacion['servicioID'];
                $datoServicio= mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM servicio WHERE id='$servicioID'"));
            ?>
            <input type="hidden" name="id" value="<?php echo $id;?>">


            <label for="servicio">Tipo de Servicio:</label>
            <select name="servicio" id="servicio">
                <option value="" disabled selected>-- Seleccione una Opción --</option>
                <?php while ($servicio = mysqli_fetch_assoc($consulta)) : ?>
                    <option <?php echo $servicioID===$servicio['id'] ? 'selected' : ''; ?> value="<?php echo $servicio['id'] ?>"><?php echo $servicio['servicio'] ?></option>
                <?php endwhile; ?>
            </select>
            <label for="fecha">Fecha:</label>
            <input type="date"  id="fecha" name="fecha" value="<?php echo $datosReservacion['fecha'] ?>">

            <label for="hora">Hora: (Recuerda que por disposicion, la hora siempre es a las 12:00 horas)</label>
            <input type="time"  id="hora" name="hora" value="<?php echo $datosReservacion['hora'] ?>" disabled>

            <label for="sacerdote">Sacerdote:</label>
            <select name="sacerdote">
                <option value="" disabled selected>-- Seleccione una Opción --</option>
                <option value="Arcadio Flores Calalpa">Arcadio Flores Calalpa</option>
                <option value="Jorge Lopez Arciga">Jorge López Árciga</option>
                <option value="Juan Rangel  Muñoz">Juan Rangel Muñoz</option>
            </select>
            
            <label for="asistentes">Numero de Asistentes (Recuerda que la capacidad de Nuestra Iglesia es de 120 Personas):</label>
            <input type="tel"  id="asistentes" name="asistentes" value="<?php echo $datosReservacion['asistentes']?>">

        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
    <a href="/user" class="boton-rojo-block">Regresar</a>
</main>

<?php
mysqli_close($db);
incluirTemplate('footerU');
?>