<?php
session_start();
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");

$token = $_POST['token'];
$id = $_SESSION['perfil']['userid'];


$rubro = $_POST['rubro'];
$titulo = $_POST['titulo'];
$provincia = $_POST['provincia']; //
$localidad = $_POST['localidad']; //
$detalle = $_POST['detalle'];

$apodo = $_SESSION['perfil']['apodo'];
$telefono = $_SESSION['perfil']['telefono'];
$email = $_SESSION['perfil']['email'];

  $sql= "INSERT INTO `presupuestos` SET
  user_presupuesto='$id',
  rubro_presupuesto='$rubro',
  descripcion_prespuesto='$detalle',
  tope_presupuesto='0',
  titulo_presupuesto='$titulo',
  provincia_presupuesto='$provincia',
  localidad_presupuesto='$localidad',
  apodo_presupuesto='$apodo',
  telefono_presupuesto='$telefono',
  email_presupuesto='$email',
  estado_presupuesto='1' ";

  $con = $link->query($sql);
  $ultimo_id = mysqli_insert_id($link);

	if($con){
    $tomo_la_primera_foto = "SELECT id_imgpresu FROM presupuestos_imagenes  WHERE tmp_imgpresu ='$token' and estado_imgpresu = 1 order by id_imgpresu asc limit 1";
      $busco = $link->query($tomo_la_primera_foto);
      if($rr=mysqli_fetch_array($busco)){
          $id_fot = $rr['id_imgpresu'];
          $sql_update_img = "UPDATE presupuestos SET foto_presupuesto = $id_fot WHERE id_presupuesto='$ultimo_id'";
          $updateoimg = $link->query($sql_update_img);
      }
    $sql_update_img = "UPDATE presupuestos_imagenes SET presupuesto_imgpresu='$ultimo_id', tmp_imgpresu = null WHERE tmp_imgpresu ='$token' and estado_imgpresu = 1 ";
    $updateo = $link->query($sql_update_img);

    if(mysqli_affected_rows($link) > 0){
  		echo 'true';
    }else{
      echo 'false';
    }



  }else{ echo 'false2' . $sql; }

?>
