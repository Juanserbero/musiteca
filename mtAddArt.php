<?php

if ($_GET) {

    include './php/conexion.php';
    // Definir el ID del artista que quieres obtener
    $id = $_GET['id'];


    try {
        $sql = "SELECT id, nombre, fecha, pais, genero, biografia FROM artista WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener el artista: " . $e->getMessage();
    }
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

        <?php if (!$_GET) : ?>

            <form class="addCont" action="./php/artista_add.php" method="post">
                <h2 class="headLogin">Agregue un nuevo artista: </h2>
                <p class="addP">Nombre artistico: </p>
                <input type="text" class="addInputs" name="nombre">
                <p class="addP">Fecha de inicio de actividad: </p>
                <input type="date" class="addInputs" name="fecha">
                <p class="addP">Pais de origen: </p>
                <input type="text" class="addInputs" name="pais">
                <p class="addP">Genero musical principal: </p>
                <input type="text" class="addInputs" name="genero">
                <p class="addP">Biografía: </p>
                <textarea cols="30" rows="2" class="addInputs" name="biografia"></textarea>
                <br><br>
                <input type="submit" class="logSubmit" value="Guardar">
            </form>
        <?php endif ?>


        <?php if ($_GET) : ?>

            <form class="addCont" action="./php/artista_edit.php" method="get">
                <h2 class="headLogin">Edite el artista: </h2>
                <input type="text" class="addInputs" name="id" value="<?php echo $res['id'] ?>" style="display: none;">
                <p class="addP">Nombre artistico: </p>
                <input type="text" class="addInputs" name="nombre" value="<?php echo $res['nombre'] ?>">
                <p class="addP">Fecha de inicio de actividad: </p>
                <input type="date" class="addInputs" name="fecha" value="<?php echo $res['fecha'] ?>">
                <p class="addP">Pais de origen: </p>
                <input type="text" class="addInputs" name="pais" value="<?php echo $res['pais'] ?>">
                <p class="addP">Genero musical principal: </p>
                <input type="text" class="addInputs" name="genero" value="<?php echo $res['genero'] ?>">
                <p class="addP">Biografía: </p>
                <textarea cols="30" rows="2" class="addInputs" name="biografia" value="<?php echo $res['biografia'] ?>"></textarea>
                <br><br>
                <input type="submit" class="logSubmit" value="Guardar">
            </form>
        <?php endif ?>


    </section>
    <footer>
        <a href="index.php" class="SetOrAdm">Página principal</a>
        <a href="mtAdmin.php" class="SetOrAdm">Volver</a>
    </footer>
</body>

</html>
