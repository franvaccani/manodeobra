<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");

// Datos de conexión a la base de datos
$host = "localhost";
$username = "manodeob_hernan";
$password = "dBRjeh62tt7c";
$database = "manodeob_web";

// Conexión a la base de datos
$link = mysqli_connect($host, $username, $password, $database);
if (!$link) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Comprobar si la conexión a la base de datos fue exitosa
if (!$link) {
    die("La selección de la base de datos falló: " . mysqli_error($link));
}

// Establecer juego de caracteres
mysqli_set_charset($link, 'utf8');

// Aquí puedes continuar con el resto de tu código
?>