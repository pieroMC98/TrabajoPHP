<?php
require 'headers_index.php';
// header('Cache-Control: no cache'); //no cache
// session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too
ob_start();
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
  $query = mysqli_query($_SESSION['conn'], "select admin from usuario where email = '{$user}'");
  $row = mysqli_fetch_array($query, 1);

  if ($user != null) {
    if ($row['admin'])
      header_administracion();
    else
      header_log();
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
  // lseek pointer row. [ column ]
  $i = 0;
  while ($row = mysqli_fetch_array($query, 1)) {
    if (!($i % 3)) {
      echo '<div class="row">';
      $j = $i + 2;
    }
    echo '<div class="col-sm">' . '<br>';
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
    if ($i == $j) echo '</div>';
    $i++;
  }
  if (($i % 3)) echo '</div>';
}

function printFav($query)
{
  // lseek pointer row. [ column ]
  $q = mysqli_query($_SESSION['conn'], $query);
  //$_POST['delete'] = null;
  while ($row = mysqli_fetch_array($q, 1)) {
    echo ' <div class="container">
    <div class="row fila">
      <div class="col-lg-11">
        <a
          href="pelicula.php"
          class="list-group-item"
          style="height: 90px;justify-content: flex-start;"
          ><div class="text">' . $row['title'] . '</div>
        </a>
        <div class="float-right borde">
        <form method="post" action="favoritos.php">
        <input type="text" style="visibility:hidden" value="1" name="delete"/>
          <button type="submit" class="btn btn-outline-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>';
  }
  if (isset($_POST['delete'])) {
    $q = mysqli_query($_SESSION['conn'], $query);
    $row = mysqli_fetch_array($q, 1);
    $q1 = "delete from pelicula_usuario where title like '{$row['title']}' and user like '{$_SESSION['login']}' ";

    $q2 =  mysqli_query($_SESSION['conn'], $q1);
    if ($r = @mysqli_fetch_array($q2, 1)) {
      echo mysqli_error($r);
    }
  }
}

function printCommnet($query)
{
  // echo $query;
  $query = mysqli_query($_SESSION['conn'], $query);
  while ($row = mysqli_fetch_array($query, 1)) {
    echo " <div class=\"card\">
      <div class=\"card-body\">
          <div class=\"row\">
              <div class=\"col-md-2\">
                  <img src=\"{$row['nombre']}\" class=\"img img-rounded img-fluid\" alt=\"{$row['nombre']}\" />
                  <p class=\"text-secondary text-center\">1 de diciembre</p>
              </div>
              <div class=\"col-md-10\">
                  <p>
                      <a class=\"float-left\" href=\"cuenta.php\"><strong>{$row['nombre']}</strong></a>
                      <span class=\"float-right\"><i class=\"text-warning fa fa-star\"></i></span>
                      <span class=\"float-right\"><i class=\"text-warning fa fa-star\"></i></span>
                      <span class=\"float-right\"><i class=\"text-warning fa fa-star\"></i></span>
                      <span class=\"float-right\"><i class=\"text-warning fa fa-star\"></i></span>
                  </p>
                  <div class=\"clearfix\"></div>
                {$row['critica']}
                  <br />
                  <p>
                      <span style=\"margin-top:3px\">
                          ¿Te ha resultado útil esta crítica?</span>
                      <a class=\"float-right btn text-white btn-danger\">
                          <i class=\"fa fa-heart\"></i>Me gusta</a>
                  </p>
              </div>
          </div>
      </div>
  </div>";
  }
}

function resultado_busqueda($var)
{

  if ($var[3] == 0) {
    $param = "select * from pelicula where 1 ";
    $q[0] = "and title like '%{$var[0]}%' ";
    $q[1] = "and  title like ( select title_film from trabaja where apodo like '%{$var[1]}%'  and rol like 'actor' )  ";
    $q[2] = "and  title like ( select title_film from trabaja where apodo like '%{$var[2]}%'  and rol like 'director' )  ";
  } else {
    $param = "SELECT *,AVG(rate) as R FROM rating inner join pelicula on rating.title = pelicula.title where 1 ";
    $q[0] = "and rating.title like '%{$var[0]}%' ";
    $q[1] = "and  rating.title like ( select title_film from trabaja where apodo like '%{$var[1]}%'  and rol like 'actor' )  ";
    $q[2] = "and  rating.title like ( select title_film from trabaja where apodo like '%{$var[2]}%'  and rol like 'director' )  ";
  }

  if ($var[3] == 2)
    $q[3] = "and rating.user = '{$_SESSION['login']}'";

  for ($i = 0; $i < count($var); $i++)
    if (strcmp($var[$i], null)) $param .= @$q[$i];

  switch ($var[3]) {
    case 1:
      $param .= "  GROUP by rating.title order by R desc";
      break;

    case 2:
      $param .= " group by rating.title";
      break;
  }

  $query =  mysqli_query($_SESSION['conn'], $param);

  printFimls($query);
}

