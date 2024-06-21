<?php
session_start();
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");

// data: "msg="+mensaje+"&titulo="+titulo_calif+"&respo="+responsabilidad+"&hs="+horarios+"&pz="+plazos+"&limp="+limpieza+"&mod="+modales+"&precio="+precio,
$nombre = $_SESSION['perfil']['apodo'];
$email_form = $_SESSION['perfil']['email'];
$provincia = $_SESSION['perfil']['zona'];
$direccion = $_SESSION['perfil']['direccion'];

$mensaje = $_POST['msg'];
$titulo = $_POST['titulo'];
$oferta = $_POST['oferta'];

$busco_destino= "SELECT pretador_oferta as prestador FROM ofertas WHERE id_oferta = $oferta and estado_oferta = 1";
$encuentro = $link->query($busco_destino);
if($r=mysqli_fetch_assoc($encuentro)){
  $prestador = $r['prestador'];
}else{
  $prestador = null;
}


$responsabilidad = $_POST['respo'];
$horarios = $_POST['hs'];
$plazos = $_POST['pz'];
$limpieza = $_POST['limp'];
$modales = $_POST['mod'];
$precio = $_POST['precio'];

$total = $responsabilidad+$horarios+$plazos+$limpieza+$modales+$precio;
$puntaje = ($total*10)/60;

$userid = $_SESSION['perfil']['userid'];

  $sql= "INSERT INTO calificaciones SET
  user_calificacion='$userid',
  puntaje_calificacion='$puntaje',
  estado_calificacion=1,
  titulo_calificacion='$titulo',
  detalle_calificacion='$mensaje',
  prestador_calificacion=$prestador,
  oferta_calificacion=$oferta,
  plazo_calificacion=$plazos,
  respon_calificacion=$responsabilidad,
  prol_calificacion=$limpieza,
  horario_calificacion=$horarios,
  modale_calificacion=$modales,
  calidad_calificacion=$precio;
  ";

  $con = $link->query($sql);
  $ultimo_id = mysqli_insert_id($link);

	if($con){
echo 'true';
  }else{ echo 'false' . $sql; }

?>
