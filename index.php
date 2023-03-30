<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Basílica San Pedro</title>
</head>
<body>
    <header class="header">
        <div class="titulo-header">
            <a href="/index.php"><h1>Basílica de San Pedro</h1></a>
            <nav class="navegacion">
                <a href="#">¿Quienés Somos?</a>
                <a href="#">Nuestros Servicios</a>
                <a href="#">Contacto</a>
                <a href="#">Crear Cuenta</a>
            </nav>
    </header>

    <main>
    <section class="contenedor seccion">
            <h1>Más Sobre Nosotros</h1>

            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="./build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                    <h3>Seguridad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla hic blanditiis tempora beatae
                        facilis, distinctio corporis modi laboriosam expedita commodi autem praesentium harum odit
                        asperiores tenetur rem facere deserunt possimus?</p>
                </div>

                <div class="icono">
                    <img src="./build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                    <h3>Precio</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla hic blanditiis tempora beatae
                        facilis, distinctio corporis modi laboriosam expedita commodi autem praesentium harum odit
                        asperiores tenetur rem facere deserunt possimus?</p>
                </div>

                <div class="icono">
                    <img src="./build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                    <h3>Tiempo</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla hic blanditiis tempora beatae
                        facilis, distinctio corporis modi laboriosam expedita commodi autem praesentium harum odit
                        asperiores tenetur rem facere deserunt possimus?</p>
                </div>
            </div>
        </section>

        <section class="imagen-presentacion">
            <h2>Conferencia General de abril de 2023</h2>
            <p>Únete a Nosotros en un servicio de adoración mundial virtual, con mensajes centrados en Jesucristo, los dias 1 y 2 de abril</p>
        </section>

        <div class="contenedor seccion seccion-inferior">
            <section class="blog">
                <h3>Nuestro Blog</h3>
                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="./build/img/blog1.webp" type="image/webp">
                            <source srcset="./build/img/blog1.jpg" typea="image/jpg">
                            <img loading="lazy" src="./build/img/blog1.jpg" alt="Texto Entrada Blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Secretos de un buen Matrimonio</h4>
                            <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                            <p>
                                Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.
                            </p>
                        </a>
                    </div>
                </article>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="./build/img/blog2.webp" type="image/webp">
                            <source srcset="./build/img/blog2.jpg" typea="image/jpg">
                            <img loading="lazy" src="./build/img/blog2.jpg" alt="Texto Entrada Blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="entrada.html">
                            <h4>Introduccion al Catolicismo</h4>
                            <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                            <p>
                                Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                            </p>
                        </a>
                    </div>
                </article>
            </section>

            <section class="testimoniales">
                <h3>Testimonios</h3>
                <div class="testimonial">
                    <blockquote>
                        El Personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                    </blockquote>
                    <p>- Marco Hernandez</p>
                </div>
            </section>
        </div>

    </main>
</body>
</html>