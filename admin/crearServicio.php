<?php
require '../includes/funciones.php';
require '../includes/config/database.php';
$auth = estaAutenticado();
if(!$auth){
    header('Location: /');
}else{
    if($_SESSION['type'] ==='users'){
        header('Location: /user');
    }else{
        if($_SESSION['type'] ==='admin'){
            header('Location: ');
        }
    }
}
incluirTemplate('headerA');
$db=conectarDB();

//Arreglo con Mensajes de Errores
$servicio = '';
$imagen= '';
$descripcion = '';
$errores = [];

if($_SERVER['REQUEST_METHOD']==='POST'){
    $servicio = mysqli_real_escape_string($db, $_POST['servicio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $imagen = ($_FILES['imagen']);

    if(!$servicio){
        $errores[] = "Debes Añadir un titulo";
    }

    if(!$descripcion){
        $errores[] = "Debes añadir una Descripcion";
    }

    if(strlen($descripcion)<50){
        $errores[] = "Debes Añadir una descripcion y esta debe ser mayor a 50";
    }

    if(!$imagen['name'] || $imagen['error']){
        $errores[] = "Debes Añadir una Imagen";
    }

    //Validad Tamaño de Imagenes
    $medida = 2000*100;
    if($imagen['size']>$medida){
        $errores[]="La imagen es muy Pesada para Subir";
    }

    //Revisar el Arreglo de Errores
    if(empty($errores)){

        /* Subida de Archivos */
        $carpetaImagenes='../src/img/';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }
        //Subir Imagen
        $nombreImagen=md5(uniqid(rand(),true));
        $nombreImagen2=$nombreImagen.".jpg";

        move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.$nombreImagen2);
        
        //Insertar en la base de Datos
        $query = "INSERT INTO servicio (servicio,descripcion,imagen) VALUES ('$servicio','$descripcion','$nombreImagen')";
        $resultado = mysqli_query($db,$query);
        header('Location: /admin/servicios.php');
    }
}

?>

<main class="contenedor seccion">
    <h1>Crear Nuevo Servicio</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información del Servicio</legend>

            <label for="servicio">Nombre del Servicio:</label>
            <input type="text" id="servicio" name="servicio" value="<?php echo $servicio;?>">

            <label for="imagen">Añade una Imagen para Mostrar:</label>
            <input id="imagen" name="imagen" type="file" accept="image/jpeg, image/png">

            <label for="descripcion">Añade una Descripcion del Evento:</label>
            <textarea id="descripcion" name="descripcion" value="<?php echo $descripcion;?>"><?php echo $descripcion;?></textarea>

        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
    <a href="/admin" class="boton-rojo-block">Regresar</a>
</main>

<?php
incluirTemplate('footerA');
?>