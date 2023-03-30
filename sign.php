<?php
require './includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Crear Usuario</h1>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Datos de Usuario</legend>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email">

            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
        </fieldset>

        <fieldset>
            <legend>Datos Personales</legend>

            <label for="nombre">Nombre(s):</label>
            <input type="text" name="nombre" id="nombre">
            <label for="apellido">Apellido(s):</label>
            <input type="text" name="apellido" id="apellido">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono">

        </fieldset>
        <input type="submit" value="Crear Usuario" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>