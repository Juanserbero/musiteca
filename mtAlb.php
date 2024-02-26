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
                        <h4 class="listElem" onclick="loadAlb(<?php echo $r['id']; ?>)" style="flex-grow: 1; cursor: pointer; background: white; margin:2%; padding:3px;border: #001834 solid 2px;"><?php echo $r['nombre']; ?>
                        <a style="float:right; background-color:#001834; color: white;padding:1px">Eliminar</a><a style="float:right; margin-right:5px;  background-color:#001834; color: white;padding:1px">Editar</a></h4>
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

                
            </section>
            <section id="cancionesDelAlbum" style="height:100%;width:40%; position:relative; left:60%; background-color:#89A1C5">
            <h2 style="position:relative; bottom:98%; left:2%; color:#001834">Canciones de este álbum</h2>
            <div id="songs-container">
                    
            </div>
        </section>
        </section>
        <footer>
            <a href="index.php" class="SetOrAdm">Volver</a>
        </footer>
    </body>
    <script>
    function loadAlb(id) {
    var xhttp = new XMLHttpRequest();
    loadSongs(id)
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

function loadSongs(album_id) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parsear la respuesta JSON
            var songs = JSON.parse(this.responseText);
            
            // Limpiar el contenido del contenedor de álbumes
            var songsContainer = document.getElementById("songs-container");
            songsContainer.innerHTML = ''; // Limpiar contenido existente

            // Procesar los álbumes obtenidos y añadirlos al contenedor
            songs.forEach(function(songs) {
                // Crear un elemento <a> para cada álbum y configurar sus atributos
                var songsLink = document.createElement("a");
                songsLink.href = "mtSong.php"; // Cambiar la URL si es necesario
                songsLink.id = "songs-" + songs.id; // Asignar un ID único si es necesario
                songsLink.style.margin = "2%";
                songsLink.style.position = "relative";
                songsLink.style.bottom = "93.5%";
                songsLink.style.textDecoration = "none";
                songsLink.style.color = "#001834";
                songsLink.style.backgroundColor = "white";
                songsLink.style.padding = "1%";
                songsLink.style.border = "#001834 solid 2px";
                songsLink.style.paddingRight = "60%";
                songsLink.textContent = songs.nombre; // Establecer el texto del enlace

                // Añadir el enlace del álbum al contenedor
                songsContainer.appendChild(songsLink);
            });
        }
    };

    // Construir la URL de la solicitud AJAX
    var url = "./php/album_songs_show.php?album_id=" + album_id;

    xhttp.open("GET", url, true);
    xhttp.send();
}
window.addEventListener('load', function() {
        loadSongs(<?php echo $resultado[0]['id']?>)
    });
</script>                                
</html>