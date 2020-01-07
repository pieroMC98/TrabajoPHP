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
    if (isset($_SESSION['login'])) {
        echo 'Hola';
    } else echo 'Sin Session';

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

    <br />
    <div style="margin-left: 25%; margin-right: 25%;" class="card">
        <div class="card">
            <article class="card-body">
                <h1 style="margin-left: 42%;">Registrarse</h1>
                <form method="post" action="registro.php">
                    <input style="margin-top: 3%;" id="fname" name="name" value="<?php echo @$user['name'] ?>" type="text" placeholder="Nombre" class="form-control" />
                    <input style="margin-top: 3%;" id="fname" name="lastName" value="<?php echo @$user['lastName'] ?>" type="text" placeholder="Apellidos" class="form-control" />

                    <input style="margin-top: 3%;" id="fname2" name="correo" value="<?php echo @$user['correo'] ?>" type="text" placeholder="Correo electronico" class="form-control" />

                    <input style="margin-top: 3%;" id="fname3" name="nick" value="<?php echo @$user['nick'] ?>" type="text" placeholder="Nick" class="form-control" />

                    <div style="margin-top: 3%;" class="form-group">
                        <input class="form-control" placeholder="Contraseña" type="password" name="pass" />
                    </div>

                    <div style="margin-top: 3%;" class="form-group">
                        <input class="form-control" placeholder="Repetir contraseña" type="password" name="passR" />
                    </div>

                    <div class="form-group">
                        <p>Fecha de nacimiento</p>
                        <input style=" margin-bottom: 1%" type="date" id="start" name="Fnac" value="" min="1900-01-01" max="2020-01-01" value="<?php echo $user['Fnac'] ?>" />
                    </div>
                    <button style="margin-top: 3%; margin-left: 44%;" type="submit" class="btn btn-outline-success">
                        Registrarme
                    </button>
                </form>

                <?php
                @$user['name'] = htmlspecialchars($_POST['name']);
                @$user['lastName'] = htmlspecialchars($_POST['lastName']);
                @$user['email'] = htmlspecialchars($_POST['correo']);
                @$user['nick'] = htmlspecialchars($_POST['nick']);
                @$user['pass'] = htmlspecialchars($_POST['pass']);
                @$user['passR'] = htmlspecialchars($_POST['passR']);
                @$user['Fnac'] = htmlspecialchars($_POST['Fnac']);
                registro($user);
                ?>

            </article>
        </div>
    </div>

    <footer>
        <a class="footer" href="aviso_legal.html#Aviso_Legal">Aviso Legal</a> |
        <a class="footer" href="aviso_legal.html#Politica_de_privacidad">Politica de privacidad</a>
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