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
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

$query ="SELECT * FROM servicio WHERE id='$id'";
$consulta=mysqli_query($db,$query);
$infoServicio=mysqli_fetch_assoc($consulta);

//Arreglo con Mensajes de Errores
$servicioID=$infoServicio['id'];
$servicio = $infoServicio['servicio'];
$imagenServicio = $infoServicio['imagen'];
$descripcion = $infoServicio['descripcion'];
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

        if($imagen['name']){
            echo "Llegue Aqui xd";
            unlink($carpetaImagenes.$infoServicio['imagen']);
            //Subir Imagen
            $nombreImagen=md5(uniqid(rand(),true));
            $nombreImagen2=$nombreImagen.".jpg";
            move_uploaded_file($imagen['tmp_name'],$carpetaImagenes.$nombreImagen2);
        }else{
            $nombreImagen2=$infoServicio['imagen'];
        }
        
        //Insertar en la base de Datos
        $query = "UPDATE servicio SET servicio='$servicio',imagen='$nombreImagen',descripcion='$descripcion' WHERE id=$servicioID";
        $resultado = mysqli_query($db,$query);
        header('Location: /admin/servicios.php');
    }
}

?>

<main class="contenedor seccion">
    <h1>Modifica los datos de este Servicio</h1>
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
            <img class="imagen-small" src="/build/img/<?php echo $imagenServicio.".jpg" ?>">

            <label for="descripcion">Añade una Descripcion del Evento:</label>
            <textarea id="descripcion" name="descripcion" value="<?php echo $descripcion;?>"><?php echo $descripcion;?></textarea>

        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
    <a href="/admin/servicios.php" class="boton-rojo-block">Regresar</a>
</main>

<?php
incluirTemplate('footerA');
?>