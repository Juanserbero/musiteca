<?php
include_once './conexion.php';
$id = $_GET["id"];

// Obtener los datos del formulario
$nombre = $_GET["nombre"];
$fecha = $_GET["fecha"];
$pais = $_GET["duracion"];
$genero = $_GET["tipo"];
$biografia = $_GET["descripcion"];
$artista_id = $_GET["artista_id"];


// Función para editar un album en la base de datos
function editarAlbum($id, $nombre, $fecha, $pais, $genero, $biografia, $artista_id, $pdo)
{
    try {
        // Preparar la consulta SQL para actualizar el album
        $sql = "UPDATE album SET nombre = ?, fecha = ?, pais = ?, genero = ?, biografia = ?, artista_id = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);

        // Ejecutar la consulta SQL preparada
        $stmt->execute([$nombre, $fecha, $pais, $genero, $biografia, $artista_id, $id]);

        echo "Artista editado exitosamente.";
        header('Location: ../mtAlb.php');
    } catch (PDOException $e) {
        echo "Error al editar el album: " . $e->getMessage();
    }
}

// Llamar a la función para editar el artista
editarAlbum($id, $nombre, $fecha, $pais, $genero, $biografia, $artista_id, $pdo);
?>
