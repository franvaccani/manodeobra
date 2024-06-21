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
    if (move_uploaded_file($_FILES["img"]["tmp_name"], "../img/presu/".$nombre_file)) {
      $imagen = "assets/img/presu/".$nombre_file;
    }else{echo 'no se cargo el archivo';}
}else{echo 'no se acepta el formato de archivo';}





  $sql= "INSERT INTO `presupuestos_imagenes` SET url_imgpresu='$imagen', estado_imgpresu='1', presupuesto_imgpresu='0', quien_imgpresu='$id', tmp_imgpresu='$token' ";
  $con = $link->query($sql);
  if($con){
		echo 'true@'.$nombre_file;
	}else{ echo $sql; //'false'; //$sql;
	}
?>
