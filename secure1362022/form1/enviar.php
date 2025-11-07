<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🔧 Conexión a la base de datos
$servername = "127.0.0.1";
$username   = "u558033723_mebe";
$password   = "BeMe2025!";
$dbname     = "u558033723_formulario";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}

// 📨 Capturar datos del formulario
$nombre  = $_POST['nombre'] ?? '';
$email   = $_POST['email'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

// Validar campos
if (empty($nombre) || empty($email) || empty($mensaje)) {
    echo "<h3 style='color:red;font-family:sans-serif;'>⚠️ Por favor, completa todos los campos.</h3>";
    exit;
}

// 🧾 Insertar datos en la base
$stmt = $conn->prepare("INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $mensaje);

if ($stmt->execute()) {
    echo "<h2 style='color:green;font-family:sans-serif;'>✅ Mensaje enviado correctamente</h2>";
    echo "<p style='font-family:sans-serif;'>Gracias, $nombre. Te contactaré pronto.</p>";
} else {
    echo "<h3 style='color:red;font-family:sans-serif;'>❌ Error al guardar el mensaje: " . $conn->error . "</h3>";
}

$stmt->close();
$conn->close();
?>
