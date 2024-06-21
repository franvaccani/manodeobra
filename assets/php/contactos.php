<?php
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
session_start();
include("conect.php");

if($_SESSION['autenticado'] == 'SI'){

    function safe_json_encode($value, $options = 0, $depth = 512){
        $encoded = json_encode($value, $options, $depth); 
        
        switch (json_last_error()) {
            case JSON_ERROR_NONE: 
                return $encoded;
            case JSON_ERROR_DEPTH: 
                return 'Maximum stack depth exceeded'; // or trigger_error() or throw new Exception()
            case JSON_ERROR_STATE_MISMATCH: 
                return 'Underflow or the modes mismatch'; // or trigger_error() or throw new Exception()
            case JSON_ERROR_CTRL_CHAR:
                 return 'Unexpected control character found';
            case JSON_ERROR_SYNTAX: 
                return 'Syntax error, malformed JSON'; // or trigger_error() or throw new Exception()
            case JSON_ERROR_UTF8: $clean = utf8ize($value); 
                return safe_json_encode($clean, $options, $depth);
            default: 
                return 'Unknown error'; // or trigger_error() or throw new Exception()
	    }
    }



    function utf8ize($mixed) { 
        if (is_array($mixed)) { 
            foreach ($mixed as $key => $value) { 
                $mixed[$key] = utf8ize($value); 
            } 
        } else if (is_string ($mixed)){
            return utf8_encode($mixed); 
        } 
        return $mixed; 
    }

    $userid= $_SESSION['perfil']['userid'];
    $interlocutor= $_POST['id_contacto'];
    $sql= "SELECT * FROM contactos
        INNER JOIN usuarios on usuarios.id_usuario = contactos.idUser_contacto and usuarios.estado_usuario=1
        WHERE ((idUser_contacto = $interlocutor and idDestino_contacto = $userid) OR (idUser_contacto = $userid and idDestino_contacto = $interlocutor) ) and estado_contacto = 1  ";
    $con = $link->query($sql);

    $i=0;

    while($result = mysqli_fetch_assoc($con)){
        $data[$i]['fecha'] = date('d/m/Y H:i:s', strtotime($result['cuando_contacto']));
        $data[$i]['nombre'] = $result['nombre_contacto'];
        $data[$i]['mensaje'] = $result['mensaje_contacto'];
        $data[$i]['avatar'] = $result['avatar_usuario'];
        $data[$i]['oferta'] = $result['oferta_contacto'];
        $data[$i]['sql'] = $sql;

        if( $result['idUser_contacto']==$userid){
            $data[$i]['mio'] = true;
        }else{
            $data[$i]['mio'] = false;
        }
        $data[$i]['leido'] = $result['leido_contacto'];

        $i++;
    }

    header('Content-Type: application/json');

    $arreglo =  safe_json_encode($data);
    
    if ($arreglo){
        echo $arreglo;
    } else {
        echo "failed";
    }

}else{
	echo "failed";
}
?>
