<?php
/*
$servername = "localhost";
$username   = "root";
$password   = "";
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

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener registros
$sql = "SELECT nombre, tipo_persona, movimiento, evento, fecha_hora 
        FROM registro_persona ORDER BY fecha_hora DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $fecha = date("d/m/Y", strtotime($row['fecha_hora']));
        $hora  = date("H:i", strtotime($row['fecha_hora']));
        echo "
        <div class='tarjeta'>
            <div class='fila'>
              <span><strong></strong> {$row['movimiento']}</span>
              <span><strong></strong> $hora</span>
            </div>
            <div class='fila'>
              <span><strong></strong> {$row['nombre']}</span>
              <span><strong></strong> {$row['evento']}</span>
            </div>
            <div class='fila'>
              <span><strong></strong> {$row['tipo_persona']}</span>
              <span><strong></strong> $fecha</span>
            </div>
        </div>
        ";
    }
} else {
    echo "No hay registros todavía.";
}

$conn->close();
?>
