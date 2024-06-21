<?php
session_start();
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");

$token = $_POST['token'];

$nombre = $_SESSION['perfil']['apodo'];
$email_form = $_SESSION['perfil']['email'];
$provincia = $_SESSION['perfil']['zona'];
$direccion = $_SESSION['perfil']['direccion'];

$mensaje = $_POST['msg'];
$destino = $_POST['destino'];

$userid = $_SESSION['perfil']['userid'];

  $sql= "INSERT INTO contactos SET
  idUser_contacto=$userid,
  idDestino_contacto=$destino,
  nombre_contacto='$nombre',
  email_contacto='$email_form',
  direccion_contacto='$direccion',
  mensaje_contacto='$mensaje',
  zona_contacto='$provincia',
  estado_contacto=1,
  oferta_contacto= null
  ";

  $con = $link->query($sql);
  $ultimo_id = mysqli_insert_id($link);

	if($con){
echo 'true';
  }else{ echo 'false' . $sql; }

?>
