<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <!--Para que se pueda ver en cualquier dispositivo-->
    <!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> -->
    <title>Peliculas</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/estilos.css" />
    <link rel="stylesheet" href="css/estrellas.css" />
    <?php include 'libs.php' ?>
</head>

<body>
    <?php
    $param = "select title from Pelicula where  ";
    $film = $_GET['Pelicula'];

    @header_index($_SESSION['email']);
    ?>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <form class="navbar-nav mr-auto" method="post">
                    <label class="nav-item active" for="F">Ficha<span class="sr-only">(current)</span></label>
                    <input id="F" type="submit" name="option[]" value='0' class="nav-link" />

                    <label class="nav-item active" for="F1">Criticas<span class="sr-only">(current)</span></label>
                    <input id="F1" type="submit" name="option[]" value='1' class="nav-item active" />

                    <label class="nav-item active" for="F2">Trailer<span class="sr-only">(current)</span></label>
                    <input id="F2" type="submit" name="option[]" value='2' class="nav-item active" />
                </form>
            </div>
        </nav>
        <?php
        $option = 0;
        $j = @$_POST['option'];
        if (isset($j)) {
            foreach ($j as $key) {
                $option = $key;
            }
        }

        switch ($option) {
            case 0:
                printInfo($film['nombre']);
                break;
            case 1:
                printCommnet("select * from critica inner join usuario on critica.user = usuario.user where title like '{$film['nombre']}'");
                break;
            case 2:

                $row = mysqli_fetch_array(mysqli_query($_SESSION['conn'], "select * from pelicula where title like '{$film['nombre']}'"), 1);
                $ytf = "https://www.youtube.com/embed/";
                $src = str_replace('https://www.youtube.com/watch?v=', '', $row['YT']);
                $ytf .= $src;
                echo "<br><div class=\"embed-responsive embed-responsive-16by9\">   
                <iframe class=\"embed-responsive-item\" width=\"560\" height=\"315\" src=\"{$ytf}\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe></div>";
                break;
        }
        ?>
    </div>
    <footer>
        <a class="footer" href="aviso_legal.html#Aviso_Legal">Aviso Legal</a> |
        <a class="footer" href="aviso_legal.html#Politica_de_privacidad">Política de privacidad</a>
        |
        <a class="footer" href="aviso_legal.html#Politica_de_Cookies">Política de Cookies</a>

        <br />

        <p class="footerprim">
            Copyright © iMDMA 2019 | iMDMA es una página de recomendación de cine y
            series basada en la afinidad entre sus usuarios.<br />
            iMDMA es un medio independiente, y su principal prioridad es la
            privacidad, mantenimiento y seguridad de los datos de sus
            usuarios,información que no comparte fuera de la web con ninguna entidad
            y/o empresa, bajo ninguna circunstancia.<br />
            All Rights Reserved - Todos los derechos reservados
        </p>
        <p class="footer">
            Desarrollado por: Sergio Vicente San Gregorio, David Barrios Portales,
            Piero Mendoza Chang
        </p>
    </footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
</body>

</html>