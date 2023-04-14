<?php
require '../includes/funciones.php';
require '../includes/config/database.php';
$auth = estaAutenticado();
if(!$auth){
    header('Location: /');
}else{
    if($_SESSION['type'] ==='users'){
        header('Location: ');
    }else{
        if($_SESSION['type'] ==='admin'){
            header('Location: /admin');
        }
    }
}
$db=conectarDB();
$usuario=$_SESSION['usuario'];
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
                <?php $result=mysqli_query($db,"SELECT * FROM usuario WHERE correo=$usuario ");
                var_dump($result);
                exit;?>
                <h2>Nombre completo: &nbsp <span> Marco Antonio Hernandez Hernandez</span> </h2>
                <h2>Telefono: &nbsp <span> Marco Antonio Hernandez Hernandez</span> </h2>
                <h2>Correo Electronico: &nbsp <span> Marco Antonio Hernandez Hernandez</span> </h2>
                <h2>Contraseña: &nbsp <span> Marco Antonio Hernandez Hernandez</span> </h2>
            </div>
        </div>
    </section>
</main>