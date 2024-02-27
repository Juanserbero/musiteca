
<?php
include './php/conexion.php';
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

if ($_GET) {

    // Definir el ID del album que quieres obtener
    $id = $_GET['id'];


    try {
        $sql = "SELECT id, nombre, fecha, duracion, tipo, descripcion FROM album WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener el album: " . $e->getMessage();
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
            <ul>
                <li><a href='index.php'>Inicio</a></li>
                <li><a href='mtArt.php'>Artista</a></li>
                <li><a href='mtAlb.php'>Album</a></li>
            </ul>
        </nav>
    </header>



    <section class="mainCont" style="height:70%">

        <?php if (!$_GET) : ?>

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
            <p class="addP">Descripción: </p>
            <textarea cols="30" rows="2" class="addInputs" name="descripcion" value="<?php echo $res['descripcion'] ?>"></textarea>
            <br><br>
            <input type="submit" class="logSubmit" style="margin-left:24%" value="Guardar y agregar canciones">
        </form>

        <?php endif ?>



        <?php if ($_GET) : ?>

        <form class="addCont" action="./php/album_edit.php" method="post">
            <h2 class="headLogin">Edite el álbum: </h2>
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
            <p class="addP">Descripción: </p>
            <textarea cols="30" rows="2" class="addInputs" name="descripcion" ><?php echo $res['descripcion'] ?></textarea>
            <br><br>
            <input type="submit" class="logSubmit" style="margin-left:24%" value="Guardar y agregar canciones">
        </form>

        <?php endif ?>

    </section>
    <footer>

    </footer>
</body>
</html>