<?php

require '../../includes/config/database.php';
$db = conectarDB();

$query = "SELECT * FROM servicio";

$consulta = mysqli_query($db, $query);

$id;
$contador = [];
$nombres = [];
while ($row = mysqli_fetch_assoc($consulta)) {
    $id = $row['id'];
    $aux = mysqli_query($db, "SELECT * FROM inforeservacion WHERE servicioID='$id'");
    $contador[] = $aux->num_rows;
    $nombres[] = $row['servicio'];
}

$respuesta = [
    "etiquetas" => $nombres,
    "datos" => $contador,
];
echo json_encode($respuesta);
?>