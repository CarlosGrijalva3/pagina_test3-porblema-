<?php

//$conexion = new mysqli("localhost", "root", "", "4667961_universidad");
// Datos de conexión
$servername = "fdb1034.awardspace.net";
$username   = "4667961_universidad";
$password   = "xP?vzuHE10exkEOS";
$dbname     = "4667961_universidad";

// Conexión
$conexion = new mysqli($servername, $username, $password, $dbname);


// Verifica conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Consulta para obtener los registros más recientes
$sql = "SELECT nombre, tipo_persona, movimiento, evento, fecha_registro 
        FROM registro_persona 
        ORDER BY fecha_registro DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Acceso</title>
  <link rel="stylesheet" href="css/index_color.css">
</head>

<body>

  <h1 style="text-align:center;">Registro de Acceso</h1>

  <!-- Formulario -->
  <form action="php/guardar_registro.php" method="POST" class="form-centro">
    <!--input type="text" name="nombre" placeholder="nombre" required-->
    <input type="text" name="nombre" placeholder="nombre" required maxlength="16">

    
    <select name="tipo_persona" required>
      <option value="" disabled selected>Tipo</option>
      <option value="empleado">empleado</option>
      <option value="visitante">visitante</option>      
      <option value="visitante">invitado</option>

    </select>

    <select name="movimiento" required>
      <option value="" disabled selected>Movimiento</option>
      <option value="entrada">entrada</option>
      <option value="salida">salida</option>
    </select>

    <!--input type="text" name="evento" placeholder="evento"-->
    <input type="text" name="evento" placeholder="evento" maxlength="12">

    <button type="submit">Registrar</button>
  </form>

  <!-- Línea separadora -->
  <div class="separador"></div>

  <!-- Tarjetas dinámicas -->
  <?php if ($resultado->num_rows > 0): ?>
      <?php while ($fila = $resultado->fetch_assoc()): ?>
          <?php
            $fecha = date("d/m/Y", strtotime($fila['fecha_registro']));
            $hora = date("H:i", strtotime($fila['fecha_registro']));
          ?>
          <div class="tarjeta">
            <div class="fila"> 
              <span><strong></strong> <?php echo ucfirst($fila['movimiento']); ?></span>
              <span><strong></strong> <?php echo $hora; ?></span>
            </div>
            <div class="fila">
              <span><strong></strong> ➤ <?php echo $fila['nombre']; ?></span>
              <span><strong></strong><?php echo $fila['evento'] ?: "-"; ?></span>
            </div>
            <div class="fila">
              <span><strong></strong> <?php echo $fila['tipo_persona']; ?></span>
              <span><strong></strong> <?php echo $fecha; ?></span>
            </div>
          </div>
      <?php endwhile; ?>
  <?php else: ?>
      <p style="text-align:center;">No hay registros aún.</p>
  <?php endif; ?>

</body>
</html>

<?php $conexion->close(); ?>
