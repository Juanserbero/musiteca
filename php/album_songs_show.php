<?php
// Incluir el archivo de conexión
include_once './conexion.php';

// Obtener el ID del artista enviado desde la solicitud AJAX
$album_id = $_GET['album_id'];

try {
    // Construir la consulta SQL utilizando parámetros preparados para evitar inyección SQL
    $sql = "SELECT id, nombre, duracion, genero, tono FROM cancion WHERE album_id = :album_id";

    // Preparar la consulta
    $stmt = $pdo->prepare($sql);

    // Vincular los parámetros
    $stmt->bindParam(':album_id', $album_id, PDO::PARAM_INT);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $songs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los resultados en formato JSON
    echo json_encode($songs);
} catch (PDOException $e) {
    // Manejar cualquier excepción que pueda ocurrir durante la ejecución de la consulta
    echo "Error: " . $e->getMessage();
}
?>