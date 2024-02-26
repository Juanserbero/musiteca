<?php
include_once './conexion.php';
$delete_id = $_GET["delete_id"];

        // Función para borrar un album de la base de datos
        function borrarAlbum($delete_id, $pdo)
        {
            try {
                // Preparar la consulta SQL para borrar el album
                $sql = "DELETE FROM album WHERE id = ?";
                $stmt = $pdo->prepare($sql);

                // Ejecutar la consulta SQL preparada
                $stmt->execute([$delete_id]);

                echo "Album eliminado exitosamente.";
                header('Location: ../mtAlb.php');
            } catch (PDOException $e) {
                echo "Error al eliminar el album: " . $e->getMessage();
            }
        }

        // Llamar a la función para borrar el album
        borrarAlbum($delete_id, $pdo);
        ?>