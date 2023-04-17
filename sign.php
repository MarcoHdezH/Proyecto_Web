<?php
require './includes/funciones.php';
require './includes/config/database.php';
$auth = estaAutenticado();
if(!$auth){
    header('Location: ');
}else{
    if($_SESSION['type'] ==='users'){
        header('Location: /user');
    }else{
        if($_SESSION['type'] ==='admin'){
            header('Location: /admin');
        }
    }
}
incluirTemplate('header');
$db=conectarDB();
$correo = '';
$contraseña = '';
$nombre = '';
$apellido = '';
$telefono = '';
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = mysqli_real_escape_string($db, $_POST['email']);
    $contraseña = mysqli_real_escape_string($db, $_POST['password']);
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
    $telefono = mysqli_real_escape_string($db, $_POST['telefono']);

    if(!$correo){
        $errores[] = "Debes Escoger un Servicio Parroquial";
    }else{
        $query="SELECT * FROM usuario WHERE correo='$correo'";
        $consulta=mysqli_query($db,$query);
        if($consulta->num_rows>0){
            $errores[]="Ese correo ya se encuentra en Uso";
        }
    }
    
    if(!$contraseña){
        $errores[] = "La contraseña es Obligatoria";
    }

    if(!$nombre){
        $errores[] = "El nombre es Obligatorio";
    }

    if(!$apellido){
        $errores[] = "El Apellido es Obligatorio";
    }

    if(!$telefono){
        $errores[] = "El telefono es Obligatorio";
    }

    if(empty($errores)){
        //Registrando Datos en BD
        $queryInsert="INSERT INTO usuario(nombre,apellido,telefono,correo,contraseña,tipo) VALUES ('$nombre','$apellido','$telefono','$correo','$contraseña','users')";
        mysqli_query($db,$queryInsert);
        header('Location: /login.php');
    }
}
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Crear Usuario</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Datos de Usuario</legend>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" value="<?php echo $correo ?>" id="email">

            <label for="password">Contraseña:</label>
            <input type="password" name="password" value="<?php echo $contraseña ?>" id="password">
        </fieldset>

        <fieldset>
            <legend>Datos Personales</legend>
            <label for="nombre">Nombre(s):</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">

            <label for="apellido">Apellido(s):</label>
            <input type="text" name="apellido" id="apellido" value="<?php echo $apellido ?>">
            
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" value="<?php echo $telefono ?>">

        </fieldset>
        <input type="submit" value="Crear Usuario" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>