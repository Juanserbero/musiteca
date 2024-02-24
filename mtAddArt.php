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
        <section class="mainCont" >
            <form class="addCont" action="./php/artista_add.php" method="post">
                <h2 class="headLogin">Agregar un nuevo artista: </h2>
                <p class="addP">Nombre artistico: </p>
                <input type="text" class="addInputs" name="nombre">
                <p class="addP">Fecha de inicio de actividad: </p>
                <input type="date" class="addInputs" name="fecha">
                <p class="addP">Pais de origen: </p>
                <input type="text" class="addInputs" name="pais">
                <p class="addP">Genero musical principal: </p>
                <input type="text" class="addInputs" name="genero">
                <p class="addP">Biografía: </p>
                <textarea cols="30" rows="2" class="addInputs"></textarea>
                <br><br>
                <input type="submit" class="logSubmit" value="Guardar">
            </form>
        </section>
        <footer>
            <a href="#" class="SetOrAdm">Ajustes</a>
            <a href="index.php" class="SetOrAdm">Salir del Modo Administrador</a>
            <a href="mtAdmin.php" class="SetOrAdm">Volver</a>
        </footer>
    </body>
</html>