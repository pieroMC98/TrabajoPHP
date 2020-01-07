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

  header_index($_SESSION['email']);
  ?>
  <div style="background-color: white;color: black;" class="container">
    <h1 class="display-1" style="color: black; margin-bottom: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(240, 248, 255, 0.034);">
      ADMINISTRACIÓN
    </h1>

    <article>
      <h2 class="display-4" style="color: #007bff; margin-bottom: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(240, 248, 255, 0.034);">
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
        <label for="fname1">Nombre usuario</label>
        <input id="fname1" name="fname1" type="text" placeholder="Nombre de usuario" class="form-control" />
        <button style="margin-top: 2%; margin-left: 45%;" type="button" class="btn btn-danger">
          Eliminar
        </button>
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
        <label for="fname2">Nombre usuario</label>
        <input id="fname2" name="fname2" type="text" placeholder="Nombre de usuario" class="form-control" />
        <button style="margin-top: 2%;" type="button" class="btn btn-primary btn-lg">
          Dar permisos de administrador
        </button>
        <button style="margin-top: 2%;" type="button" class="btn btn-secondary btn-lg">
          Eliminar permisos de administrador
        </button>
      </div>
    </article>

    <article>
      <h2 class="display-4" style="color: #007bff; margin-bottom: 1%; margin-top: 3%;;background-color: rgba(240, 248, 255, 0.034);">
        Administracion de peliculas
      </h2>
    </article>
    <h3 class="display-5" style="margin-left: 5%;margin-top: 3%;;background-color: rgba(240, 248, 255, 0.034);color: black;">
      Añadir pelicula
    </h3>
    <p style="margin-left: 5%; font-size: 90%">
      Puede añadir peliculas indicando todos los datos de esta.
    </p>

    <div style="margin-left: 3%; margin-bottom: 3%;" class="col-md-10">
      <label for="fname3">Nombre de la pelicula</label>
      <input id="fname3" name="fname3" type="text" placeholder="Nombre de la pelicula." class="form-control" />

      <label for="fname4">Id pelicula</label>
      <input style="margin-top: 3%;" id="fname4" name="fname4" type="text" placeholder="Id pelicula." class="form-control" />

      <textarea style="margin-top: 3%;" placeholder="Descripcion de la pelicula." class="form-control" rows="4"></textarea>

      <label for="file-input">file</label>
      <input style="margin-top: 3%;" name="file-input" id="file-input" type="file" />
      <br />

      <button style="margin: 3% 45%; " type="button" class="btn btn-success">
        Añadir
      </button>
    </div>

    <div style="padding-bottom: 3%;" class="col-md-10">
      <h3 class="display-6" style="background-color: rgba(240, 248, 255, 0.034);color: black;; margin-left: 5%; margin-top: 3%;">
        Eliminar película
      </h3>
      <p style="margin-left: 5%; font-size: 90%">
        Introduca el nombre o el ID de la pelicula que desea elmininar.
      </p>

      <label for="fname">ID/Nombre pelicula</label>
      <input style="margin-left: 5%; ;" id="fname" name="fname" type="text" placeholder="ID/Nombre pelicula." class="form-control" />
      <button style="margin-top: 2%; margin-left: 45%;" type="button" class="btn btn-danger">
        Eliminar
      </button>
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
  <script src=js/popper.min.js> </script> <script src=js/bootstrap.min.js> </script> </body> </html>