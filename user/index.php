<?php
require '../includes/funciones.php';
$auth = estaAutenticado();
if(!$auth){
    header('Location: /');
}else{
    if($_SESSION['type'] ==='users'){
        header('Location: ');
    }else{
        if($_SESSION['type'] ==='admin'){
            header('Location: /admin');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Iniciaste Sesion como usuario</h1>
    
</body>
</html>