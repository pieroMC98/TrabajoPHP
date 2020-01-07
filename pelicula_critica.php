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
    var_dump($_GET['Pelicula']);

    @header_index($_SESSION['email']);
    ?>
    <div class="containernav">
        <header>
            <nav class="navbar navbar-expand-lg navbar-collapse navbar-light bg-light">
                <a class="navbar-brand" href="index.html"><img src="img/idma.png" alt="Logo" style="height:35px;" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!--Botón que aparece cuando se hace pequeña la pagina-->
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#cartelera">Cartelera España</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.html#estrenos">Próximos estrenos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contacto.html">Contacto</a>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Buscar" />
                            </form>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="busqueda_avanzada.html">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                    Búsqueda avanzada
                                </button>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a style="padding: 0.5rem 1rem" href="clientes.html">Iniciar sesión</a>
                        </li>

                        <li class="nav-item">
                            <a style="padding: 0.5rem 1rem" href="registro.html">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>

    <div class="container">
        <div class="main row">
            <article class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h2>Frozen 2</h2>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="pelicula.html">Ficha<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Críticas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pelicula_trailer.html">Trailer</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <img class="img pelis" src="img/frozen.jpg" alt="Frozen 2" style="float: left; margin-right:30px" title="Frozen 2" />
                            <!-- Votacion por estrellas-->
                        </div>

                        <div class="col">
                            <div class="Section">
                                <p>Título original: Frozen II</p>
                                <p>Año: 2019</p>
                                <p>Directores: Chris Buck, Jennifer Lee</p>
                                <p>Género: Animación</p>
                                <p>
                                    Sinopsis: ¿Por qué nació Elsa con poderes mágicos? La
                                    respuesta le está llamando y amenaza su reino. Junto con
                                    Anna, Kristoff, Olaf y Sven emprenderá un viaje peligroso e
                                    inolvidable. En 'Frozen', Elsa temía que sus poderes fueran
                                    demasiado para el mundo. En 'Frozen 2', deseará que sean
                                    suficientes. Secuela de "Frozen. El reino del hielo" (2013),
                                    el film de animación más taquillero de la historia del cine,
                                    ganador del Oscar a la mejor película animada. Reunirá al
                                    mismo equipo artístico y técnico de la original.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <br />
            </article>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" alt="Pablo" />
                                <p class="text-secondary text-center">1 de diciembre</p>
                            </div>
                            <div class="col-md-10">
                                <p>
                                    <a class="float-left" href="cuenta.html"><strong>Pablo Pérez</strong></a>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                                </p>
                                <div class="clearfix"></div>
                                <p>
                                    Frozen II podría haber sido realizada de cualquier manera y
                                    en cualquier tiempo que posiblemente hubiese sido un
                                    fenómeno en taquilla, pero Disney ha querido darnos una
                                    secuela a la altura de su predecesora que bien podría ser el
                                    buque insignia de esta nueva generación Disney.
                                </p>
                                <p>
                                    Una historia diferente, que no estira el argumento del film
                                    original, simplemente utiliza un mensaje: el amor como
                                    puente entre las dos películas. Si en la anterior película
                                    nos mostraban que el amor fraternal es más poderoso que el
                                    clásico amor romántico en esta nos dejan un mensaje más que
                                    potente: El amor propio vale igual o incluso más que
                                    cualquier otro.
                                </p>
                                <p>
                                    El recorrido personal de Elsa continua en esta secuela, su
                                    viaje interior hasta su propia auto realización y auto
                                    aceptación es sin duda uno de los grandes aciertos de
                                    Disney. Esto es algo que nos viene dando Disney desde hace
                                    unos años con películas como Vaina (Moana) o Rompe Ralph
                                    pero con Elsa quizás este mensaje cobre un poco más de
                                    fuerza al ser un personaje que desde Frozen I nos muestra
                                    sus miedos e inseguridades.
                                </p>
                                <p>
                                    El papel de Anna cobra fuerza siendo ella la verdadera
                                    protagonista en las sombras, el verdadero hilo conductor en
                                    toda la historia, lleva el peso de la aventura y es el nexo
                                    de unión entre los demás personajes.
                                </p>
                                <p>
                                    En cuanto a Olaff pues entre broma y broma nos deja entrever
                                    sus preocupaciones y su particular crisis existencial en
                                    cuanto al tema de la madurez, en el cual niños y no tan
                                    niños se sentirán identificados.
                                </p>
                                <br />
                                <p>
                                    <span style="margin-top:3px">
                                        ¿Te ha resultado útil esta crítica?</span>
                                    <a class="float-right btn text-white btn-danger">
                                        <i class="fa fa-heart"></i>Me gusta</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        printInfo($film['nombre']);
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
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>