<?php
include './php/conexion.php';
try {
    // Consulta para obtener los libros de la tabla 'artista'
    $sql_leer = 'SELECT id, nombre, fecha, pais, genero FROM artista;';
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
            <ul>
                <li><a href='index.php'>Inicio</a></li>
                <li><a href='mtArt.php'>Artista</a></li>
                <li><a href='mtAlb.php'>Album</a></li>
                <li><a href='mtGen.php'>Género</a></li>
            </ul>
        </nav>
    </header>
    <section class="mainCont" style="height:70%">
        <section class="lat">
            <aside>
                <h2 class="head2">Artistas</h2>

                <?php foreach ($resultado as $r) : ?>
                    <div class="chapter flex" style="align-items: center;">
                        <h4 class="listElem" onclick="loadArt(<?php echo $r['id']; ?>)" style="flex-grow: 1; cursor: pointer; background: white; margin:2%; padding:3px;border: #001834 solid 2px;"><?php echo $r['nombre']; ?></h4>
                    </div>
                <?php endforeach ?>

            </aside>
        </section>
        <section class="artCont">
            <h3 id="nombreArtista"class="headSelect" style="margin:1%"><?php if ($resultado) {
                                        echo $resultado[0]['nombre'];
                                    }    ?>
            </h3>
            <p id="fechaInicioArtista" style="margin:2%"><?php if ($resultado) {
                                        echo $resultado[0]['fecha'];
                                    }    ?></p>
            <p id="paisArtista" style="margin:2%"><?php if ($resultado) {
                                        echo $resultado[0]['pais'];
                                    }    ?></p>
            <p id="generoArtista" style="margin:2%"><?php if ($resultado) {
                                        echo $resultado[0]['genero'];
                                    }    ?></p>
            <p id="biografiaInicioArtista" style="margin:2%; max-width: 100% ";>biografia X</p>
        </section>
    </section>
    <footer>
        <a href="#" class="SetOrAdm">Ajustes</a>
        <a href="mtLogin.php" class="SetOrAdm">Administrador</a>
    </footer>
</body>
<script>
    function loadArt(id) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parsear la respuesta JSON
            var response = JSON.parse(this.responseText);
            
            // Actualizar los elementos HTML con los datos del artista
            document.getElementById("nombreArtista").innerHTML = response.nombre;
            document.getElementById("fechaInicioArtista").innerHTML = response.fecha;
            document.getElementById("paisArtista").innerHTML = response.pais;
            document.getElementById("generoArtista").innerHTML = response.genero;
        }
    };

    xhttp.open("GET", "./php/artista_show.php?id=" + id, true);
    xhttp.send();
}

</script>

</html>