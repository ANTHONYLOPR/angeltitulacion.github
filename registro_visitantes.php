<?php
// Configuración conexión MySQL (MAMP valores típicos)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "angel";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Revisar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir y sanitizar datos del formulario
$nombre = $conn->real_escape_string($_POST['nombre']);
$procedencia = $conn->real_escape_string($_POST['procedencia']);
$area = $conn->real_escape_string($_POST['area']);
$persona = $conn->real_escape_string($_POST['persona']);
$asunto = $conn->real_escape_string($_POST['asunto']);
$identificacion = $conn->real_escape_string($_POST['identificacion']);
$hora_entrada = $conn->real_escape_string($_POST['hora_entrada']);
$hora_salida = $conn->real_escape_string($_POST['hora_salida']);

// Consulta para insertar datos
$sql = "INSERT INTO visitantes (nombre, procedencia, area, persona, asunto, identificacion, hora_entrada, hora_salida)
        VALUES ('$nombre', '$procedencia', '$area', '$persona', '$asunto', '$identificacion', '$hora_entrada', '$hora_salida')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>