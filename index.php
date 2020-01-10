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
    ob_start();
    $R = 0;
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $q = "Select user from usuario where email like '{$_POST['email']}' and PASSWORD = '{$_POST['password']}'";
        $query = mysqli_query($conn, $q);
        $p = mysqli_fetch_array($query, 1);
        if ($p) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
        } else $R = 1;

        // nombre de usuario
        // echo "--> " . $p['user'] . '<br>';
        $_SESSION['login'] = $p['user'];
    }

    if ($R == 1) {
        echo 'Me redirige';
        header("Location: clientes.php");
    }

    @header_index($_SESSION['email']);
    //echo $user.'  '.$password;
    ?>

    <br />
    <div class="container">
        <h1 id="cartelera">Cartelera España</h1>
        <div class="container">
            <?php
            $query =  mysqli_query($_SESSION['conn'], "select * from pelicula group by title");
            printFimls($query);
            ?>
        </div>

    </div>

    <br />
    <div class="container">
        <h1 id="estrenos">Próximos estrenos</h1>
        <div class="row">
            <div class="col-sm">
                <img src="img/proximos/knives.jpg" alt="Knives Out" title="Knives Out" class="rounded float-left index" />
            </div>
            <div class="col-sm">
                <img src="img/proximos/ladron.jpg" alt="La hija de un ladrón" title="La hija de un ladrón" class="rounded float-left index" />
            </div>
            <div class="col-sm">
                <img src="img/proximos/legado.jpg" alt="Legado en los huesos" title="Legado en los huesos" class="rounded float-left index" />
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <img src="img/proximos/lomejor.jpg" alt="Lo Mejor está por venir" title="Lo mejor está por venir" class="rounded float-left index" />
            </div>
            <div class="col-sm">
                <img src="img/proximos/odisea.jpg" alt="La Odisea de los Giles" title="La Odisea de los Giles" class="rounded float-left index" />
            </div>
            <div class="col-sm">
                <img src="img/proximos/traidor.jpg" alt="Il Traditore" title="El Traidor" class="rounded float-left index" />
            </div>
        </div>
    </div>
    <br>
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