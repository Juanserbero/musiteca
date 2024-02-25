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
                    <h2 class="head2">Canciones del álbum</h2>
                </aside>
            </section>
            <section class="albCont">
                <h3 class="headSelect">Canción X</h3>

                <p id="nombreCancion" style="margin:2%"></p>
                <p id="generoCancion" style="margin:2%"></p>
                <p id="fechaCancion" style="margin:2%"></p>
                <p id="tonoCancion" style="margin:2%"></p>
                <p id="descripcionCancion" style="margin:2%"></p>

                <!--Si hace falta solo descomenta esta linea
                <p id="artistaCancion" style="margin:2%"></p>
                -->

            </section>
        </section>
        <footer>
            <a href="#" class="SetOrAdm">Ajustes</a>
            <a href="mtLogin.php" class="SetOrAdm">Administrador</a>
        </footer>
    </body>
</html>