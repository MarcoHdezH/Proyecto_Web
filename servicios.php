<?php
require './includes/funciones.php';
require './includes/config/database.php';
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
$db = conectarDB();
incluirTemplate('header');
?>

<main>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h1>Servicios Parroquiales</h1>
            <?php $result = mysqli_query($db, "SELECT * FROM servicio") ?>
            <?php while($row=mysqli_fetch_array($result)):?>
                <article class="entrada-blog">
                    <div class="imagen">
                        <picture>
                            <source srcset="./build/img/<?php echo $row['imagen']?>.webp" type="image/webp">
                            <source srcset="./build/img/<?php echo $row['imagen']?>.jpg" typea="image/jpg">
                            <img loading="lazy" src="./build/img/<?php echo $row['imagen']?>.webp" alt="Texto Entrada Blog">
                        </picture>
                    </div>

                    <div class="texto-entrada">
                        <div>
                            <h4><?php echo $row['servicio'] ?></h4>
                            <p><?php echo $row['descripcion']?></p>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
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
                    Siento que le hace falta una remodelacion al edificio.
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