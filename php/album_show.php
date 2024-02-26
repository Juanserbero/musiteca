<?php
// Incluir el archivo de conexión
include_once './conexion.php';

// Obtener el ID del artista enviado desde la solicitud AJAX
$id = $_GET['id'];

try {
    // Construir la consulta SQL utilizando parámetros preparados para evitar inyección SQL
    $sql = "SELECT id, nombre, fecha, duracion, descripcion, tipo FROM album WHERE id = :id";

    // Preparar la consulta
    $stmt = $pdo->prepare($sql);

    // Vincular los parámetros
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener los resultados
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontraron resultados
    if ($row) {
        // Devolver los datos del album en formato JSON
        echo json_encode($row);
    } else {
        echo "Album no encontrado";
    }
} catch (PDOException $e) {
    // Manejar cualquier excepción que pueda ocurrir durante la ejecución de la consulta
    echo "Error: " . $e->getMessage();
}
?>
