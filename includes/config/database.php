<?php 

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost','root','root','iglesia');
    if(!$db){
        echo "Erro de Conexion con Base de Datos";
        exit;
    }
    return $db;
}