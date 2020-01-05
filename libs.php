<?php
require 'headers_index.php';
ob_start();


class Pelicula
{
  var $nombre, $director, $length, $id_peli, $portada;
  function Pelicula($nombre, $director, $length, $id_peli, $portada)
  {
    $this->$nombre = $nombre;
    $this->$director = $director;
    $this->length = $length;
    $this->$id_peli = $id_peli;
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
    echo "<a href=\"" . $row['title'] . "\">
            <img src=\"" . $row['src'] . "\"
             alt=\"" . $row['title'] . "\"
             title=\"" . $row['title'] . "\"
             class=\"rounded float-left index\" />
          </a>" .
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
