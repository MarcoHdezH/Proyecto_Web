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

<main class="acciones">
    <h1>¿Qúe Operacion deseas Realizar?</h1>
    <section class="navegacion">
        <a class="boton-verde" href="/admin/usuarios.php">Administrar Usuarios</a>
        <a class="boton-verde" href="/admin/reservaciones.php">Administrar Reservaciones</a>
        <a class="boton-verde" href="/admin/servicios.php">Administrar Servicios</a>
        <a class="boton-verde" href="/includes/config/destroy.php">Cerrar Sesión</a>
    </section>
</main>

<?php

incluirTemplate('footerA');

?>