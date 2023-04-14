<?php
require '../includes/funciones.php';
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
?>

<main>
    <h1>¿Qúe Operacion deseas Realizar?</h1>
    <section class="navegacion">
        <a class="boton-verde" href="#">Administrar Usuarios</a>
        <a class="boton-verde" href="#">Administrar Reservaciones</a>
        <a class="boton-verde" href="#">Administrar Servicios</a>
    </section>
</main>