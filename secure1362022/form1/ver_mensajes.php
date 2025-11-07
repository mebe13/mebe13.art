<?php
// (opcional) proteger con contraseña
session_start();
$clave = "beme2025";
if (!isset($_POST['pass']) && !isset($_SESSION['acceso'])) {
    echo '<form method="POST" style="text-align:center;margin-top:50px">
            <input type="password" name="pass" placeholder="Contraseña de acceso">
            <button type="submit">Entrar</button>
          </form>';
    if (!empty($_POST['pass']) && $_POST['pass'] === $clave) {
        $_SESSION['acceso'] = true;
        header("Location: ver_mensajes.php");
    }
    exit;
}

// 🔧 Conexión a la base
$servername = "127.0.0.1";
$username   = "u558033723_mebe";
$password   = "BeMe2025!";
$dbname     = "u558033723_formulario";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);
if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

// 🔍 Obtener mensajes
$result = $conn->query("SELECT * FROM mensajes ORDER BY fecha DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mensajes recibidos</title>
  <style>
    body { font-family: Arial; background: #f5f5f5; padding: 20px; }
    h2 { color: #0095ff; }
    table { border-collapse: collapse; width: 100%; background: white; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background: #ff8400; color: white; }
  </style>
</head>
<body>
  <h2>📩 Mensajes recibidos</h2>
  <table>
    <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Mensaje</th><th>Fecha</th></tr>
    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nombre']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= nl2br(htmlspecialchars($row['mensaje'])) ?></td>
        <td><?= $row['fecha'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
<?php $conn->close(); ?>
