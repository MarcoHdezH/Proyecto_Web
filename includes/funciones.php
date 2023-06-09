<?php

define('TEMPLATES_URL',__DIR__.'/templates');
define('FUNCIONES_URL',__DIR__.'funciones.php');

function incluirTemplate( string $nombre){
    include TEMPLATES_URL."/$nombre.php";
}

function estaAutenticado(){
    session_start();
    $auth = $_SESSION['login'];
    if($auth){
        return true;
    }
    return false;
}

function cerrarSesion(){
    session_start();
    session_destroy();
}