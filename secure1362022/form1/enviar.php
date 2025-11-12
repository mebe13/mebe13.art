<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🔧 Conexión a la base de datos
$servername = "127.0.0.1";
$username   = "u558033723_mebe";
$password   = "BeMe2025!";
$dbname     = "u558033723_formulario";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);
<<<<<<< HEAD
if ($conn->connect_error) {
    die('<h3 style="color:red;font-family:sans-serif;">❌ Error de conexión: ' . $conn->connect_error . '</h3>');
}

$conn->set_charset("utf8mb4");

// 📨 Capturar datos del formulario
$nombre  = $_POST['nombre']  ?? '';
$email   = $_POST['email']   ?? '';
=======

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}

// 📨 Capturar datos del formulario
$nombre  = $_POST['nombre'] ?? '';
$email   = $_POST['email'] ?? '';
>>>>>>> 24710092f98a26ad09287a9e68ff82c142d55939
$mensaje = $_POST['mensaje'] ?? '';

// Validar campos
if (empty($nombre) || empty($email) || empty($mensaje)) {
<<<<<<< HEAD
    echo '<h3 style="color:red;font-family:sans-serif;">⚠️ Por favor, completa todos los campos.</h3>';
=======
    echo "<h3 style='color:red;font-family:sans-serif;'>⚠️ Por favor, completa todos los campos.</h3>";
>>>>>>> 24710092f98a26ad09287a9e68ff82c142d55939
    exit;
}

// 🧾 Insertar datos en la base
$stmt = $conn->prepare("INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $email, $mensaje);

if ($stmt->execute()) {
<<<<<<< HEAD
    echo '<h2 style="color:green;font-family:sans-serif;">✅ Mensaje enviado correctamente</h2>';
    echo '<p style="font-family:sans-serif;">Gracias, ' . htmlspecialchars($nombre) . '. Te contactaré pronto.</p>';
    echo '<a href="../index.html#hero" style="display:inline-block;margin-top:20px;padding:12px 28px;background:linear-gradient(90deg,#006de7,#0095ff);color:#fff;text-decoration:none;border-radius:8px;">🏠 Ir a Portafolio</a>';
} else {
    echo '<h3 style="color:red;font-family:sans-serif;">❌ Error al guardar el mensaje: ' . $conn->error . '</h3>';
=======
    echo "<h2 style='color:green;font-family:sans-serif;'>✅ Mensaje enviado correctamente</h2>";
    echo "<p style='font-family:sans-serif;'>Gracias, $nombre. Te contactaré pronto.</p>";
} else {
    echo "<h3 style='color:red;font-family:sans-serif;'>❌ Error al guardar el mensaje: " . $conn->error . "</h3>";
>>>>>>> 24710092f98a26ad09287a9e68ff82c142d55939
}

$stmt->close();
$conn->close();
?>
