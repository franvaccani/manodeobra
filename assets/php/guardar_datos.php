<?php
// Incluir el archivo de conexión a la base de datos
include("conect.php");

// Consulta SQL para crear la tabla si no existe
$sql_create_table = "CREATE TABLE IF NOT EXISTS tabla_datos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre1 VARCHAR(255) NOT NULL,
    email1 VARCHAR(255) NOT NULL,
    numero1 VARCHAR(20) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Ejecutar la consulta SQL para crear la tabla
if ($link->query($sql_create_table) === TRUE) {
    echo "La tabla tabla_datos ha sido creada exitosamente<br>";

    // Verificar si se han enviado datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombreprueba = $_POST["nombre1"];
        $emailprueba = $_POST["email1"];
        $numeroprueba = $_POST["numero1"];

        // Consulta SQL para insertar datos en la tabla
        $sql_insert_data = "INSERT INTO tabla_datos (nombre1, email1, numero1) VALUES ('$nombreprueba', '$emailprueba', '$numeroprueba')";

        // Ejecutar la consulta SQL para insertar datos
        if ($link->query($sql_insert_data) === TRUE) {
            echo "Los datos se insertaron correctamente en la tabla<br>";
        } else {
            echo "Error al insertar los datos: " . $link->error . "<br>";
        }
    }
} else {
    echo "Error al crear la tabla: " . $link->error . "<br>";
}

// Cerrar la conexión
$link->close();
?>