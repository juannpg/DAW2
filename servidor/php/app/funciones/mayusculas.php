<?php
  function mayusculas(string &$name): void {
    echo "<h2>(dentro de la funcion) $name </h2>";
    $name = strtoupper($name);
    echo "<h2>(dentro de la funcion) $name en mayus </h2>";
  }

  echo "<h1>Uso de la funcion mayusculas con referencia</h1>";
  $nombre = "juan";
  mayusculas($nombre);
  echo "<h2>(tras la funcion) $nombre</h2>";

  function mayusculas2(string $name): void {
    echo "<h2>(dentro de la funcion) $name </h2>";
    $name = strtoupper($name);
    echo "<h2>(dentro de la funcion) $name en mayus </h2>";
  }

  echo "<h1>Uso de la funcion mayusculas sin referencia</h1>";
  $nombre = "juan";
  mayusculas2($nombre);
  echo "<h2>(tras la funcion) $nombre</h2>";
?>