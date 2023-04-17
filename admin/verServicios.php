<?php
require '../includes/funciones.php';
require '../includes/config/database.php';
$auth = estaAutenticado();
if (!$auth) {
    header('Location: /');
} else {
    if ($_SESSION['type'] === 'users') {
        header('Location: /user');
    } else {
        if ($_SESSION['type'] === 'admin') {
            header('Location: ');
        }
    }
}
incluirTemplate('headerA');
$db = conectarDB();

$acciones = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        $acciones[] = "Servicio Eliminado Exitosamente";
        $delete = "DELETE FROM servicio WHERE id=$id";
        $resultado = mysqli_query($db, $delete);
        header('Location: ');
    }
}
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
                            <source srcset="/build/img/<?php echo $row['imagen']?>.webp" type="image/webp">
                            <source srcset="/build/img/<?php echo $row['imagen']?>.jpg" typea="image/jpg">
                            <img loading="lazy" src="/build/img/<?php echo $row['imagen']?>.webp" alt="Texto Entrada Blog">
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
            <a href="/admin/servicios.php" class="boton-verde-block">Regresar</a>
        </section>
    </div>
</main>

<?php
incluirTemplate('footerA');
?>