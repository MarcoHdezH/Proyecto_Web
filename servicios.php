<?php
require './includes/funciones.php';
incluirTemplate('header');
?>

<main>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Servicios Parroquiales</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog1.webp" type="image/webp">
                        <source srcset="./build/img/blog1.jpg" typea="image/jpg">
                        <img loading="lazy" src="./build/img/blog1.webp" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <div>
                        <h4>Bodas</h4>
                        <p>
                        Es la unión amorosa de un hombre y una mujer con el propósito de la procreación y la crianza de los hijos.
                        El propósito del matrimonio sirve no solo al cuidado de los hijos, sino también a la "comunión y el bien de la pareja".
                        </p>
                    </div>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog3.webp" type="image/webp">
                        <source srcset="./build/img/blog3.jpg" typea="image/jpg">
                        <img loading="lazy" src="./build/img/blog3.webp" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <div>
                        <h4>Bautizo</h4>
                        <p>
                        El bautismo invita a toda persona que ha creído y tiene fe en Cristo a que confiese y se arrepienta de sus pecados, esto representa un acto de obediencia a Dios. 
                        </p>
                    </div>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog4.webp" type="image/webp">
                        <source srcset="./build/img/blog4.jpg" typea="image/jpg">
                        <img loading="lazy" src="./build/img/blog4.webp" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <div>
                        <h4>Misa Quinceañera</h4>
                        <p>
                            Este evento simboliza la presentación de la Quinceañera antes Dios y su comunidad y la promesa de honrar tanto su religión como a sí misma.
                        </p>
                    </div>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog5.webp" type="image/webp">
                        <source srcset="./build/img/blog5.jpg" typea="image/jpg">
                        <img loading="lazy" src="./build/img/blog5.webp" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <div>
                        <h4>Misa Funeraria</h4>
                        <p>
                            La misa consiste en la recepción del cuerpo, la liturgia de la palabra, la eucaristía y un acto de encomendar a Dios antes de la última despedida.
                        </p>
                    </div>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="./build/img/blog6.webp" type="image/webp">
                        <source srcset="./build/img/blog6.jpg" typea="image/jpg">
                        <img loading="lazy" src="./build/img/blog6.webp" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <div>
                        <h4>Misa de Graduacion</h4>
                        <!-- <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Alejandro Pacheco</span></p> -->
                        <p>
                            La Misa de graduación puede ser un momento privilegiado para darle gracias a Dios por esta meta importante que hemos alcanzado en nuestra vida
                        </p>
                    </div>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimonios</h3>
            <div class="testimonial">
                <blockquote>
                    Un lugar muy bonito para tener tu misa de Quinceañera.
                </blockquote>
                <p>- Martha Salazar</p>
            </div>
            <div class="testimonial">
                <blockquote>
                    Siento que le hace falta una remodelacion.
                </blockquote>
                <p>- Jesus Herrera</p>
            </div>
            <div class="testimonial">
                <blockquote>
                El cura que ofició la misa de las 10:00 am del 20 de julio dio un sermón muy agradable y hace que uno sí le ponga atención, tiene muy buena ventilación a pesar de no tener aire acondicionado.
                </blockquote>
                <p>- Paula Diaz</p>
            </div>
        </section>
    </div>
</main>

<?php
incluirTemplate('footer');
?>