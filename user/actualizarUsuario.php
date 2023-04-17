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

$nombre= '';
$apellido = '';
$telefono = '';
$correo = '';
$contraseña = '';
$errores = [];

if(!$id){
    header('Location: /user');
}else{
    $result=mysqli_query($db,"SELECT * FROM usuario WHERE id=$id AND tipo='users'");
    if($result->num_rows===0){
        header('Location: /user');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioID = $_SESSION['id'];
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($db, $_POST['telefono']);
    $correo = mysqli_real_escape_string($db, $_POST['correo']);
    $contraseña = mysqli_real_escape_string($db, $_POST['password']);

    if(!$nombre){
        $errores[] = "El Nombre es Obligatorio";
    }

    if(!$apellido){
        $errores[] = "El Apellido es Obligatorio";
    }

    if(!$telefono){
        $errores[] = "El No. de Telefono es Obligatorio";
    }

    if(!$contraseña){
        $errores[] = "La Contraseña es Obligatoria";
    }

    if(empty($errores)){
        //Actualizando Datos en BD
        session_start();
        $query="UPDATE usuario SET nombre='$nombre',apellido='$apellido',telefono='$telefono',contraseña='$contraseña' WHERE id='$usuarioID'";
        mysqli_query($db,$query);
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
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información de Usuario</legend>

            <?php
                $usuario=mysqli_query($db,"SELECT * FROM usuario WHERE id=$id");
                $datosUsuario=mysqli_fetch_assoc($usuario);
            ?>

            <input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">

            <label for="nombre">Nombre(s):</label>
            <input type="text"  id="nombre" name="nombre" value="<?php echo $datosUsuario['nombre'] ?>">

            <label for="apellido">Apellido(s):</label>
            <input type="text"  id="apellido" name="apellido" value="<?php echo $datosUsuario['apellido'] ?>">

            <label for="telefono">Telefono de Contacto:</label>
            <input type="tel"  id="telefono" name="telefono" value="<?php echo $datosUsuario['telefono'] ?>">

            <label for="password">Contraseña</label>
            <input type="correo"  id="password" name="password" value="<?php echo $datosUsuario['contraseña'] ?>">

        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
    <a href="/user" class="boton-rojo-block">Regresar</a>
</main>

<?php
mysqli_close($db);
incluirTemplate('footerU');
?>