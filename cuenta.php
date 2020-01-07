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
    <br />
    <div class="container">
        <div class="span3 well">
            <div class="center">
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" alt="aboutme" width="140" height="140" class="img-circle" /></a>
                <h3>Pablo Pérez</h3>
                <em>Abre la imágen para saber más detalles</em>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" id="myModalLabel">
                            Más sobre tu usuario
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="center">
                            <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                                <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" alt="aboutme" width="140" height="140" class="img-circle" /></a>

                            <h3 class="media-heading">Pablo Pérez <small>España</small></h3>
                            <span><strong>Generos favoritos: </strong></span>
                            <span class="label label-warning">Comedia</span>
                            <span class="label label-info">Thriller</span>
                            <span class="label label-info">Aventuras</span>
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="color: blue">
                                Añadir género
                            </button>
                        </div>
                        <hr />
                        <div class="center">
                            <p class="text-left">
                                <strong>Biografía: </strong><br />
                                (Sin biografía)
                            </p>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Modificar biografía
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Salir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main row">
            <article class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h1>Bienvenido a tu cuenta</h1>
                <table class="table table-striped">
                    <tr>
                        <th>Nombre:</th>
                    </tr>
                    <tr>
                        <th>Nombre de usuario:</th>
                    </tr>
                    <tr>
                        <th>Correo electrónico:</th>
                    </tr>
                    <tr>
                        <th>Fecha de nacimiento:</th>
                    </tr>
                </table>

                <input type="button" class="btn btn-success" value="Opciones de administrador" onclick="location.href = 'administracion.html';" />
            </article>

            <aside class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <br />
                <a class="aside" href="modificar_usuario_admin.html">
                    <p>Modificar tus datos</p>
                </a>
                <a class="aside" href="favoritos_admin.html">
                    <p>Ver favoritos</p>
                </a>
                <a class="aside" href="criticas_admin.html">
                    <p>Leer tus críticas</p>
                </a>
                <a class="aside" href="preferencias_admin.html">
                    <p>Preferencias</p>
                </a>
            </aside>
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