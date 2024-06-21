<?php
session_start();
include("conect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar las variables de entrada para prevenir inyecciones SQL
    $nombre = $link->real_escape_string($_POST['nombre']);
    $telefono = $link->real_escape_string($_POST['telefono']);
    $email = $link->real_escape_string($_POST['email']);



    
    // Obtener el ID del usuario de la sesión
    $id = $_SESSION['perfil']['userid'];

    // Actualizar la tabla 'ofertas'
    $sqlOfertas = "UPDATE ofertas SET nombre_oferta='$nombre', email_oferta='$email', telefono_oferta='$telefono' WHERE quien_oferta='$id'";
    $success = false;

    if ($link->query($sqlOfertas) === TRUE) {
        echo "Se guardaron los datos en ofertas correctamente.";
    } else {
        echo "Error al actualizar ofertas: " . $link->error;
    }

    // Actualizar la tabla 'usuarios'
    $sqlUsuarios = "UPDATE usuarios SET nombre_usuario='$nombre', email_usuario='$email', telefono_usuario='$telefono' WHERE id_usuario='$id'";
    if ($link->query($sqlUsuarios) === TRUE) {
        $success = true;
        echo "Se guardaron los datos en usuarios correctamente.";

        // Actualizar la sesión con el nuevo nombre de usuario
        $_SESSION['perfil']['nombre'] = $nombre;
        $_SESSION['perfil']['email'] = $email;
        $_SESSION['perfil']['telefono'] = $telefono;
    } else {
        echo "Error al actualizar usuarios: " . $link->error;
    }

    // Cerrar la conexión
    $link->close();
}


// Verificar el contenido de la variable de sesión
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>