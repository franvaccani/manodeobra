<?php
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");


function safe_json_encode($value, $options = 0, $depth = 512){
	$encoded = json_encode($value, $options, $depth); switch (json_last_error()) {
		case JSON_ERROR_NONE: return $encoded; case JSON_ERROR_DEPTH: return 'Maximum stack depth exceeded'; // or trigger_error() or throw new Exception()
		case JSON_ERROR_STATE_MISMATCH: return 'Underflow or the modes mismatch'; // or trigger_error() or throw new Exception()
		case JSON_ERROR_CTRL_CHAR: return 'Unexpected control character found';
		case JSON_ERROR_SYNTAX: return 'Syntax error, malformed JSON'; // or trigger_error() or throw new Exception()
		case JSON_ERROR_UTF8: $clean = utf8ize($value); return safe_json_encode($clean, $options, $depth); default: return 'Unknown error'; // or trigger_error() or throw new Exception()
	 } }



 function utf8ize($mixed) { if (is_array($mixed)) { foreach ($mixed as $key => $value) { $mixed[$key] = utf8ize($value); } } else if (is_string ($mixed)) { return utf8_encode($mixed); } return $mixed; }


  $oferta = $_POST['id'];


  $sql= "SELECT * FROM `ofertas` INNER JOIN ciudad on id_ciudad = ofertas.zona_oferta WHERE `id_oferta` = $oferta AND `estado_oferta` = 1 ";
  $con = $link->query($sql);

  if($result=mysqli_fetch_assoc($con)){
    $data['titulo'] = $result['titulo_oferta'];
		$data['rubro'] = $result['categoria_oferta'];
		$data['slogan'] = $result['slogan_oferta'];
		$data['detalle'] = $result['detalle_oferta'];
		$data['provincia'] = $result['provincia_id'];
		$data['localidad'] = $result['id_ciudad'];
		//$data[$i]['localidad'] = $result['s'];
		$data['id'] = $result['id_oferta'];

		$sql_fotos= "SELECT url_imgoferta FROM `ofertas_imagenes` WHERE `estado_imgoferta` = 1 AND `oferta_imgoferta` = $oferta";
		$con_img = $link->query($sql_fotos);
		$i=0;
		while($fot = mysqli_fetch_assoc($con_img)){
			$data['imagenes'][$i] = $fot['url_imgoferta'];
			$i++;
		}

  }

  header('Content-Type: application/json');

  $arreglo =  safe_json_encode($data);
    if ($arreglo){
        echo $arreglo;
      } else {
             echo "failed";
             }


?>
