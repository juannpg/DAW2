<?php
require_once "./../vendor/autoload.php";

use clases\Plantilla;
use clases\Clave;
use clases\Jugada;

session_start();

$clave = Clave::obtenerInstanciaClave();

if(!isset($_SESSION["clave"])) {
  $claveGenerada = $clave->generar();
  $_SESSION["clave"] = $claveGenerada;
}

$submit = $_POST["submit"]??null;

$mensaje = "";
$botonMostrarClave = isset($_SESSION["mostrarClave"])?!$_SESSION["mostrarClave"]:true;

switch ($submit) {
  case "Mostrar Clave":
    $_SESSION["mostrarClave"] = true;
    $botonMostrarClave = false;

    break;
  case "Ocultar Clave":
    $_SESSION["mostrarClave"] = false;
    $botonMostrarClave = true;

    break;
  case "Resetear la Clave":
    unset($_SESSION["clave"]);
    unset($_SESSION["jugadas"]);

    $claveGenerada = $clave->generar();

    $_SESSION["clave"] = $claveGenerada;
    break;
  case "Jugar":
    $jugada = new Jugada(sizeof($_SESSION["jugadas"]??[])+1, $_POST["colores"]);

    $jugadaCorrecta = $jugada->comprobarJugada();

    if($jugadaCorrecta){
      if(sizeof($jugada->getPosiciones()[0]) == 4){
        header("location: ./finJuego.php");
      }

      $_SESSION["jugadas"][] = $jugada;

      if(sizeof($_SESSION["jugadas"]) >= 10){
        header("location: ./finJuego.php");
      }

      $mensaje = "<p class='mensajeInfo'>Jugada realizada, vuelve a seleccionar para jugar</p>";
    } else {
      $mensaje = "<p class='mensajeError'>Debes seleccionar 4 colores para jugar</p>";
    }
    break;
  case "Cerrar Sesión":
    session_destroy();
    header("location: ./index.php");
    break;
  default:
    if(!isset($_SESSION["usuario"])){
      header("location: ./index.php");
    }
}

$htmlMostrarColoresClave = "";
if(!$botonMostrarClave){
    $htmlMostrarColoresClave .= Plantilla::mostrarClave($_SESSION["clave"]);
}
$htmlMostrarCabecera  = Plantilla::mostrarCabecera($_SESSION["usuario"], basename(__FILE__));
$htmlMostrarFormularioAcciones = Plantilla::mostrarFormularioAcciones($botonMostrarClave, basename(__FILE__));
$htmlMostrarFormularioJugar = Plantilla::mostrarFormularioJugar($_POST["colores"]??[], $mensaje,  basename(__FILE__));
$htmlMostrarJugadasAnteriores = Plantilla::mostrarJugadasAnterioresYActual($_SESSION['jugadas']??[]);
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jugar - Mastermind</title>
    <script src="../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-100 min-h-screen font-sans text-slate-800">
  <?= $htmlMostrarCabecera ?>
  <div class="container mx-auto px-4 py-8 max-w-6xl">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
      <div class="lg:col-span-1 space-y-8">
        <?= $htmlMostrarFormularioAcciones ?>
        <?= $htmlMostrarFormularioJugar ?>
      </div>

      <div class="lg:col-span-2 space-y-8">
        <?= $htmlMostrarColoresClave ?>
          
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden">
          <div class="bg-slate-50 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
              <h3 class="font-bold text-slate-700 text-lg">Progreso</h3>
          </div>
          <div class="p-6">
            <?= $htmlMostrarJugadasAnteriores ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>