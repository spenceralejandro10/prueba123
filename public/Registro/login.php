<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registropagina";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$email = $_POST["email"];
$contraseña = $_POST["contraseña"];

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($contraseña == $row["contraseña"]) {
        echo "Inicio de sesión exitoso";
        // Iniciar sesión
        session_start();
        $_SESSION["usuario_id"] = $row["id"];
        $_SESSION["usuario_nombre"] = $row["nombre"]; // Asegúrate de que el campo "nombre" exista en tu tabla de usuarios
        // Redirigir a la página de bienvenida u otra página después del login
        header("Location: bienvenido.php");
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>
