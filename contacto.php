<?php
include "includes/templates/header.php";
?>

<main class="contenedor seccion">
    <h1>¿Dudas? Contacta con Nosotros</h1>
    <form class="formulario">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre">

            <label for="email">Correo Electrónico</label>
            <input type="email" placeholder="Tu Nombre" id="email">

            <label for="telefono">Teléfono Movil</label>
            <input type="tel" placeholder="222-123-4567" id="telefono">

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje"></textarea>
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>

<?php
include "includes/templates/footer.php";
?>