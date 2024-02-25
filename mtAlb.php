<?php
include './php/conexion.php';
try {
    // Consulta para obtener los libros de la tabla 'album'
    $sql_leer = 'SELECT id, nombre, fecha, duracion, tipo FROM album;';
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
                    <h2 class="head2">Albumes</h2>
                    
                    <?php foreach ($resultado as $r) : ?>
                    <div class="chapter flex" style="align-items: center;">
                        <h4 class="listElem" onclick="loadAlb(<?php echo $r['id']; ?>)" style="flex-grow: 1; cursor: pointer; background: white; margin:2%; padding:3px;border: #001834 solid 2px;"><?php echo $r['nombre']; ?></h4>
                    </div>
                    <?php endforeach ?>

                </aside>
            </section>
            <section class="albCont">
                <h3 id="nombreAlbum" class="headSelect"><?php if ($resultado) {
                                        echo $resultado[0]['nombre'];
                                    }    ?></h3>

                <p id="artistaDelAlbum" style="margin:2%"></p>
                <p id="fechaDelAlbum" style="margin:2%"><?php if ($resultado) {
                                        echo $resultado[0]['fecha'];
                                    }    ?></p>
                <p id="duracionDelAlbum" style="margin:2%"><?php if ($resultado) {
                                        echo $resultado[0]['duracion'];
                                    }    ?></p>
                <p id="tipoDeAlbum" style="margin:2%"><?php if ($resultado) {
                                        echo $resultado[0]['tipo'];
                                    }    ?></p>

                <!-- LISTA DE CANCIONES DEL áLBUM -->

                <!--Esta primera cancion tiene un link hacia la vista cancion, es solo para q puedas acceder a esa pagina por ahora-->
                <a href="mtSong.php" id="song1" style="margin:2%">Cancion 1 prueba para acceder a vista Cancion</a>
            </section>
        </section>
        <footer>
            <a href="#" class="SetOrAdm">Ajustes</a>
            <a href="mtLogin.php" class="SetOrAdm">Administrador</a>
        </footer>
    </body>
    <script>
    function loadAlb(id) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parsear la respuesta JSON
            var response = JSON.parse(this.responseText);
            
            // Actualizar los elementos HTML con los datos del artista
            document.getElementById("nombreAlbum").innerHTML = response.nombre;
            document.getElementById("fechaDelAlbum").innerHTML = response.fecha;
            document.getElementById("duracionDelAlbum").innerHTML = response.duracion;
            document.getElementById("tipoDeAlbum").innerHTML = response.tipo;
        }
    };

    xhttp.open("GET", "./php/album_show.php?id=" + id, true);
    xhttp.send();
}
</script>                                
</html>