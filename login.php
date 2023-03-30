<?php
require './includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

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
?>