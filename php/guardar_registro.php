<?php
/*
$servername = "localhost"; // o el host que te dé tu hosting
$username   = "root";      // tu usuario de MySQL
$password   = "";          // tu contraseña de MySQL
$dbname     = "4667961_universidad";
*/
// Conexión
//$conn = new mysqli("localhost", "root", "", "4667961_universidad");

// Conexión a la base
//$conexion = new mysqli("localhost", "root", "", "4667961_universidad");


$servername = "fdb1034.awardspace.net";
$username = "4667961_universidad";
$password = "xP?vzuHE10exkEOS";
$dbname = "4667961_universidad";

// Conexión web
$conexion = new mysqli($servername, $username, $password, $dbname);



// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo_persona'];
$movimiento = $_POST['movimiento'];
$evento = $_POST['evento'];

// Insertar en la tabla
$sql = "INSERT INTO registro_persona (nombre, tipo_persona, movimiento, evento) 
        VALUES ('$nombre', '$tipo', '$movimiento', '$evento')";

if ($conexion->query($sql) === TRUE) {
    // Redirige de vuelta al index.php
    header("Location: ../index.php");
    //header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>