function registro_update($user)
{
  if (strcmp(@$user[4], @$user[5]) || !strcmp(@$user[4], null)) {
    echo '<div class="alert alert-warning" role="alert">
    passwords don\'t coincide
        </div>';
    exit();
  } else {
    $q = "update usuario set ";
    $set[3] = "user = '{$user[3]}' ,";
    $set[0] = " nombre =  '{$user[0]}',";
    $set[1] = " apellido = '{$user[1]}',";
    $set[2] = " email = '{$user[2]}',";
    $set[6] = " Fnac = '{$user[6]}',";
    $set[4] = " password = '{$user[4]}',";


    for ($i = 0; $i < count($user); $i++) {
      if (strcmp($user[$i], null)) $q .= @$set[$i];
    }

    $q[strlen($q) - 1] = ' ';
    $q .= " where user like '{$_SESSION['login']}'";


    if (mysqli_query($_SESSION['conn'], $q)) {
      echo '<div class="alert alert-success" role="alert">' . "usuario modificado " . '</div>';
      $_SESSION['email'] = $user['email'];
      $_SESSION['password'] = $user['pass'];
      $_SESSION['login'] = $user['nick'];
      header("Location: index.php");
    } else {
      echo '<div class="alert alert-danger" role="alert">' . "Error: " . mysqli_error($_SESSION['conn']) . '</div>';
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
    $param = "insert into usuario values('{$user['nick']}', '{$user['name']}', '{$user['lastName']}', '{$user['email']}','{$user['Fnac']}',false,'{$user['pass']}', null)";


    if ($user['nick'] != null && $user['name'] != null && $user['lastName'] != null && $user['email'] != null && $user['Fnac'] != null && $user['pass'] != null) {
      if (mysqli_query($_SESSION['conn'], $param)) {
        echo '<div class="alert alert-success" role="alert">' . "Nuevo usuario insertado" . '</div>';
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
  $param = "select * from pelicula where title like '{$film}' ";
  $reparto = "select * from trabaja where rol like 'actor' and title_film = '{$film}'";
  $director = "select * from trabaja where rol like 'director' and title_film = '{$film}'";

  $query =  mysqli_query($_SESSION['conn'], $param);
  $q =  mysqli_query($_SESSION['conn'], $reparto);
  $qd =  mysqli_query($_SESSION['conn'], $director);
  $avg =  mysqli_query($_SESSION['conn'], "select avg(rate), count(title) from rating where title like '{$film}'");
  $avgR = mysqli_fetch_row($avg);
  $j = null;
  $jd = null;
  foreach ($q as $i) {
    $j .= $i['nombre'] . ' ' . $i['apellido_empleado'];
    if ($i['nombre']) $j .= ', ';
  }

  $j[strlen($j) - 2] = '.';

  foreach ($qd as $i) {
    $jd .= $i['nombre'] . ' ' . $i['apellido_empleado'];
    if ($i['nombre']) $jd .= ', ';
  }

  $jd[strlen($jd) - 2] = '.';

  $row = mysqli_fetch_array($query, 1);

  echo "<div class=\"main row\">
  <article class=\"col-xs-12 col-sm-9 col-md-9 col-lg-9\">
      <h2>{$row['title']}</h2>      
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

                      <div style=\"padding:5px;
                      margin:5px;
                      border-radius: 13px 13px 13px 13px;
                      -moz-border-radius: 13px 13px 13px 13px;
                      -webkit-border-radius: 13px 13px 13px 13px;
                      border: solid 2px #007bff;
                      background-color:#007bff;
                      margin-bottom: 35px;
                      text-align: center;
                      color: white;
                      font-size: 24px;\">{$avgR[0]}   /   {$avgR[1]} votos </div> 
                      <button class=\"btn btn-primary\" type=\"submit\" name=\"valora\">Valorar</button>
                  </form>
                      <br>
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
                      
                      <p style=\"display:inline-block;\">" . $row['pais'] . "</p>
                      <p>Directores: " . $jd . "</p>
                      <p>Productor: " . $row['productora'] . "</p>

                      <p>Música: " . $row['musica'] . "</p>
                      <p>Reparto: " . $j . "</p>
                      <p>
                          Productora: " . $row['productora'] . "
                      </p>
                      <p>Género: " . $row['gener'] . "</p>
                      <p>Sipnosis: " . $row['sipnosis'] . "     
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </article>
  
  <div class=\"container\" style=\"margin-top:2%\">
      <div class=\"row\">
          <div class=\"col-md-12\">
              <div class=\"well well-sm\">
                  <form class=\"form-horizontal\" method=\"post\">
                      <fieldset>
                          <div class=\"form-group\">
                              <textarea class=\"form-control\" id=\"message\" name=\"message\" placeholder=\"Escribe aquí tu opinión sobre la película. (Necesitas estar registrado)\" rows=\"7\"></textarea>
                          </div>
                          <div class =\"form-group\">
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
      if (!mysqli_query($_SESSION['conn'], "insert into pelicula_usuario values ('{$row['title']}','{$row['dropyear']}', '{$_SESSION['login']}')")) {
        echo '<div class="alert alert-danger" role="alert">' . "Error: " . mysqli_error($_SESSION['conn']) . '</div>';
      } else echo '<div class="alert alert-success" role="alert">' . "Pelicula añadida" . '</div>';
    } else  echo '<div class="alert alert-danger" role="alert">' . "Error: " . 'Inicio de sesión obligatorio' . '</div>';
  }

  if (isset($_POST['message'])) {
    if (isset($_SESSION['login'])) {
      $query = "insert into critica values ('{$_SESSION['login']}', '{$row['title']}','{$row['dropyear']}','{$_POST['message']}')";
      if (!mysqli_query($_SESSION['conn'], $query)) {
        echo '<div class="alert alert-danger" role="alert">' . "Error: " . mysqli_error($_SESSION['conn']) . '</div>';
      } else echo '<div class="alert alert-success" role="alert">' . "Critica añadida" . '</div>';
    } else  echo '<div class="alert alert-danger" role="alert">' . "Error: " . 'Inicio de sesión obligatorio' . '</div>';
  }
}

function cuenta_header($user)
{
  $query =  mysqli_query($_SESSION['conn'], "select * from usuario where user like '{$user}'");
  // lseek pointer row. [ column ]
  $row = mysqli_fetch_array($query, 1);

  $nombre_fichero = "./img/user/" . $_SESSION['login'] . ".jpg";
  if (file_exists($nombre_fichero)) {
    $img_user = 'src="' . $nombre_fichero . '"';
  } else {
    $img_user = 'src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"';
  }

  echo '<div class="span3 well">
      <div class="center">
          <a href="#aboutModal" data-toggle="modal" data-target="#myModal">

          <img ' . $img_user . ' alt="aboutme" width="140" height="140" class="img-circle" />

          </a>
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
                          <img ' . $img_user . ' alt="aboutme" width="140" height="140" class="img-circle" /></a>
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
  if ($row['admin']) $admin = "<input type=\"button\" class=\"btn btn-success\" value=\"Opciones de administrador\" onclick=\"location.href = 'administracion.html';\" />";
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

          " . $admin . "
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

function viewCritic($user)
{
  $query = mysqli_query($_SESSION['conn'], $user);
  while ($row = mysqli_fetch_array($query, 1)) {
    echo ' <div class="container">
    <h2 class="display-5" style="color: black; margin-left: 1%; margin-top: 3%; padding-top: 1%;background-color: rgba(255, 255, 255, 0.144);">
    ' . $row['title'] . '
    </h2><div style=" background-color: #d9dddf;border-radius: 21px 21px 21px 21px;
box-shadow: 10px 13px 15px -9px rgba(0,0,0,0.94);
 padding: 2% 2% 2% 2%;color: black;">
      ' . $row['critica'] . '
      <form method="post">
      <input type="text" style="visibility:hidden" value="1" name="delete"/>
        <button style="margin-bottom: 2%; margin-left: 45%;" type="submit" class="btn btn-outline-danger">
            Eliminar
        </button>
        </form>
    </div>
</div>';
  }

  if (isset($_POST['delete'])) {
    $q = mysqli_query($_SESSION['conn'], $user);
    $row = mysqli_fetch_array($q, 1);
    $q1 = "delete from critica where critica like '{$row['critica']}' and user like '{$_SESSION['login']}' ";
    $q2 =  mysqli_query($_SESSION['conn'], $q1);
    if ($r = @mysqli_fetch_array($q2, 1)) {
      echo mysqli_error($r);
    }
  }
}
