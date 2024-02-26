<?php
include './conexion.php';
session_start();


// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['album_id'])) {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $duracion = $_POST["duracion"];
    $genero = $_POST["genero"];
    $tono = $_POST["tono"];
    $letra = $_POST["letra"];
    $descripcion = $_POST["descripcion"];
    $album_id =  $_SESSION['album_id'];


    // Función para agregar un usuario a la base de datos
    function agregarUsuario($id, $nombre, $duracion, $genero, $tono, $letra, $descripcion, $album_id, $pdo)
    {
        try {
            // Preparar la consulta SQL para insertar el usuario
            $sql = "INSERT INTO cancion (id, nombre, duracion, genero, tono, letra, descripcion, album_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            // Ejecutar la consulta SQL preparada
            $stmt->execute([$id, $nombre, $duracion, $genero, $tono, $letra, $descripcion, $album_id]);

            echo "Cancion agregado exitosamente.";
            header('Location: ../mtAddAlbSongs.php');
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
    agregarUsuario($id, $nombre, $duracion, $genero, $tono, $letra, $descripcion, $album_id, $pdo);
}
