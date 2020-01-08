<?php
require 'headers_index.php';
ob_start();


class Pelicula
{
  var $nombre, $director, $length, $portada;
  function Pelicula($nombre, $director, $length,  $portada)
  {
    $this->$nombre = $nombre;
    $this->$director = $director;
    $this->length = $length;
    $this->$portada = $portada;
  }
}



session_start();
function connectBD()
{
  $bd = "Trabajo";
  $conexion =  mysqli_connect("localhost", "root", "");
  mysqli_set_charset($conexion, "utf8");
  if (mysqli_connect_errno($conexion)) {
    echo 'Conexion fallida';
    exit();
  } else {
    mysqli_select_db($conexion, $bd) or die('No se encuentra la base de datos');
  }
  return $conexion;
}

$_SESSION['conn'] =  connectBD();
$conn =  connectBD();

function header_index($user)
{
  $query = mysqli_query($_SESSION['conn'], "select admin from usuario where admin = true");
  $row = mysqli_fetch_array($query, 1);
  if ($user != null) {
    if ($row['admin']) {
      header_administracion();
    } else   header_log();
  } else header_visitor();
}

function printBD()
{
  $query =  mysqli_query($_SESSION['conn'], "select * from persona");
  // lseek pointer row. [ column ]
  echo '<table border = \'1\'>';
  while ($row = mysqli_fetch_array($query, 1)) {
    echo '<tr>';
    echo '<td>' . $row['nombre'] . '</td>';
    echo '<td>' . $row['id'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
}

function printFimls($query)
{
  $i = 0;
  // lseek pointer row. [ column ]
  while ($row = mysqli_fetch_array($query, 1)) {
    $j = $i;
    if (!($i % 3)) echo '<div class="row">';
    echo '<div class="col-sm">';
    echo '';
    echo "<form action=\"pelicula.php\" method=\"get\">
          <input type=\"hidden\"
                 name=\"Pelicula[nombre]\"
                 value = \"" . $row['title'] . "\"
          />
            <input type=\"image\"
                   src=\"" . $row['src'] . "\"
                   class=\"rounded float-left index\" 
                   alt=\"" . $row['title'] . "\"/>

          </form>" .
      '</div>';
    if ($i == ($j + 2)) echo '</div>';
    $i++;
  }
}

function resultado_busqueda($var)
{

  for ($i = 0; $i < count($var); $i++) {
    if ($var[$i] == null) $var[$i] = "null";
  }

  $param = "select * from Pelicula where 1 and ";

  $q[0] = "title like '%{$var[0]}%' ";
  $q[1] = "and  actor like '{$var[1]}' ";
  $q[2] = "and director like '{$var[2]}'";

  for ($i = 0; $i < count($var); $i++)
    if (strcmp($var[$i], "null")) $param .= $q[$i];
  $param .= " group by title";

  $query =  mysqli_query($_SESSION['conn'], $param);
  printFimls($query);
}

function registro_update($user)
{

  if (strcmp($user['pass'], $user['passR'])) {
    echo '<div class="alert alert-warning" role="alert">
    passwords don\'t coincide
        </div>';
    exit();
  } else {
    $param = "update usuario set user = '{$user['nick']}',
                                 nombre =  '{$user['name']}', 
                                 apellido = '{$user['lastName']}',
                                 email = '{$user['email']}',
                                 Fnac = '{$user['Fnac']}',false,
                                 password = '{$user['pass']}')";


    if ($user['nick'] != null && $user['name'] != null && $user['lastName'] != null && $user['email'] != null && $user['Fnac'] != null && $user['pass'] != null) {
      if (mysqli_query($_SESSION['conn'], $param)) {
        echo "New record created successfully";
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['pass'];
        header("Location: index.php");
      } else {
        echo '<div class="alert alert-danger" role="alert">' . "Error: " . mysqli_error($_SESSION['conn']) . '</div>';
      }
    } else {
      echo '<div class="alert alert-danger" role="alert">Todos los campos son obligatorios</div>';
    }
  }
}

function registro($user)
{
  if (strcmp($user['pass'], $user['passR'])) {
    echo '<div class="alert alert-warning" role="alert">
    passwords don\'t coincide
        </div>';
    exit();
  } else {
    $param = "insert into usuario values('{$user['nick']}', '{$user['name']}', '{$user['lastName']}', '{$user['email']}','{$user['Fnac']}',false,'{$user['pass']}')";
    if ($user['nick'] != null && $user['name'] != null && $user['lastName'] != null && $user['email'] != null && $user['Fnac'] != null && $user['pass'] != null) {
      if (mysqli_query($_SESSION['conn'], $param)) {
        echo '<div class="alert alert-success" role="alert">' . "New record created successfully" . '</div>';

        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['pass'];
        header("Location: index.php");
      } else {
        echo '<div class="alert alert-danger" role="alert">' . "Error: " . mysqli_error($_SESSION['conn']) . '</div>';
      }
    } else {
      echo '<div class="alert alert-danger" role="alert">Todos los campos son obligatorios</div>';
    }
  }
}

function printInfo($film)
{
  $param = "select * from Pelicula where title like '{$film}' ";

  $query =  mysqli_query($_SESSION['conn'], $param);
  $row = mysqli_fetch_array($query, 1);
  echo "<div class=\"main row\">
  <article class=\"col-xs-12 col-sm-9 col-md-9 col-lg-9\">
      <h2>{$row['title']}</h2>
      <nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
          <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarText\" aria-controls=\"navbarText\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
              <span class=\"navbar-toggler-icon\"></span>
          </button>
          <div class=\"collapse navbar-collapse\" id=\"navbarText\">
              <ul class=\"navbar-nav mr-auto\">
                  <li class=\"nav-item active\">
                      <a class=\"nav-link\" href=\"#\">Ficha<span class=\"sr-only\">(current)</span></a>
                  </li>
                  <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"pelicula_critica.php\">Críticas</a>
                  </li>
                  <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"pelicula_trailer.html\">Trailer</a>
                  </li>
              </ul>
          </div>
      </nav>

      <div class=\"container\">
          <div class=\"row\">
              <div class=\"col-sm\">
                  <img class=\"img pelis\" src=\"" . $row['src'] . "\" alt=\"" . $row['title'] . "\" style=\"float: left; margin-right:30px\" title=\"" . $row['title'] . "\" />
                  <!-- Votacion por estrellas-->
                  <div class=\"vota\">
                      <h2>¡Vota esta película!</h2>
                      <form method=\"POST\">
                      <p class=\"clasificacion\">
                          <input id=\"radio1\" type=\"radio\" name=\"estrellas\" value=\"10\" />
                          <!--
  --><label for=\"radio1\">★</label>
                          <!--
  --><input id=\"radio2\" type=\"radio\" name=\"estrellas\" value=\"9\" />
                          <!--
  --><label for=\"radio2\">★</label>
                          <!--
  --><input id=\"radio3\" type=\"radio\" name=\"estrellas\" value=\"8\" />
                          <!--
  --><label for=\"radio3\">★</label>
                          <!--
  --><input id=\"radio4\" type=\"radio\" name=\"estrellas\" value=\"7\" />
                          <!--
  --><label for=\"radio4\">★</label>
                          <!--
  --><input id=\"radio5\" type=\"radio\" name=\"estrellas\" value=\"6\" />
                          <!--
  --><label for=\"radio5\">★</label>
                          <!--
  --><input id=\"radio6\" type=\"radio\" name=\"estrellas\" value=\"5\" />
                          <!--
  --><label for=\"radio6\">★</label>
                          <!--
  --><input id=\"radio7\" type=\"radio\" name=\"estrellas\" value=\"4\" />
                          <!--
  --><label for=\"radio7\">★</label>
                          <!--
  --><input id=\"radio8\" type=\"radio\" name=\"estrellas\" value=\"3\" />
                          <!--
  --><label for=\"radio8\">★</label>
                          <!--
  --><input id=\"radio9\" type=\"radio\" name=\"estrellas\" value=\"2\" />
                          <!--
  --><label for=\"radio9\">★</label>
                          <!--
  --><input id=\"radio10\" type=\"radio\" name=\"estrellas\" value=\"1\" />
                          <!--
  --><label for=\"radio10\">★</label>
                      </p>
                      <button class=\"btn btn-primary\" type=\"submit\" name=\"valora\">Valorar</button>
                  </form>
                      
                      <form method=\"post\">
                        <div class=\"btn-toolbar\" role=\"toolbar\">                      
                        <button type=\"submit\"  name = \"addfilm\" class=\"btn btn-warning\">
                        Añadir a favoritos
                        </button>                      
                        </div>
                      </form>
                      </div>
                  </div>
                      
              <div class=\"col\">
                  <div class=\"Section\">
                      <P>Título original:" . $row['title'] . "</P>
                      <p>Año:" . $row['dropyear'] . "</p>
                      <p>Duración: " . $row['length'] . ".</p>
                      <p style=\"display:inline\">País:</p>
                      <img src=\"img/eeuu.png\" alt=\"EEUU\" style=\"height:12px;margin: 0px 5px\" />
                      <p style=\"display:inline-block;\">" . $row['pais'] . "</p>
                      <p>Directores: Chris Buck, Jennifer Lee</p>
                      <p>Música:" . $row['musica'] . "</p>
                      <p>Reparto: Animación</p>
                      <p>
                          Productora:" . $row['productora'] . "
                      </p>
                      <p>Género: Animación</p>
                      <p>" . $row['sipnosis'] . "     
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </article>

  <div class=\"container\">
      <div class=\"row\">
          <div class=\"col-md-12\">
              <div class=\"well well-sm\">
                  <form class=\"form-horizontal\" method=\"post\">
                      <fieldset>
                          <div class=\"form-group\">
                              <textarea class=\"form-control\" id=\"message\" name=\"message\" placeholder=\"Escribe aquí tu opinión sobre la película. (Necesitas estar registrado)\" rows=\"7\"></textarea>
                          </div>
                          <div class=\"form-group\">
                          <form method=\"post\">
                              <button type=\"submit\" 
                                name = \"sendcritic\"
                              class=\"btn btn-primary btn-block\"> Enviar crítica
                              </button>
                              </form>
                          </div>
                      </fieldset>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>";


  if (isset($_POST["estrellas"])) {
    if (isset($_SESSION['login'])) {
      $val =  $_POST["estrellas"];
      $add = "insert into rating values('{$row['title']}','{$row['dropyear']}', '{$_SESSION['login']}', {$val})";
      if (!mysqli_query($_SESSION['conn'], $add)) {
        echo '<div class="alert alert-danger" role="alert">' . "Error: " . mysqli_error($_SESSION['conn']) . '</div>';
      } else echo '<div class="alert alert-success" role="alert">' . "Pelicula valorada " . '</div>';
    } else  echo '<div class="alert alert-danger" role="alert">' . "Error: " . 'Inicio de sesión obligatorio' . '</div>';
  }

  if (isset($_POST['addfilm'])) {
    if (isset($_SESSION['login'])) {
      if (!mysqli_query($_SESSION['conn'], "insert into pelicula_usuario values ('{$row['title']}','{$row['dropYear']}', '{$_SESSION['login']}')")) {
        echo '<div class="alert alert-danger" role="alert">' . "Error: " . mysqli_error($_SESSION['conn']) . '</div>';
      } else echo '<div class="alert alert-success" role="alert">' . "Pelicula añadida" . '</div>';
    } else  echo '<div class="alert alert-danger" role="alert">' . "Error: " . 'Inicio de sesión obligatorio' . '</div>';
  }
}

function cuenta_header($user)
{
  $query =  mysqli_query($_SESSION['conn'], "select * from usuario where user like '{$user}'");
  // lseek pointer row. [ column ]
  $row = mysqli_fetch_array($query, 1);
  echo '<div class="span3 well">
      <div class="center">
          <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" alt="aboutme" width="140" height="140" class="img-circle" /></a>
          <h3>' . $row['nombre'] . ' ' . $row['apellido'] . '</h3>
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

                      <h3 class="media-heading">' . $row['nombre'] . ' ' . $row['apellido'] . ' <small>España</small>
                      </h3>
 
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
  </div>';
}

function cuenta($user)
{
  $query =  mysqli_query($_SESSION['conn'], "select * from usuario where user like '{$user}'");
  // lseek pointer row. [ column ]
  $row = mysqli_fetch_array($query, 1);
  echo " <div class=\"main row\">
      <article class=\"col-xs-12 col-sm-9 col-md-9 col-lg-9\">
          <h1>Bienvenido a tu cuenta</h1>
          <table class=\"table table-striped\">
              <tr>
                  <th>Nombre:" . $row['nombre'] . "</th>
              </tr>
              <tr>
                  <th>Nombre de usuario:" . $row['user'] . "</th>
              </tr>
              <tr>
                  <th>Correo electrónico:" . $row['email'] . "</th>
              </tr>
              <tr>
                  <th>Fecha de nacimiento:" . $row['Fnac'] . "</th>
              </tr>
          </table>

          <input type=\"button\" class=\"btn btn-success\" value=\"Opciones de administrador\" onclick=\"location.href = 'administracion.html';\" />
      </article>

      <aside class=\"col-xs-12 col-sm-3 col-md-3 col-lg-3\">
          <br />
          <a class=\"aside\" href=\"modificar_usuario_admin.php\">
              <p>Modificar tus datos</p>
          </a>
          <a class=\"aside\" href=\"favoritos_admin.html\">
              <p>Ver favoritos</p>
          </a>
          <a class=\"aside\" href=\"criticas_admin.html\">
              <p>Leer tus críticas</p>
          </a>
          <a class=\"aside\" href=\"preferencias_admin.html\">
              <p>Preferencias</p>
          </a>
      </aside>
  </div>";
}
