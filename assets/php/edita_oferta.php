<?php
session_start();
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");

$token = $_POST['token'];
$id = $_SESSION['perfil']['userid'];
$apodo = $_SESSION['perfil']['nombre'];
$telefono = $_SESSION['perfil']['telefono'];
$email = $_SESSION['perfil']['email'];

$rubro = $_POST['rubro'];
$titulo = $_POST['titulo'];
$slogan = $_POST['slogan'];
$provincia = $_POST['provincia'];
$foto = $_POST['foto'];
$localidad = $_POST['localidad'];
$detalle = $_POST['detalle'];
$oferta = $_POST['oferta'];
$id_oferta = $_POST['id'];

  if($oferta){
    $desde_promo = $_POST['desdeofe'];
    $hasta_promo = $_POST['hastaofe'];
    $tipo_promo = $_POST['tipoofe'];
    $valor_promo = $_POST['valorofe'];
    $titulo_promo = $_POST['tituloofe'];
    $detalle_promo = $_POST['detalleofe'];
  }

$sql= "UPDATE `ofertas` SET
  estado_oferta=1,
  quien_oferta=$id,
  pretador_oferta=$id,
  desde_oferta='0000-00-00 00:00:00',
  hasta_oferta='0000-00-00 00:00:00',
  categoria_oferta='$rubro',
  titulo_oferta='$titulo',
  detalle_oferta='$detalle',
  zona_oferta='$localidad',
  telefono_oferta='$telefono',
  nombre_oferta='$nombre',
  tags_oferta=0,
  email_oferta='$email',
  foto_oferta='$foto',
  slogan_oferta='$slogan',
  destaca_oferta='0' WHERE id_oferta = $id_oferta ";
  $con = $link->query($sql);

	if($con){
    $sql_update_img = "UPDATE ofertas_imagenes SET oferta_imgoferta='$id_oferta', tmp_imgoferta = null WHERE tmp_imgoferta ='$token' and estado_imgoferta = 1 ";
    $updateo = $link->query($sql_update_img);

  /*  if(mysqli_affected_rows($link) > 0){
  		echo 'true'; //;.$sql_promo.'-Oferta: '.$oferta;
    }else{
      echo 'false'.$sql_promo.'-Oferta: '.$oferta;
    }
  */


    if($oferta=='true'){
      $sql_promo = "INSERT INTO promociones SET estado_promocion='1', desde_promocion='$desde_promo', hasta_promocion='$hasta_promo', titulo_promocion='$titulo_promo', detalle_promocion='$detalle_promo', tipo_promocion='$tipo_promo', valor_promocion='$valor_promo', oferta_promocion='$id_oferta' ";
      $inserto_promo = $link->query($sql_promo);
    }else{
    //  echo 'entra sin oferta';
    }

    $buca_portada = $link->query("SELECT id_imgoferta FROM `ofertas_imagenes` WHERE `oferta_imgoferta` = $id_oferta order by id_imgoferta asc limit 1 ");

    if($row=mysqli_fetch_array($buca_portada)){
      $id_foto = $row['id_imgoferta'];
      $updateo_princi = $link->query("UPDATE ofertas SET foto_oferta='$id_foto' WHERE id_oferta = $id_oferta");
    }

    echo 'true';
  }else{
    echo 'false';//.$sql;
  }

?>
