<?php
require './includes/funciones.php';
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
incluirTemplate('header');
?>

    <main>
    <section class="contenedor seccion">
            <h1>El propósito de nuestra Iglesia</h1>

            <div class="iconos-nosotros">
                <div class="icono">
                    <img src="./build/img/apartado1.webp" alt="Icono Seguridad" loading="lazy">
                    <h3>Encuentrar el propósito que Dios tiene para sus vidas.</h3>
                </div>

                <div class="icono">
                    <img src="./build/img/apartado2.webp" alt="Icono Precio" loading="lazy">
                    <h3>Equiparles para que encuentren dicho propósito.</h3>
                </div>

                <div class="icono">
                    <img src="./build/img/apartado3.webp" alt="Icono Tiempo" loading="lazy">
                    <h3>Enviarles a cumplir dicho propósito para el que fueron creados por Dios.</h3>
                </div>
            </div>
        </section>

        <section class="imagen-presentacion">
            <h2>Conferencia General de abril de 2023</h2>
            <p>Únete a Nosotros en un servicio de adoración mundial virtual, con mensajes centrados en Jesucristo, los dias 1 y 2 de abril</p>
        </section>

        <div class="contenedor seccion seccion-inferior">
            <section class="blog">
                <h3>Noticias Destacadas</h3>
                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="./build/img/noticia1.webp" type="image/webp">
                            <source srcset="./build/img/noticia1.jpg" typea="image/jpg">
                            <img loading="lazy" src="./build/img/noticia1.webp" alt="Texto Entrada Blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="https://www.vaticannews.va/es/iglesia/news/2023-03/el-celam-pide-oraciones-por-la-recuperacion-del-papa-francisco.html">
                            <h4>El CELAM pide oraciones por la recuperación del Papa Francisco</h4>
                            <p class="informacion-meta">Escrito el: <span>30/03/2023</span> por: <span>Vatican News</span></p>
                            <p>
                                El Consejo Episcopal Latinoamericano y Caribeño (CELAM), en un mensaje firmado por su presidente, monseñor Miguel Cabrejos, pide oraciones por la pronta recuperación del Papa Francisco
                            </p>
                        </a>
                    </div>
                </article>

                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="./build/img/noticia2.webp" type="image/webp">
                            <source srcset="./build/img/noticia2.jpg" typea="image/jpg">
                            <img loading="lazy" src="./build/img/noticia2.webp" alt="Texto Entrada Blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <a href="https://www.vaticannews.va/es/iglesia/news/2023-03/jovenes-camino-cuaresmal-nicolas-bottaro-argentina.html">
                            <h4>Jóvenes en el camino cuaresmal: "Debemos ir juntos, como hermanos"</h4>
                            <p class="informacion-meta">Escrito el: <span>28/03/2023</span> por: <span>Mireia Bonilla y Sebastián Sansón Ferrari</span></p>
                            <p>
                                ¿Te unes a vivir 40 días inolvidables? ¡Esta Cuaresma puedes marcar la diferencia! Escucha los consejos que ofrecen algunos jóvenes de América Latina y España.
                            </p>
                        </a>
                    </div>
                </article>
            </section>

            <section class="testimoniales">
                <h3>Versículo de la Semana</h3>
                <div class="testimonial">
                    <blockquote>
                        No temas, porque yo estoy contigo; no desmayes, porque yo soy tu Dios que te fortalezco; siempre te ayudaré; siempre te sustentaré con la diestra de mi justicia.
                    </blockquote>
                    <p>- Isaías 41:10</p>
                </div>
            </section>
        </div>
    </main>

<?php
incluirTemplate('footer');
?>