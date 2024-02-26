<?php
include_once './conexion.php';
$delete_id = $_GET["delete_id"];

        // Función para borrar un género de la base de datos
        function borrarGenero($delete_id, $pdo)
        {
            try {
                // Preparar la consulta SQL para borrar el género
                $sql = "DELETE FROM genero WHERE id = ?";
                $stmt = $pdo->prepare($sql);

                // Ejecutar la consulta SQL preparada
                $stmt->execute([$delete_id]);

                echo "Género eliminado exitosamente.";
                header('Location: ../mtArt.php');
            } catch (PDOException $e) {
                echo "Error al eliminar el género: " . $e->getMessage();
            }
        }

        // Llamar a la función para borrar el género
        borrarGenero($delete_id, $pdo);
        ?>