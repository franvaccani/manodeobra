<?php
$nombre = $_POST['name'];
$mail = $_POST['mail'];
$apellido = $_POST['apellidos'];
$mensaje = $_POST['message'];


$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";


$mensaje = "Enviado el día " . date('d/m/Y') . " \r\n";
$mensaje .= "Este mensaje fue enviado por " . $nombre . $apellido . " \r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "Mensaje: " . $_POST['message'] . " \r\n";

$para = 'simonetchegno@gmail.com';
$asunto = 'Mensaje enviado desde la Web Mano de Obra por ' . $nombre;

//Enviamos el mensaje y comprobamos el resultado
if (@mail($para, $asunto, utf8_decode($mensaje), $header)) {
//Si el mensaje se envía muestra una confirmación
header('location: enviar.html');
}else {
    echo "Ocurrió un error inesperado.";
}

?>