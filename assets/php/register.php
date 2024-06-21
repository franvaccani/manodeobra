<?php
session_start();
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");

  $apellido = $link -> real_escape_string($_POST['a']);
  $nombre = $link -> real_escape_string($_POST['n']);
  $mail = $link -> real_escape_string($_POST['u']);
	$password =  $link -> real_escape_string($_POST['p']);
  $telefono=  $link -> real_escape_string($_POST['t']);
  $encriptada= md5($password);
  $sql= "SELECT * FROM usuarios WHERE email_usuario = '$mail' and estado_usuario =1 ";
  $ip = $_SERVER['REMOTE_ADDR'] ;
	$result=$link->query($sql);
if($registro = mysqli_fetch_array($result)){
  echo 'false';
}
  else{
    $sql_inserta = "INSERT INTO usuarios set
email_usuario='$mail',
pass_usuario='$encriptada',
nombre_usuario='$nombre',
telefono_usuario='$telefono',
apellido_usuario='$apellido',
activo_usuario='1',
ip_usuario = '$ip',
estado_usuario='1',
token_usuario ='I-3a2ea50eb93c5444444f1a0c81405424a7fc9355d682',
grupo_usuario='2'
";
    $inserto = $link->query($sql_inserta);
    
    if($inserto){
      echo 'true';
    }else{
      echo 'false '. $sql_inserta;
    }
  }




?>
