<?php
// Datos de conexión: cambia si es necesario
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "angel";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$control = $_POST['control'];
$grupo = $_POST['grupo'];
$asunto = $_POST['asunto'];
$motivo = $_POST['motivo'];
$fecha = $_POST['fecha'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];

// Preparar y ejecutar consulta
$sql = "INSERT INTO alumnos (nombre, control, grupo, asunto, motivo, fecha, entrada, salida)
        VALUES ('$nombre', '$control', '$grupo', '$asunto', '$motivo', '$fecha', '$entrada', '$salida')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>