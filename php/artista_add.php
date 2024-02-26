<?php
include './conexion.php';


// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $pais = $_POST["pais"];
    $genero = $_POST["genero"];

    // Función para agregar un usuario a la base de datos
    function agregarUsuario($nombre, $fecha, $pais, $genero, $pdo)
    {
        try {
            // Preparar la consulta SQL para insertar el usuario
            $sql = "INSERT INTO artista (nombre, fecha, pais, genero) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            // Ejecutar la consulta SQL preparada
            $stmt->execute([$nombre, $fecha, $pais, $genero]);

            echo "Usuario agregado exitosamente.";
        } catch (PDOException $e) {
            echo "Error al agregar el usuario: " . $e->getMessage();
        }
    }

    // Verificar la conexión
    if (!$pdo) {
        echo "Error: No se pudo conectar a la base de datos.\n";
        exit;
    }

    // Llamar a la función para agregar el usuario
    agregarUsuario($nombre, $fecha, $pais, $genero, $pdo);
}


