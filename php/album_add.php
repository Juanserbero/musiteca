<?php
include './conexion.php';


// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $duracion = $_POST["duracion"];
    $cantidad_canciones = $_POST["cantidad_canciones"];
    $artista_id = $_POST["artista_id"];

    // Función para agregar un usuario a la base de datos
    function agregarUsuario($nombre, $fecha, $duracion, $cantidad_canciones, $artista_id, $pdo)
    {
        try {
            // Preparar la consulta SQL para insertar el usuario
            $sql = "INSERT INTO album (nombre, fecha, duracion, cantidad_canciones, artista_id) VALUES (?, ?, ?, ?, ?);";
            $stmt = $pdo->prepare($sql);

            // Ejecutar la consulta SQL preparada
            $stmt->execute([$nombre, $fecha, $duracion, $cantidad_canciones, $artista_id]);

            //consulata para saber el id de este albun
            $sql1 = "SELECT max(id) from album";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->execute([]);
            $albumId = $stmt1->fetchColumn();

            session_start();
            $_SESSION['albumId'] = $albumId;

            #$id_albun = 1; //id obtenido en la consulta

           
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
    agregarUsuario($nombre, $fecha, $duracion, $cantidad_canciones, $artista_id, $pdo);
}
