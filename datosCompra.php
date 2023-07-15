<?php
// Recibir los datos del formulario utilizando $_POST
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];

// Conectar a la base de datos utilizando las credenciales correctas
$servername = "localhost";
$username = "id21041810_seminario_bsas";
$password = "seminario_BSAS1";
$database = "id21041810_database_tickets";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar los datos en la tabla correspondiente utilizando una consulta SQL INSERT
$sql = "INSERT INTO tickets (nombre, apellido, email, cantidad, categoria) VALUES ('$nombre', '$apellido', '$email', $cantidad, '$categoria')";

if ($conn->query($sql) === TRUE) {
    echo "Los datos se insertaron correctamente.";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

$conn->close();
?>