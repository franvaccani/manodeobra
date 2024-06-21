<?php
session_start();
ini_set('memory_limit', '-1');
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL,"es_ES");
include("conect.php");
        $cliente = $_SESSION['perfil']['userid'];
        $nombre = $_POST['plan_nombre'];
        $apellido = $_POST['plan_apellido'];
        $telefono = $_POST['plan_telefono'];
        $provincia = $_POST['plan_provincia'];
        $localidad = $_POST['plan_localidad'];
        $calle = $_POST['plan_calle'];
        $numero = $_POST['plan_numero'];
        $fecha_actual = date("d-m-Y");

        $fecha_fin = date("d-m-Y",strtotime($fecha_actual."+ 1 month"));
        $periodo = "(".$fecha_actual." - ".$fecha_fin.")";
        $id = $_POST['plan_id'];
        $nombreplan="Plan Gratuito - Mano de Obra";
        if($id==2){$nombreplan="Plan Basico - Mano de Obra ".$periodo;$monto=300;
      }
        if($id==3){$nombreplan="Plan Avanzado - Mano de Obra ".$periodo;$monto=500;
      }

        $url_MP = 'https://api.mercadopago.com/checkout/preferences/';
        $autorizacion = "APP_USR-8717080692372524-072720-9e9c0c059e5d4937bdd48f105b1a80bc-18012976";        
        $head_MP =  array('Accept: application/json', 'Authorization: Bearer ' . $autorizacion);
        $head_MP[] = 'Content-Type: application/json';

        $data_MP ='{
          "items": [
            {
              "title": "'.$nombreplan.'",
              "description": "Suscripcion '.$nombreplan.' - ('.$periodo.')",
              "quantity": 1,
              "external_reference": '.$cliente.',
              "unit_price": '.$monto.'
            }
          ]

        }';
        //"external_reference": ""

/*
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_MP);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_MP );

     curl_setopt($ch, CURLOPT_ENCODING, "");
     curl_setopt($ch, CURLOPT_TIMEOUT, 0);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $head_MP);
*/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_MP);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $head_MP);
        curl_setopt($ch, CURLOPT_URL, $url_MP);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);
    //    print_r($response);
        $response = json_decode($response, true);
        $json = addslashes(json_encode($_POST));

        curl_close($ch);

        if (!$response['error']) {
          //  $data['content'] = $response;
            $link_mp = $response['init_point'];
            $idmp = $response['id'];


              $sql= "INSERT INTO pagos SET
              cliente_pagos='$cliente',
              link_pagos='$link_mp',
              estado_pagos='1',
              plan_pagos='$id',
              activo_pagos='1',
              idMP_pagos='$idmp',
              periodo_pagos = '$periodo',
              monto_pagos = '$monto',
              json_pagos='$json' ";

              $con = $link->query($sql);
              $ultimo_id = mysqli_insert_id($link);

            	if($con){
                echo $link_mp;
              }else{
                echo 'false';
              }



        } else {
            echo 'false';
        }


?>
