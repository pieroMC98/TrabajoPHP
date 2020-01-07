<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <!--Para que se pueda ver en cualquier dispositivo-->
    <!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> -->
    <title>Peliculas</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/estilos.css" />
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
                <a class="navbar-brand" href="index_administrador.html"><img src="img/idma.png" alt="Logo" style="height:35px;" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!--Botón que aparece cuando se hace pequeña la pagina-->
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index_administrador.html#cartelera">Cartelera España</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index_administrador.html#estrenos">Próximos estrenos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contacto_admin.html">Contacto</a>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Buscar" />
                            </form>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline my-2 my-lg-0" action="busqueda_avanzada_admin.html">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                    Búsqueda avanzada
                                </button>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-right:7px">
                                    Mi cuenta <span class="caret"></span>
                                </button>

                                <ul class="dropdown-menu" role="menu">
                                    <li style="margin:10px">
                                        <a class="drop" href="cuenta_admin.html">Ir a mi cuenta</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li style="margin:10px">
                                        <a class="drop" href="modificar_usuario_admin.html">Modificar tus datos</a>
                                    </li>
                                    <li style="margin:10px">
                                        <a class="drop" href="favoritos_admin.html">Ver tus favoritos</a>
                                    </li>
                                    <li style="margin:10px">
                                        <a class="drop" href="criticas_admin.html">Ver tus criticas</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li style="margin:10px">
                                        <a class="drop" href="preferencias_admin.html">Preferencias</a>
                                    </li>
                                    <li style="margin:10px">
                                        <a class="drop" href="administracion.html">Opciones de administrador</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-log-out"></span> Cerrar
                                Sesión
                            </button>
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
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Ficha<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pelicula_critica_admin.html">Críticas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pelicula_trailer_admin.html">Trailer</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <img class="img pelis" src="img/frozen.jpg" alt="Frozen 2" style="float: left; margin-right:30px" title="Frozen 2" />
                            <!-- Votacion por estrellas-->
                            <div class="vota">
                                <h2>¡Vota esta película!</h2>
                                <form>
                                    <p class="clasificacion">
                                        <input id="radio1" type="radio" name="estrellas" value="10" />
                                        <!--
								--><label for="radio1">★</label>
                                        <!--
								--><input id="radio2" type="radio" name="estrellas" value="9" />
                                        <!--
								--><label for="radio2">★</label>
                                        <!--
								--><input id="radio3" type="radio" name="estrellas" value="8" />
                                        <!--
								--><label for="radio3">★</label>
                                        <!--
								--><input id="radio4" type="radio" name="estrellas" value="7" />
                                        <!--
								--><label for="radio4">★</label>
                                        <!--
								--><input id="radio5" type="radio" name="estrellas" value="6" />
                                        <!--
								--><label for="radio5">★</label>
                                        <!--
								--><input id="radio6" type="radio" name="estrellas" value="5" />
                                        <!--
								--><label for="radio6">★</label>
                                        <!--
								--><input id="radio7" type="radio" name="estrellas" value="4" />
                                        <!--
								--><label for="radio7">★</label>
                                        <!--
								--><input id="radio8" type="radio" name="estrellas" value="3" />
                                        <!--
								--><label for="radio8">★</label>
                                        <!--
								--><input id="radio9" type="radio" name="estrellas" value="2" />
                                        <!--
								--><label for="radio9">★</label>
                                        <!--
								--><input id="radio10" type="radio" name="estrellas" value="1" />
                                        <!--
								--><label for="radio10">★</label>
                                    </p>
                                </form>

                                <div class="btn-toolbar" role="toolbar">
                                    <button type="submit" class="btn btn-warning">
                                        Añadir a favoritos
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="Section">
                                <P>Título original: Frozen II</P>
                                <p>Año: 2019</p>
                                <p>Duración: 103 min.</p>
                                <p style="display:inline">País:</p>
                                <img src="img/eeuu.png" alt="EEUU" style="height:12px;margin: 0px 5px" />
                                <p style="display:inline-block;">Estados Unidos</p>
                                <p>Directores: Chris Buck, Jennifer Lee</p>
                                <p>Música: Christophe Beck</p>
                                <p>Reparto: Animación</p>
                                <p>
                                    Productora: Walt Disney Animation Studios / Walt Disney
                                    Pictures
                                </p>
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
            </article>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <form class="form-horizontal" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="message" placeholder="Escribe aquí tu opinión sobre la película. (Necesitas estar registrado)" rows="7"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Enviar crítica
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
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
    <script src="js/popper.min.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
</body>

</html>