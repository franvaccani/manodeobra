<?php
session_start();
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");

$token = $_POST['token'];
$id = $_SESSION['perfil']['userid'];
  $imagen ="";
  $nombre_file='false';
if (($_FILES["img"]["type"] == "image/pjpeg")
    || ($_FILES["img"]["type"] == "image/jpeg")
    || ($_FILES["img"]["type"] == "image/png")
    || ($_FILES["img"]["type"] == "image/gif")) {
			$nombre_file = $id."_".date('YmdHis');
    if (move_uploaded_file($_FILES["img"]["tmp_name"], "../img/works/".$nombre_file)) {
        //moree code here...
      //  echo 'entro a insertar archivo';
      $imagen = "assets/img/works/".$nombre_file;

    }else{echo 'no se cargo el archivo';}
}else{echo 'no se acepta el formato de archivo';}



  $sql= "INSERT INTO `ofertas_imagenes` SET url_imgoferta='$imagen', estado_imgoferta='1', oferta_imgoferta='0', quien_imgoferta='$id', tmp_imgoferta='$token' ";
  $con = $link->query($sql);
	if($con){
		echo 'true@'.$nombre_file;
	}else{ echo $sql; //'false'; //$sql;
	}

?>
