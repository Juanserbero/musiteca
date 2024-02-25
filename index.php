
<html>
    <head>
        <title>
            Musiteca
        </title>
    </head>
    <body>
        <?php
        include_once("php/conexion.php");
        ?>
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
                <h2 class="head2">¡Bienvenido a Musiteca!</h2>
                <p class="present">Aquí encontrarás información relevante acerca de tu música</p>
                <p class="present">favorita: datos tanto biográficos como musicales</p>
                <p class="present">de tus artistas favoritos, curiosidades y descripciones </p>
                <p class="present">sobre tus álbumes preferidos y las canciones que los componen.</p> 
        </section>
        <footer>
            <a href="#" class="SetOrAdm">Ajustes</a>
            <a href="mtLogin.php" class="SetOrAdm">Administrador</a>
        </footer>
    </body>
</html>