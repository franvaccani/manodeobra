<?php
//notificaciones
$email_from = "sistema@manodeobra.ar";
$fromname = "Notificaciones Mano de Obra";
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf8\n";
$headers .= "X-Priority: 3\n";
$headers .= "X-MSMail-Priority: Normal\n";
$headers .= "X-Mailer: php\n";
$headers .= "From: \"".$fromname."\" <".$email_from .">\n";

$accion= "Se registro un nuevo correo: ".$_POST['email_newsletter']."<br>";
mail('info@manodeobra.ar','Nuevo registro de correo',$accion,$headers);

header('Location: index.html');
 ?>
