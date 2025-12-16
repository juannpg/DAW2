<?php
require './../vendor/autoload.php';

use Dotenv\Dotenv;
use clases\BaseDeDatos;

$dotenv = Dotenv::createImmutable(__DIR__."/..");
$dotenv->load();

session_start();

if(isset($_SESSION["usuario"])){
  header("location: ./jugar.php");
}

$baseDeDatos = BaseDeDatos::getInstance();

$submit = $_POST["submit"]??null;
switch ($submit) {
  case "Iniciar Sesión":
    $usuario = $_POST["usuario"]??null;
    $password = $_POST["password"]??null;

    $usuarioEncontrado = $baseDeDatos->comprobarUsuario($usuario, $password);

    if($usuarioEncontrado === true){
      $_SESSION["usuario"] = $usuario;
      header("location: jugar.php");
    } else {
      $mensaje = "<p class='mensajeInfo'>Usuario o contraseña incorrectos</p>";
    }

    break;
  case "Registrarme":
    $usuario = $_POST["usuario"]??null;
    $password = $_POST["password"]??null;

    $usuarioRegistrado = $baseDeDatos->registrarUsuario($usuario, $password);

    if($usuarioRegistrado === true){
      $_SESSION["usuario"] = $usuario;
      header("location: jugar.php");
    }

    $mensaje = "<p class='mensajeError'>$usuarioRegistrado</p>";
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Mastermind</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4 font-sans text-slate-800">

<div class="w-full max-w-md">
  <div class="text-center mb-8">
    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Mastermind</h1>
    <p class="text-slate-500 mt-2 text-sm">Inicia sesión para comenzar el juego</p>
  </div>

  <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
    <div class="bg-slate-50 px-8 py-4 border-b border-slate-200">
        <h2 class="font-bold text-slate-700 text-lg text-center">Bienvenido</h2>
    </div>
    
    <form action="index.php" method="post" class="p-8">
        <div class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Usuario</label>
              <input type="text" name="usuario" value="<?= $usuario??"" ?>" placeholder="Introduce tu usuario" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all placeholder-slate-400">
            </div>
            
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Contraseña</label>
              <input type="password" name="password" value="<?= $password??"" ?>" placeholder="Introduce tu contraseña" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all placeholder-slate-400">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-8">
          <button type="submit" name="submit" value="Iniciar Sesión" class="w-full py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md hover:-translate-y-0.5 transition-all duration-200">Iniciar Sesión</button>
          <button type="submit" name="submit" value="Registrarme" class="w-full py-2.5 px-4 bg-white border border-slate-300 text-slate-700 font-semibold rounded-lg hover:bg-slate-50 hover:border-slate-400 transition-all duration-200">Registrar</button>
        </div>

        <div class="mt-6 min-h-[1.5rem]">
          <p class="text-center text-sm font-medium <?= isset($mensaje) && strpos($mensaje, 'Error') !== false ? 'text-red-500' : 'text-blue-500' ?>">
            <?= strip_tags($mensaje??"") ?>
          </p>
        </div>
    </form>
  </div>

</div>

</body>
</html>

