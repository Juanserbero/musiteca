<?php
include_once './conexion.php';
$delete_id = $_GET["delete_id"];

        // Función para borrar un artista de la base de datos
        function borrarArtista($delete_id, $pdo)
        {
            try {
                // Preparar la consulta SQL para borrar el artista
                $sql = "DELETE FROM artista WHERE id = ?";
                $stmt = $pdo->prepare($sql);

                // Ejecutar la consulta SQL preparada
                $stmt->execute([$delete_id]);

                echo "Artista eliminado exitosamente.";
                header('Location: ../mtArt.php');
            } catch (PDOException $e) {
                echo "Error al eliminar el artista: " . $e->getMessage();
            }
        }

        // Llamar a la función para borrar el artista
        borrarArtista($delete_id, $pdo);
        ?>