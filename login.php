<?php
include "includes/templates/header.php";
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
</main>

<?php
include "includes/templates/footer.php";
?>