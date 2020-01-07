<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <!--Para que se pueda ver en cualquier dispositivo-->
    <!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> -->
    <title>Peliculas</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/estilos.css" />
</head>

<body>
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
                            <div class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Buscar" />
                            </div>
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
        <h1 class="display-4" style="color: #007bff; margin-bottom: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(255, 255, 255, 0.144);">
            Sus criticas mas recientes
        </h1>

        <div class="container">
            <h2 class="display-5" style="color: black; margin-left: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(255, 255, 255, 0.144);">
                Frozen
            </h2>
            <div style=" background-color: #d9dddf;border-radius: 21px 21px 21px 21px;
        box-shadow: 10px 13px 15px -9px rgba(0,0,0,0.94);
         padding: 2% 2% 2% 2%;color: black;">
                <p>
                    Frozen II podría haber sido realizada de cualquier manera y en
                    cualquier tiempo que posiblemente hubiese sido un fenómeno en
                    taquilla, pero Disney ha querido darnos una secuela a la altura de
                    su predecesora que bien podría ser el buque insignia de esta nueva
                    generación Disney.
                </p>
                <p>
                    Una historia diferente, que no estira el argumento del film
                    original, simplemente utiliza un mensaje: el amor como puente entre
                    las dos películas. Si en la anterior película nos mostraban que el
                    amor fraternal es más poderoso que el clásico amor romántico en esta
                    nos dejan un mensaje más que potente: El amor propio vale igual o
                    incluso más que cualquier otro.
                </p>
                <p>
                    El recorrido personal de Elsa continua en esta secuela, su viaje
                    interior hasta su propia auto realización y auto aceptación es sin
                    duda uno de los grandes aciertos de Disney. Esto es algo que nos
                    viene dando Disney desde hace unos años con películas como Vaina
                    (Moana) o Rompe Ralph pero con Elsa quizás este mensaje cobre un
                    poco más de fuerza al ser un personaje que desde Frozen I nos
                    muestra sus miedos e inseguridades.
                </p>
                <p>
                    El papel de Anna cobra fuerza siendo ella la verdadera protagonista
                    en las sombras, el verdadero hilo conductor en toda la historia,
                    lleva el peso de la aventura y es el nexo de unión entre los demás
                    personajes.
                </p>
                <p>
                    En cuanto a Olaff pues entre broma y broma nos deja entrever sus
                    preocupaciones y su particular crisis existencial en cuanto al tema
                    de la madurez, en el cual niños y no tan niños se sentirán
                    identificados.
                </p>
                <button style="margin-bottom: 2%; margin-left: 45%;" type="button" class="btn btn-outline-danger">
                    Eliminar
                </button>
            </div>
        </div>

        <div class="container">
            <h2 class="display-5" style="color: black; margin-left: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(255, 255, 255, 0.144);">
                Joker
            </h2>
            <div style=" background-color: #d9dddf;border-radius: 21px 21px 21px 21px;
        box-shadow: 10px 13px 15px -9px rgba(0,0,0,0.94);
        border: 0px solid #000000; padding: 2% 2% 2% 2%;color: black;">
                <p>
                    Absoluta maravilla con un Joaquin Phoenix sublime. 'Joker' es una
                    película desgarradora y terrorífica en la que somos testigos de cómo
                    un hombre pierde su cordura para transformarse en el legendario
                    villano de DC Comics. De cómo la ira de una sociedad quemada hasta
                    el extremo ensalza a un psicópata como héroe absoluto.
                </p>
                <button style="margin-bottom: 2%; margin-left: 45%;" type="button" class="btn btn-outline-danger">
                    Eliminar
                </button>
            </div>
        </div>

        <div class="container">
            <h2 class="display-5" style="color: black; margin-left: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(255, 255, 255, 0.144);">
                Knives Out
            </h2>
            <div style=" background-color: #d9dddf;border-radius: 21px 21px 21px 21px;
        box-shadow: 10px 13px 15px -9px rgba(0,0,0,0.94);
        color: #000000; padding: 2% 2% 2% 2%;">
                <p>
                    Es una película de las de antes, sin casi efectos especiales y que
                    priman las interpretaciones. Los actores tienen su momento cada uno
                    de ellos pero la que se lleva la palma es señorita Ana de Armas
                    (lleva la película ella sola).
                </p>
                <button style="margin-bottom: 2%; margin-left: 45%;" type="button" class="btn btn-outline-danger">
                    Eliminar
                </button>
            </div>
        </div>

        <div class="container">
            <h2 class="display-5" style="color: black; margin-left: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(255, 255, 255, 0.144);">
                El traidor
            </h2>
            <div style=" background-color: #d9dddf;border-radius: 21px 21px 21px 21px;
        box-shadow: 10px 13px 15px -9px rgba(0,0,0,0.94);
        color: #000000; padding: 2% 2% 2% 2%;">
                <p>
                    Estamos ante una película ampulosa, que retrata con grandeza un
                    aspecto importantísimo de la historia Italiana con los hechos
                    sucedidos luego que el integrante de la Cosa Nostra Tomasso Buscetta
                    declara en las cortes italianas como testigo protegido. Es realmente
                    bueno que Italia tenga a su propio Padrino retratado en el cine,
                    luego de la maestría con que lo hiciera Coppola lo cual le valió el
                    comentario de Henry Kissinger a su estreno en los cines Americanos,
                    de que un director que emociona a los espectadores retratando a un
                    mafioso rozó la grandeza.
                </p>
                <button style="margin-bottom: 2%; margin-left: 45%;" type="button" class="btn btn-outline-danger">
                    Eliminar
                </button>
            </div>
        </div>
    </div>

    <footer>
        <a class="footer" href="aviso_legal_admin.html#Aviso_Legal">Aviso Legal</a>
        |
        <a class="footer" href="aviso_legal_admin.html#Politica_de_privacidad">Política de privacidad</a>
        |
        <a class="footer" href="aviso_legal_admin.html#Politica_de_Cookies">Política de Cookies</a>

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