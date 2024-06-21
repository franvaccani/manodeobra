<?php
session_start();
require_once("conect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_token = $_POST['id_token'];

    // Verificar el token de Google con el endpoint de Google utilizando cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://oauth2.googleapis.com/tokeninfo');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['id_token' => $id_token]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['email'])) {
        $email = $data['email'];

        // Verificar si el email está registrado en la base de datos
        $sql_login = "SELECT * FROM usuarios WHERE email_usuario = '$email'";
        $consulta = $link->query($sql_login);

        if ($consulta->num_rows > 0) {
            // Usuario encontrado en la base de datos, iniciar sesión
            $con = $consulta->fetch_assoc();
            $_SESSION['autorizado'] = 1;
            $_SESSION['perfil'] = $con;
            echo json_encode(['success' => true]);
            exit;
        } else {
            // Usuario no encontrado en la base de datos, redirigir al formulario de registro
            echo json_encode(['success' => false, 'message' => 'Usuario no registrado']);
            exit;
        }
    } else {
        // El token no es válido o el email no está presente, manejar el error
        echo json_encode(['success' => false, 'message' => 'Token de Google no válido']);
        exit;
    }
}
?>