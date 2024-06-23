<?php
// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y limpiarlos
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $email = htmlspecialchars($_POST["email"]);
    $age = intval($_POST["age"]); // Convertir a entero
    $rank = htmlspecialchars($_POST["rank"]);
    $species = htmlspecialchars($_POST["species"]);

    // Conexión a la base de datos
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "federacion_planetas";

    // Crear conexión
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL con sentencias preparadas
    $sql = "INSERT INTO usuarios (username, password, email, age, rank, species) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt) {
        // Bind de parámetros
        $stmt->bind_param("sssiis", $username, $password, $email, $age, $rank, $species);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar usuario";
        }

        // Cerrar la sentencia preparada
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta";
    }

    // Cerrar conexión
    $conn->close();
}
?>
