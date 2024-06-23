<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
    <h2>Bienvenido</h2>
    <?php
    session_start();
    if (isset($_SESSION["usuario_id"])) {
        // Mostrar el nombre del usuario que inició sesión
        echo "Hola, " . $_SESSION["usuario_nombre"] . "! Bienvenido a tu página de inicio.";
        // Aquí puedes agregar cualquier contenido adicional que desees mostrar al usuario después del inicio de sesión
    } else {
        // Si el usuario no ha iniciado sesión, redirigir al formulario de login
        header("Location: formulario_login.html");
        exit();
    }
    ?>
    <br><br>
    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>
