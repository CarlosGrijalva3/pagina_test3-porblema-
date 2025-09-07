<?php
/*
// Conexión a la base de datos
$servername = "localhost"; // o el host que te dé tu hosting
$username   = "root";      // tu usuario de MySQL
$password   = "";          // tu contraseña de MySQL
$dbname     = "4667961_universidad";

// Conexión
$conn = new mysqli($servername, $username, $password, $dbname);
*/

$servername = "fdb1034.awardspace.net";
$username = "4667961_universidad";
$password = "xP?vzuHE10exkEOS";
$dbname = "4667961_universidad";

// Conexión web
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre       = $_POST['nombre'];
$tipo_persona = $_POST['tipo_persona'];
$movimiento   = $_POST['movimiento'];
$evento       = $_POST['evento'];

// Insertar en la base
$sql = "INSERT INTO registro_persona (nombre, tipo_persona, movimiento, evento)
        VALUES ('$nombre', '$tipo_persona', '$movimiento', '$evento')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado correctamente <br>";
    echo "<a href='index.html'>Volver</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

