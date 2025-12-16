<?php
require_once "./../vendor/autoload.php";

use clases\Plantilla;

session_start();

$submit = $_POST["submit"]??null;

switch($submit){
  case "Volver a jugar":
    unset($_SESSION["mostrarClave"]);
    unset($_SESSION["clave"]);
    unset($_SESSION["jugadas"]);

    header("location: ./jugar.php");
    break;
  default:
    if(!isset($_SESSION["usuario"])){
      header("location: ./index.php");
    }
}

$htmlMostrarResultado = Plantilla::mostrarResultadoPartida($_SESSION["clave"], $_SESSION["jugadas"]);
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fin del Juego - Mastermind</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-100 font-sans text-slate-800">
  <?= $htmlMostrarResultado ?>
</body>
</html>
