<?php
  $datos = $_POST["datos"] ?? [];
  $nombrePost = $_POST["nombre"] ?? "";
  $numeroPost = $_POST["numero"] ?? "";
  $textoError = "";
  $botonEliminarTodos = $_POST["eliminarTodos"] ?? null;
  $botonSubmit = $_POST["submit"] ?? null;

  $agregarNumero = function() use (&$datos, $nombrePost, $numeroPost, &$textoError): void {
    if ($nombrePost === "") {
      $textoError .= "<br />Debes introducir un nombre";
      return;
    }

    if ($numeroPost === "") {
      if (isset($datos[$nombrePost])) {
        unset($datos[$nombrePost]);
        return;
      }

      $textoError .= "<br />Debes introducir un número para el nuevo contacto $nombrePost<br />";
      return;
    }

    $datos[$nombrePost] = $numeroPost;
  };
  
  if ($botonEliminarTodos) {
    $datos = [];
  }

  if ($botonSubmit) {
    $agregarNumero();
  }

  $mostrarDatos = function() use ($datos): string {
    $html = "";
    if (!empty($datos)) {
      foreach ($datos as $nombre => $numero) {
        $html .= "<input type='hidden' name='datos[$nombre]' value='$numero' />";
        $html .= "<h2>$nombre - $numero</h2>";
      }
    } else {
      $html .= "<br />agenda vacía";
    }
    return $html;
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>agenda</title>
</head>
<body>
  <form action="agenda.php" method="POST">
    <h1>Agenda</h1>
    <input type="text" name="nombre" placeholder="nombre">
    <input type="number" name="numero" placeholder="numero">

    <?php
      echo $mostrarDatos();
      echo "<p style='color:red;'>$textoError</p>";
    ?>

    <button type="submit" name="submit" value="submit">Agregar</button>
    <button name="eliminarTodos" value="eliminarTodos" <?= empty($datos) ? "disabled" : "" ?>>Eliminar todos los contactos</button>
  </form>
</body>
</html>
