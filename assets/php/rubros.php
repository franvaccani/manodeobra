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


  $sql= "SELECT id_categoria as id, nombre_categoria as nombre FROM `categorias`  WHERE estado_categoria = 1
ORDER BY `categorias`.`nombre_categoria` ASC;";
  $con = $link->query($sql);
	$i=0;
  while($result=mysqli_fetch_assoc($con)){
    $data[$i]['nombre'] = $result['nombre'];
		$data[$i]['id'] = $result['id'];
		$i++;
  }

  header('Content-Type: application/json');

  $arreglo =  safe_json_encode($data);
    if ($arreglo){
        echo $arreglo;
      } else {
             echo "failed";
             }


?>
