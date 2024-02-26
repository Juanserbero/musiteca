<?php
// Incluir el archivo de conexión
include_once './conexion.php';

// Obtener el ID del artista enviado desde la solicitud AJAX
$artista_id = $_GET['artista_id'];

try {
    // Construir la consulta SQL utilizando parámetros preparados para evitar inyección SQL
    $sql = "SELECT id, nombre, fecha, duracion, tipo FROM album WHERE artista_id = :artista_id";

    // Preparar la consulta
    $stmt = $pdo->prepare($sql);

    // Vincular los parámetros
    $stmt->bindParam(':artista_id', $artista_id, PDO::PARAM_INT);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los resultados en formato JSON
    echo json_encode($albums);
} catch (PDOException $e) {
    // Manejar cualquier excepción que pueda ocurrir durante la ejecución de la consulta
    echo "Error: " . $e->getMessage();
}
?>
