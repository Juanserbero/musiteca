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
                        <h4 class="listElem" onclick="loadArt(<?php echo $r['id']; ?>)" style="flex-grow: 1; cursor: pointer; background: white; margin:2%; padding:3px;border: #001834 solid 2px;"><?php echo $r['nombre']; ?>
                        <a href="php/artista_delete.php?delete_id=<?php echo $r['id_genero']; ?>" 
                        onclick="return confirm('Esta seguro de eliminar el género?')" 
                        style="float:right; background-color:#001834; color: white;padding:1px">Eliminar</a>
                        <a style="float:right; margin-right:5px;  background-color:#001834; color: white;padding:1px">Editar</a></h4>
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
        <section id="albumesDelArtista" style="height:100%;width:40%; position:relative; left:60%; background-color:#89A1C5">
                <h2 style="position:relative; bottom:98%; left:2%; color:#001834">Albumes de este artista</h2>
                    <div id="album-container" style="position:relative; bottom:92%" >
                        
                    </div>
        </section>

        </section>
    <footer>
        <a href="index.php" class="SetOrAdm">Volver</a>
    </footer>
</body>
<script>
    function loadArt(id) {
    var xhttp = new XMLHttpRequest();
    loadAlbums(id)
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


function loadAlbums(artista_id) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parsear la respuesta JSON
            var albums = JSON.parse(this.responseText);
            
            // Limpiar el contenido del contenedor de álbumes
            var albumContainer = document.getElementById("album-container");
            albumContainer.innerHTML = ''; // Limpiar contenido existente

            // Procesar los álbumes obtenidos y añadirlos al contenedor
            albums.forEach(function(album) {
                // Crear un elemento <a> para cada álbum y configurar sus atributos
                var albumLink = document.createElement("a");
                albumLink.href = "mtSong.php"; // Cambiar la URL si es necesario
                albumLink.id = "album-" + album.id; // Asignar un ID único si es necesario
                albumLink.style.margin = "2%";
                albumLink.style.position = "relative";
                albumLink.style.bottom = "93.5%";
                albumLink.style.textDecoration = "none";
                albumLink.style.display = "grid";
                albumLink.style.color = "#001834";
                albumLink.style.backgroundColor = "white";
                albumLink.style.padding = "1%";
                albumLink.style.border = "#001834 solid 2px";
                albumLink.style.paddingRight = "40%";
                albumLink.textContent = album.nombre; // Establecer el texto del enlace

                // Añadir el enlace del álbum al contenedor
                albumContainer.appendChild(albumLink);
            });
        }
    };

    // Construir la URL de la solicitud AJAX
    var url = "./php/artista_album_show.php?artista_id=" + artista_id;

    xhttp.open("GET", url, true);
    xhttp.send();
}
window.addEventListener('load', function() {
        loadAlbums(<?php echo $resultado[0]['id']?>)
    });
</script>
</html>