<?php


$url_MP = 'https://api.mercadopago.com/checkout/preferences/';
$autorizacion = "APP_USR-8717080692372524-072720-9e9c0c059e5d4937bdd48f105b1a80bc-18012976";
$head_MP =  array('Accept: application/json', 'Authorization: Bearer ' . $autorizacion);
$head_MP[] = 'Content-Type: application/json';
//Descomentar
$data_MP = 'payments/search?sort=date_created&criteria=desc&limit=500&status=approved&status_detail=accredited&offset=' . $offset;



//$data['estado']=true;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url_MP . $data_MP);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $head_MP);
$response = curl_exec($ch);
curl_close($ch);

$response = json_decode($response, 1);

if (!$response['error']) {
    $data['content'] = $response;
}
 ?>
