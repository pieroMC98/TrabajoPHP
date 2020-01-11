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

    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10">
                <h1 style="margin-top: 10px">Nombre de usuario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">

                    <?php
                    $nombre_fichero = "./img/user/" . $_SESSION['login'] . ".jpg";
                    if (file_exists($nombre_fichero)) {
                        echo '<img src="' . $nombre_fichero . '" class="avatar img-circle img-thumbnail" alt="avatar" />';
                    } else {
                        echo '<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" />';
                    }
                    ?>


                    <h6>Cambiar foto de perfil..</h6>
                    <?php
                    if (isset($_SESSION['message']) && $_SESSION['message']) {
                        printf('<b>%s</b>', $_SESSION['message']);
                        unset($_SESSION['message']);
                    }
                    ?>
                    <form method="POST" action="upload.php" enctype="multipart/form-data">
                        <div>

                            <input type="file" name="uploadedFile" />
                        </div>

                        <input type="submit" name="uploadBtn" value="Subir" />
                    </form>
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
                                <div class="col-xs-6">
                                    <label for="password">Cambiar Fecha nacimento</label>
                                    <input type="date" class="form-control" name="Fnac" id="password" placeholder="Contraseña" title="nueva fecha" />

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