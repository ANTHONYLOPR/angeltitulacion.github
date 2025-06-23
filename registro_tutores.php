<?php
// Configuración de la conexión
$servername = "localhost";
$username = "root";
$password = "root"; // Por defecto en MAMP no suele tener contraseña
$dbname = "angel";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener y limpiar datos del formulario
$nombre = $conn->real_escape_string($_POST['nombre']);
$procedencia = $conn->real_escape_string($_POST['procedencia']);
$area = $conn->real_escape_string($_POST['area']);
$persona = $conn->real_escape_string($_POST['persona']);
$asunto = $conn->real_escape_string($_POST['asunto']);
$identificacion = $conn->real_escape_string($_POST['identificacion']);
$alumno = $conn->real_escape_string($_POST['alumno']);
$hora_entrada = $conn->real_escape_string($_POST['hora_entrada']);
$hora_salida = $conn->real_escape_string($_POST['hora_salida']);

// Consulta para insertar datos
$sql = "INSERT INTO tutores (nombre, procedencia, area, persona, asunto, identificacion, alumno, hora_entrada, hora_salida)
        VALUES ('$nombre', '$procedencia', '$area', '$persona', '$asunto', '$identificacion', '$alumno', '$hora_entrada', '$hora_salida')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente.";
} else {
    echo "Error al guardar el registro: " . $conn->error;
}

$conn->close();
?>