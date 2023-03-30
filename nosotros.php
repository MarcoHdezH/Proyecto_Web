<?php
require './includes/funciones.php';
incluirTemplate('header');
?>

<main>
    <h1>Conoce más sobre Nosotros</h1>
    <section class="contenedor contenido-nosotros">
        <div class="vision">
            <h4>Nuestra Visión</h4>
            <p class="lema">Ser díscipulos, hacer discípulos, ganar personas para jesus.</p>
            <p>"Por tanto, id, y haced discípulos a todas las naciones, bautizándolos en el nombre del Padre, y del Hijo, y del Espíritu Santo; enseñándoles que guarden todas las cosas que os he mandado; y he aquí yo estoy con vosotros todos los días, hasta el fin del mundo. Amén."</p>

        </div>
        <div class="contenedor imagen">
            <img src="/build/img/vision.jpg">
        </div>
    </section>

    <section class="contenedor contenido-nosotros">
        <div class="vision">
            <h4>Nuestra Misión</h4>
            <p class="lema">Dios nos ha enamorado con una misión:</p>
            <p>Preparar por medio de sus diferentes ministerios (apóstoles, profetas, evangelistas, pastores y maestros) a todos y a cada uno de los miembros para la obra del ministerio. Siendo los creyentes según la capacidad y dones que Dios les ha dado, los encargados de realizar la obra del Señor, y no solo ser espectadores. <br>La Biblia enseña que lo que recibimos de gracia, debemos darlo a otros de gracia</p>

        </div>
        <div class="contenedor imagen">
            <img src="/build/img/mision.jpg">
        </div>
    </section>

    <section class="contenedor">
        <h2>Nuestro Equipo de Trabajo</h2>
        <div class="sacerdotes">
            <article>
                <h4>Arcadio Flores Calalpa</h4>
                <p>Nuestro Obispo</p>
                <img src="/build/img/sacerdote1.webp">
            </article>

            <article>
                <h4>Jorge López Árciga</h4>
                <p>Nuestro Párroco</p>
                <img src="/build/img/sacerdote2.webp">
            </article>

            <article>
                <h4>Juan Rangel Muñoz</h4>
                <p>Nuestro Sacerdote</p>
                <img src="/build/img/sacerdote3.webp">
            </article>
        </div>
    </section>

    <section class="contenedor accesibilidad">
        <div>
            <h4>Horarios de Misa</h4>
            <p class="informacion-meta">Lunes a Viernes <span>10:00am - 4:00pm</span></p>
            <p class="informacion-meta">Fines de Semana <span>10:00am - 2:00pm</span></p>
            <p class="informacion-meta">Para cualquier duda sobre los horarios llamar al <span>222-1237899</span></p>
            <p class="informacion-meta">¿Tienes Dudas sobre algo? Envianos un Mensaje <span><a href="/contacto.php">Contactar</a></span></p>
        </div>
        <div>
            <h4>¿Donde Ubicarnos?</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14656.377322962868!2d-98.19395119716457!3d19.043485456316294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc6bf20c8748d%3A0x15772a534ef8e783!2sTemplo%20y%20convento%20franciscano%20de%20la%20impresi%C3%B3n%20de%20las%20llagas%20de%20San%20Francisco!5e0!3m2!1ses-419!2smx!4v1680208671142!5m2!1ses-419!2smx" width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>

<?php
incluirTemplate('footer');
?>