<?php
<<<<<<< HEAD
session_start();

// (opcional) proteger con contraseña
$clave = "beme2025";

if (!isset($_SESSION['acceso'])) {
    // Si el usuario no ha iniciado sesión, mostrar formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pass'])) {
        if ($_POST['pass'] === $clave) {
            $_SESSION['acceso'] = true;
            header("Location: ver_mensajes.php");
            exit;
        } else {
            echo '<p style="color:red;text-align:center;">Contraseña incorrecta</p>';
        }
    }

    echo '
    <form method="POST" style="text-align:center;margin-top:50px">
        <input name="pass" placeholder="Contraseña de acceso" type="password" style="padding:10px;border-radius:5px;">
        <button type="submit" style="padding:10px 20px;background:#0095ff;color:#fff;border:none;border-radius:5px;cursor:pointer;">Entrar</button>
    </form>';
    exit;
}

// 🔧 Conexión a la base de datos
=======
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
>>>>>>> 24710092f98a26ad09287a9e68ff82c142d55939
$servername = "127.0.0.1";
$username   = "u558033723_mebe";
$password   = "BeMe2025!";
$dbname     = "u558033723_formulario";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);
if ($conn->connect_error) {
<<<<<<< HEAD
    die("❌ Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

=======
    die("Error: " . $conn->connect_error);
}

>>>>>>> 24710092f98a26ad09287a9e68ff82c142d55939
// 🔍 Obtener mensajes
$result = $conn->query("SELECT * FROM mensajes ORDER BY fecha DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<<<<<<< HEAD
<meta charset="utf-8"/>
<title>Mensajes recibidos</title>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
<meta name="description" content="Mensajes recibidos desde el formulario de contacto BeMe13."/>
<style>
body {
  font-family: 'Poppins', sans-serif;
  background: #f5f5f5;
  padding: 20px;
}
h2 {
  color: #0095ff;
}
table {
  border-collapse: collapse;
  width: 100%;
  background: white;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 0 8px rgba(0,0,0,0.1);
}
th, td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: left;
}
th {
  background: #ff8400;
  color: white;
}
td {
  vertical-align: top;
}
.logout {
  display:inline-block;
  margin-bottom:15px;
  background:#ff8400;
  color:#fff;
  text-decoration:none;
  padding:8px 18px;
  border-radius:5px;
}
</style>
</head>
<body>
<a class="logout" href="?salir=1">Cerrar sesión</a>
<h2>📩 Mensajes recibidos</h2>
<table>
<tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Email</th>
  <th>Mensaje</th>
  <th>Fecha</th>
</tr>
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
<?php
if (isset($_GET['salir'])) {
    session_destroy();
    header("Location: ver_mensajes.php");
    exit;
}
$conn->close();
?>
=======
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
>>>>>>> 24710092f98a26ad09287a9e68ff82c142d55939
