<?php
include_once './php/conexion.php';

try {
    // Consulta para obtener todos los artistas y sus detalles
    $sql_leer = 'SELECT id, nombre FROM artista';
    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();
    $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<html>

<head>
    <title>
        Musiteca
    </title>
</head>

<body>
    <link rel="stylesheet" href="mtStyle.css">
    <header>
        <h1 class="head1">MUSITECA</h1>
        <nav>
            <h4 class="AdmModHead">Modo Administrador</h4>
        </nav>
    </header>
    <section class="mainCont" style="height:70%">
        <form class="addCont" action="./php/album_add.php" method="post">
            <h2 class="headLogin">Agregar un nuevo album: </h2>
            <p class="addP">Nombre del album: </p>
            <input type="text" class="addInputs" name = "nombre">
            <p class="addP">Artista al que pertenece: </p>
            <select name="artista_id" id="" class="addInputs">>
                <?php foreach ($resultado as $r) : ?>
                    <option value="<?php echo $r['id']; ?>"><?php echo $r['nombre']; ?></option>
                <?php endforeach ?>
            </select>
            <p class="addP">Fecha de lanzamiento: </p>
            <input type="date" class="addInputs" name = "fecha">
            <p class="addP">Duracion del album: </p>
            <input type="text" class="addInputs" name = "duracion">
            <p class="addP">Tipo de album:</p>
            <input type="text" class="addInputs" name = "tipo">
            <br><br>
            <input type="submit" class="logSubmit" style="margin-left:24%" value="Guardar y agregar canciones">
        </form>
    </section>
    <footer>
        <a href="#" class="SetOrAdm">Ajustes</a>
        <a href="index.php" class="SetOrAdm">Salir del Modo Administrador</a>
        <a href="mtAdmin.php" class="SetOrAdm">Volver</a>
    </footer>
</body>

</html>