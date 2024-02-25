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
                
            </nav>
        </header>
        <section class="mainCont" style="height:70%">
            <section class="loginCont" style="position:relative; top:10%">
                <h2 class="headAdd">Iniciar sesion como administrador</h2>
                <p class="nameLog">Nombre Administrador: </p>
                <input type="text" class="logInputs">
                <p class="passLog">Contrasena: </p>
                <input type="password" class="logInputs">
                <br><br>
                <input type="button" class="logSubmit" value="Comprobar" onclick="redireccionarPagina()">
                
                
            </section>
        </section>
        <footer>
            <a href="#" class="SetOrAdm">Ajustes</a>
            <a href="index.php" class="SetOrAdm">Volver</a>
        </footer>
    </body>

    <script>
        function redireccionarPagina() {
  // URL de la página a la que deseas redireccionar
  const urlDestino = "mtAdmin.php";

  // Redireccionamiento utilizando location.href
  window.location.href = urlDestino;
}
    </script>   
</html>