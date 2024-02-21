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
        <section class="mainCont">
            <section class="addCont">
                <h2 class="headLogin">Agregar un nuevo sencillo: </h2>
                <p class="addP">Nombre del sencillo: </p>
                <input type="text" class="addInputs">
                <p class="addP">Genero: </p>
                <input type="text" class="addInputs">
                <p class="addP">Fecha de lanzamiento: </p>
                <input type="date" class="addInputs">
                <p class="addP">Tonalidad: </p>
                <input type="text" class="addInputs">
                <p class="addP">Descripcion: </p>
                <input type="text" class="addInputs">
                <br><br>
                <input type="button" class="logSubmit" value="Guardar">
            </section>
        </section>
        <footer>
            <a href="#" class="SetOrAdm">Ajustes</a>
            <a href="index.php" class="SetOrAdm">Salir del Modo Administrador</a>
            <a href="mtAdmin.php" class="SetOrAdm">Volver</a>
        </footer>
    </body>
</html>