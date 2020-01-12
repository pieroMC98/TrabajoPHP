
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
  <div style="background-color: white;color: black;" class="container">

    <article>
      <h2 class="display-4" style="color: #007bff; margin-bottom: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(240, 248, 255, 0.034); font-size: 34px">
        Administración de usuarios
      </h2>
      <h3 class="display-5" style="color: black; margin-left: 5%; margin-top: 3%;background-color: rgba(240, 248, 255, 0.034);">
        Eliminar usuario
      </h3>
      <p style="margin-left: 5%; font-size: 90%;background-color: rgba(240, 248, 255, 0.034);color: black;">
        Puede eliminar cualquier usuario a excepción de los administradores
        del sistema.
      </p>
      <div style="margin-left: 3%" class="col-md-10">
        <form method="post">
          <input id="fname1" name="fname1" type="text" placeholder="Nombre de usuario" class="form-control" />
          <button style="margin-top: 2%; margin-left: 45%;" type="submit" class="btn btn-danger">
            Eliminar
          </button>
        </form>
        <?php

        if (isset($_POST['fname1'])) {

          $var = $_POST['fname1'];
          $existe = "select count(*) from usuario WHERE user = '{$var}' and admin = 0";
          $q1 =  mysqli_query($_SESSION['conn'], $existe);

          $delete = "delete from `usuario` WHERE user = '{$var}' and admin = 0";
          $query =  mysqli_query($_SESSION['conn'], $delete);
        }

        ?>
      </div>
    </article>

    <article>
      <h2 class="display-6" style="color: black; margin-left: 5%; margin-top: 3%;;background-color: rgba(240, 248, 255, 0.034)">
        Modificar usuario
      </h2>
      <p style="margin-left: 5%; font-size: 90%">
        Puede dar y revocar los permisos de administrador al usuario que
        quiera.
      </p>
      <div style="margin-left: 3%;" class="col-md-10">
        <form method="post">
          <input id="fname2" name="fname2" type="text" placeholder="Nombre de usuario" class="form-control" />
          <button style="margin-top: 2%;" type="sumbit" name="b1" class="btn btn-primary btn-lg">
            Dar permisos de administrador
          </button>

          <?php

          if (isset($_POST['fname2']) && isset($_POST['b1'])) {

            $var2 = $_POST['fname2'];

            $permisos = "UPDATE usuario SET admin= '1' WHERE admin = '0' and user like '{$var2}' ";
            if (mysqli_query($_SESSION['conn'], $permisos)) {

              echo '<div class="alert alert-success" role="alert">' . $var2 . ' ahora es administrador.</div>';;
            } else {
              echo '<div class="alert alert-danger" role="alert">' . $var2 . ' ya era administrador.</div>';
            }
          }
          ?>
          <button style="margin-top: 2%;" type="submit" name="b2" class="btn btn-secondary btn-lg">
            Eliminar permisos de administrador
          </button>

          <?php

          if (isset($_POST['fname2']) && isset($_POST['b2'])) {

            $var2 = $_POST['fname2'];

            $quitarpermisos = "UPDATE usuario SET admin= '0' WHERE admin = '1' and user like '{$var2}' ";

            if (mysqli_query($_SESSION['conn'], $quitarpermisos)) {

              echo '<div class="alert alert-success" role="alert">' . $var2 . ' ha dejado de ser administrador.</div>';
            } else {
              echo '<div class="alert alert-danger" role="alert">' . $var2 . ' no era administrador.</div>';
            }
          }
          ?>
        </form>
      </div>
    </article>

    <article>
      <h2 class="display-4" style="color: #007bff; margin-bottom: 1%; margin-top: 3%;;background-color: rgba(240, 248, 255, 0.034); font-size: 34px">
        Administración de películas
      </h2>
    </article>
    <h3 class="display-5" style="margin-left: 5%;margin-top: 3%;;background-color: rgba(240, 248, 255, 0.034);color: black;">
      Añadir pelicula
    </h3>
    <p style="margin-left: 5%; font-size: 90%">
      Puede añadir peliculas indicando todos los datos de esta.
    </p>

    <div style="margin-left: 3%; margin-bottom: 3%;" class="col-md-10">

      <form method="post" action="upload_film.php" enctype="multipart/form-data">
      
        <input id="fname3" name="fname3" type="text" placeholder="Nombre de la pelicula." class="form-control" />


        <input style="margin-top: 3%;" id="fname4" name="fname4" type="text" placeholder="Año de publicación." class="form-control" />

        <input style="margin-top: 3%;" id="fname5" name="fname5" type="text" placeholder="País." class="form-control" />

        <input style="margin-top: 3%;" id="fname6" name="fname6" type="text" placeholder="Género." class="form-control" />

        <textarea style="margin-top: 3%;" name="fname7" placeholder="Sinopsis de la pelicula." class="form-control" rows="4"></textarea>

        <?php
                    if (isset($_SESSION['message']) && $_SESSION['message']) {
                        printf('<b>%s</b>', $_SESSION['message']);
                        unset($_SESSION['message']);
                    }
                    
        ?>
        
                    
        <input type="file" name="uploadedFile" />     
        <br />

        

        <button style="margin: 3% 45%; " type="sumbit" class="btn btn-success" value="Subir" name="uploadBtn">
          Añadir
        </button>
      </form>

      <?php

      if (isset($_POST['fname3'], $_POST['fname4'], $_POST['fname5'], $_POST['fname6'], $_POST['fname7'])) {

        $nombre = $_POST['fname3'];
        $year = $_POST['fname4'];
        $genero = $_POST['fname5'];
        $sinopsis = $_POST['fname6'];
        $src = 'img/'. $nombre . '.jpg';

        $anadir = "insert into pelicula(title, gener, dropyear, sipnosis, src) VALUES ('{$nombre}','{$genero}','{$year}','{$sinopsis}', '{$src}');";
        $query =  mysqli_query($_SESSION['conn'], $anadir);

        rename( 'img/' . $_SESSION['login'] . '.jpg', $src);
      }

      ?>
    </div>

    <div style="padding-bottom: 3%;" class="col-md-10">
      <h3 class="display-6" style="background-color: rgba(240, 248, 255, 0.034);color: black;; margin-left: 5%; margin-top: 3%;">
        Eliminar película
      </h3>
      <p style="margin-left: 5%; font-size: 90%">
        Introduca el nombre de la pelicula que desea elmininar.
      </p>

      <form method="post">
        <input style="margin-left: 5%; ;" id="fname" name="fname" type="text" placeholder="Nombre pelicula." class="form-control" />
        <button style="margin-top: 2%; margin-left: 45%;" type="button" class="btn btn-danger">
          Eliminar
        </button>
      </form>
      <?php

      if (isset($_POST['fname'])) {

        $var1 = $_POST['fname'];

        $delete_peli = "delete from `pelicula` WHERE title = '{$var1}'";
        $query =  mysqli_query($_SESSION['conn'], $delete_peli);
      }

      ?>
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
  <script src="js/jquery-3.4.1.min.js">
    // Jquery libraries
  </script>
  <script src="js/popper.min.js"> </script>
  <script src="js/bootstrap.min.js"> </script>
</body>

</html>