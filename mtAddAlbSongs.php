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
            <form class="addCont" action="./php/cancion_add.php" method="post">
                <h2 class="headLogin">Agregar una nueva canción: </h2>
                <p class="addP">Nombre: </p>
                <input type="text" class="addInputs" name="nombre">
                <p class="addP">Número de canción: </p>
                <br><br>
                <input type="submit" class="logSubmit" value="Guardar y otra">
                <a href="mtAdmin.php" class="logSubmit" style="margin:2%; margin-left: 18%; font-size:14px">Finalizar</a>
            </form>
        </section>
        <footer>
            <a href="index.php" class="SetOrAdm">Página principal</a>
            <a href="mtAdmin.php" class="SetOrAdm">Volver</a>
        </footer>
    </body>
</html>