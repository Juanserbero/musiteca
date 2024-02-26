<?php
include './conexion.php';


// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $pais = $_POST["pais"];
    $genero = $_POST["genero"];
    $biografia = $_POST["biografia"];


    // Función para agregar un artista a la base de datos
    function agregarArtista($nombre, $fecha, $pais, $genero, $biografia, $pdo)
    {
        try {
            // Preparar la consulta SQL para insertar el artista
            $sql = "INSERT INTO artista (nombre, fecha, pais, genero, biografia) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            // Ejecutar la consulta SQL preparada
            $stmt->execute([$nombre, $fecha, $pais, $genero, $biografia]);

            echo "Artista agregado exitosamente.";
        } catch (PDOException $e) {
            echo "Error al agregar el Artista: " . $e->getMessage();
        }
    }

    // Verificar la conexión
    if (!$pdo) {
        echo "Error: No se pudo conectar a la base de datos.\n";
        exit;
    }

    // Llamar a la función para agregar el artista
    agregarArtista($nombre, $fecha, $pais, $genero, $biografia, $pdo);
}


