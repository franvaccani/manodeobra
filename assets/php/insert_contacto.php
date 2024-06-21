<?php

session_start();
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");

$token = $_POST['token'];
$id = $_SESSION['perfil']['userid'];


$nombre = $_POST['nombre'];
$email_form = $_POST['email'];
$provincia = $_POST['zona']; //
$direccion = $_POST['direccion']; //
$mensaje = $_POST['mensaje'];
$oferta = $_POST['oferta'];

$busco_destino= "SELECT pretador_oferta as destino FROM ofertas WHERE id_oferta = $oferta and estado_oferta = 1";
$encuentro = $link->query($busco_destino);

if($r=mysqli_fetch_assoc($encuentro)){
  $destino = $r['destino'];
}else{
  $destino = null;
}

$userid = $_SESSION['perfil']['userid'];

$sql= "INSERT INTO contactos SET
idUser_contacto='$userid',
nombre_contacto='$nombre',
idDestino_contacto=$destino,
email_contacto='$email_form',
direccion_contacto='$direccion',
mensaje_contacto='$mensaje',
zona_contacto='$provincia',
estado_contacto=1,
oferta_contacto='$oferta'
";

$con = $link->query($sql);
$ultimo_id = mysqli_insert_id($link);

if($con){
    echo 'true';
}else{
    echo 'false' . $sql.' || '.$busco_destino; 
}

?>