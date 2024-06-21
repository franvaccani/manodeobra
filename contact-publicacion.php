<?php

include("conect.php");

// Input validation and sanitization
$tomo_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Prepared statement to prevent SQL injection
$sql_detalle = "SELECT *, CONCAT(ciudad.ciudad_nombre,', ',provincia.provincia_nombre) as zona FROM `ofertas`
INNER JOIN categorias on categorias.id_categoria = ofertas.categoria_oferta and estado_categoria = 1
INNER JOIN ciudad on ciudad.id_ciudad = ofertas.zona_oferta
INNER JOIN provincia on provincia.id_provincia = ciudad.provincia_id
WHERE `id_oferta` = ? AND `estado_oferta` = 1";

if ($stmt = $link->prepare($sql_detalle)) {
    $stmt->bind_param("i", $tomo_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $oferta = $result->fetch_assoc();
    $stmt->close();
}

if (!$oferta) {
    echo "No se encontró la oferta o no está activa.";
    exit;
}

echo "Email de la oferta: " . htmlspecialchars($oferta['email_oferta']) . "<br>";
echo "Telefono: " . htmlspecialchars($oferta['telefono_oferta']) . "<br>";

// Check if POST variables are set
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$mail = isset($_POST['email']) ? $_POST['email'] : '';
$mensaje = isset($_POST['message']) ? $_POST['message'] : '';

// Additional input validation could be added here

echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
echo "Email: " . htmlspecialchars($mail) . "<br>";
echo "Mensaje: " . htmlspecialchars($mensaje) . "<br>";

$header = 'From: ' . $mail . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje_completo = "Enviado el día " . date('d/m/Y') . "\r\n";
$mensaje_completo .= "Este mensaje fue enviado por " . $nombre  . "\r\n";
$mensaje_completo .= "Su e-mail es: " . $mail . "\r\n";
$mensaje_completo .= "Mensaje: " . $mensaje . "\r\n";

$para = $oferta['email_oferta'];
$asunto = 'Mensaje enviado desde la Web Mano de Obra por ' . $nombre;

// Send the message and check the result
if (mail($para, $asunto, $mensaje_completo, $header)) {
    // If the message is sent, show a confirmation
    header('Location: enviar.html');
    exit;
} else {
    echo "Ocurrió un error inesperado al enviar el correo electrónico.";
}

?>