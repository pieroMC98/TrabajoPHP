<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Iniciar sesión</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/estilos.css" />
    <?php include 'libs.php' ?>

</head>

<body>
    <?php
    if (isset($_SESSION['login'])) {
        echo 'Hola';
    } else echo 'Sin Session';
    $user = null;

    header_index($user);
    ?>
    <div class="containernav">
        <header>
            <nav class="navbar navbar-expand-lg navbar-collapse navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img src="img/idma.png" alt="Logo" style="height:35px;" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <!--Botón que aparece cuando se hace pequeña la pagina-->
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#cartelera">Cartelera España</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php#estrenos">Próximos estrenos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contacto.php">Contacto</a>
                        </li>

                        <li class="nav-item">
                            <div class="form-inline my-2 my-lg-0">
                                <label for="search">busqueda</label>
                                <input id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Buscar" />
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="form-inline my-2 my-lg-0">
                                <label for="BA">Búsqueda avanzada</label>
                                <input id="BA" type="button" value="Búsqueda avanzada" class="btn btn-outline-success my-2 my-sm-0" />
                            </div>
                        </li>
                    </ul>

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a style="padding: 0.5rem 1rem" href="clientes.php">Iniciar sesión</a>
                        </li>

                        <li class="nav-item">
                            <a style="padding: 0.5rem 1rem" href="registro.php">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    <br />

    <h1 style="margin-left: 45%;" class="card-title mb-4 mt-1">
        Iniciar sesión
    </h1>
    <div style="margin-left: 25%; margin-right: 25%;" class="card">
        <div class="card-body">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="email"></label>
                    <input id="email" name="email" class="form-control" placeholder="Correo electrónico" type="email" />
                </div>
                <!-- form-group// -->
                <div class="form-group">
                    <label for="password"></label>
                    <input id="password" name="password" class="form-control" placeholder="Contraseña" type="password" />
                </div>
                <!-- form-group// -->
                <div class="form-group">
                    <label for="init"></label>
                    <button id="init" name="submit" style="margin-bottom: 2%;" type="submit" class="btn btn-primary btn-lg btn-block">
                        Iniciar sesión
                    </button>
                </div>
                <!-- form-group// -->
            </form>
            <button class="btn btn-secondary btn-lg btn-block" onclick="window.location.href='registro.php';">
                Aún no tengo una cuenta. Registrarme
            </button>
        </div>
    </div>
    <footer>
        <a class="footer" href="aviso_legal.php#Aviso_legal">Aviso Legal</a> |
        <a class="footer" href="aviso_legal.php#Politica_de_privacidad">Politica de privacidad</a>
        |
        <a class="footer" href="aviso_legal.php#Politica_de_Cookies">Política de Cookies</a>

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