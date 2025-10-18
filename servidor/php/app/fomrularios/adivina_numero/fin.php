<?php
  $numero_secreto = $_POST["numero_secreto"] ?? null;
  $pass = $_POST["pass"] ?? null;

  if ($numero_secreto === null || $pass === null || $numero_secreto != $pass) {
    header(header: "Location: index.php");
    exit();
  }

  $intentosRestantes = $_POST["intentosRestantes"] ?? null;
  $jugada = $_POST["jugada"] ?? null;
  $resultado = $_POST["resultado"] ?? null;

  $titulo = match ($resultado) {
    "perdedor" => "he perdido",
    default => "vuevlo a ganar",
  };
  
  $msj = match ($resultado) {
    "perdedor" => "seguro que has sido sincero?",
    default => "he ganado en $jugada jugadas",
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      background-color: #e8f5e9;
    }

    main {
      width: 100%;
      max-width: 800px;
      padding: 2rem;
      text-align: center;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin: 2rem;
    }

    h1 {
      margin-bottom: 2rem;
      color: #2e7d32;
    }
</style>
</head>
<body>
  <main>
    <h1><?= $titulo ?></h1>
    <p><?= $msj ?></p>
    <p>me han sobrado <?= $intentosRestantes ?> intentos</p>
  </main>
</body>
</html>