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

$db = conectarDB();
$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if(!$email){
        $errores[]="El Email es Obligatorio"; 
    }
    if(!$password){
        $errores[]="La contraseña es Obligatoria"; 
    }

    if(empty($errores)){
        $query = "SELECT * FROM usuario WHERE correo='$email'";
        $resultado = mysqli_query($db,$query);
        if($resultado->num_rows){
            
            $usuario = mysqli_fetch_assoc($resultado);
            
            //Verificar Password
            $auth=strcmp($password,$usuario['contraseña']);

            if($auth===0){
                //Manejo de Sessiones
                session_start();
                $_SESSION['usuario']=$usuario['correo'];
                $_SESSION['id']=$usuario['id'];
                $_SESSION['login']=true;
                $_SESSION['type']=$usuario['tipo'];
                if($usuario['tipo']==='admin'){
                    header('Location:/admin');
                }else{
                    if($usuario['tipo']==='users'){
                        header('Location:/user');
                    }
                }
            }else{
                $errores[]="Contraseña Incorrecta";
            }
        }else{
            $errores[]="El Usuario no Existe";
        }
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Datos del Usuario</legend>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email">

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
    <div class="centrar-texto">
        <p>En caso de no tener una cuenta registrada <a href="/sign.php">Puedes crear una aqui</a></p>
    </div>
</main>

<?php
incluirTemplate('footer');
mysqli_close($db);
?>