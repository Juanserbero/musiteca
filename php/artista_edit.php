<?php
include_once './conexion.php';
$id = $_GET["id"];

// Obtener los datos del formulario
$nombre = $_GET["nombre"];
$fecha = $_GET["fecha"];
$pais = $_GET["pais"];
$genero = $_GET["genero"];
$biografia = $_GET["biografia"];


// Función para editar un artista en la base de datos
function editarArtista($id, $nombre, $fecha, $pais, $genero, $biografia, $pdo)
{
    try {
        // Preparar la consulta SQL para actualizar el artista
        $sql = "UPDATE artista SET nombre = ?, fecha = ?, pais = ?, genero = ?, biografia = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);

        // Ejecutar la consulta SQL preparada
        $stmt->execute([$nombre, $fecha, $pais, $genero, $biografia, $id]);

        echo "Artista editado exitosamente.";
        header('Location: ../mtArt.php');
    } catch (PDOException $e) {
        echo "Error al editar el artista: " . $e->getMessage();
    }
}

// Llamar a la función para editar el artista
editarArtista($id, $nombre, $fecha, $pais, $genero, $biografia, $pdo);
?>
