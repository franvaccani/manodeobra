<?php
session_start();
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");

$id = $_SESSION['perfil']['userid'];
  $avatar ="";
  $nombre_file='false';
if (($_FILES["f"]["type"] == "image/pjpeg")
    || ($_FILES["f"]["type"] == "image/jpeg")
    || ($_FILES["f"]["type"] == "image/png")
    || ($_FILES["f"]["type"] == "image/gif")) {
			$nombre_file = $id."_".$_FILES['f']['name'];
    if (move_uploaded_file($_FILES["f"]["tmp_name"], "../img/user/".$nombre_file)) {
        //moree code here...
      //  echo 'entro a insertar archivo';
      $avatar = " avatar_usuario	='assets/img/user/$nombre_file' ";
    }else{echo 'no se cargo el archivo';}
}else{echo 'no se acepta el formato de archivo';}





  $sql= "UPDATE usuarios SET
	$avatar WHERE id_usuario = $id";
  $con = $link->query($sql);
	if($con){
		echo $nombre_file;
    $_SESSION['perfil']['avatar']= 'assets/img/user/'.$nombre_file;
	}else{ echo $sql; //'false'; //$sql;
	}

?>
