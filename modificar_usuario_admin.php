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
                                        <a class="drop" href="criticas.html">Ver tus criticas</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li style="margin:10px">
                                        <a class="drop" href="#">Preferencias</a>
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

    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10">
                <h1 style="margin-top: 10px">Nombre de usuario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" />
                    <h6>Cambiar foto de perfil...</h6>
                    <input type="file" class="text-center center-block file-upload" />
                </div>
                <br />
            </div>
            <!--/col-3-->
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr />
                        <form class="form" method="post" id="registrationForm">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name">Nombre</label>
                                    <input type="text" class="form-control" name="name" id="first_name" placeholder="Nombre real" title="Introduce tu nombre real." />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name">Apellido</label>
                                    <input type="text" class="form-control" name="name" id="lastName" placeholder="Nombre real" title="Introduce tu nombre real." />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="last_name">Nombre de usuario></label>
                                    <input type="text" class="form-control" name="nick" id="last_name" placeholder="Nombre de usuario" title="Introduce tu nombr de usuario." />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email">Cambiar email></label>
                                    <input type="email" class="form-control" name="correo" id="email" placeholder="you@email.com" title="Introduce tu email." />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="password">Cambiar contraseña</label>
                                    <input type="password" class="form-control" name="pass" id="password" placeholder="Contraseña" title="Introduce la nueva contraseña." />

                                    <input style="margin-top:5px " type="password" class="form-control" name="passR" id="password2" placeholder="Repite tu contraseña" title="Repite la contraseña." />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br />
                                    <button class="btn btn-lg btn-success" type="submit">
                                        <i class="glyphicon glyphicon-ok-sign"></i> Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php
                        @$user['name'] = htmlspecialchars($_POST['name']);
                        @$user['lastName'] = htmlspecialchars($_POST['lastName']);
                        @$user['email'] = htmlspecialchars($_POST['correo']);
                        @$user['nick'] = htmlspecialchars($_POST['nick']);
                        @$user['pass'] = htmlspecialchars($_POST['pass']);
                        @$user['passR'] = htmlspecialchars($_POST['passR']);
                        @$user['Fnac'] = htmlspecialchars($_POST['Fnac']);
                        registro_update($user);
                        ?>
                        <hr />
                    </div>
                    <!--/tab-content-->
                </div>
                <!--/col-9-->
            </div>
            <!--/row-->
        </div>
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