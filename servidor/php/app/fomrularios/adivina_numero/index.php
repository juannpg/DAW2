<?php
  $numero_secreto = rand(1, 100);
  $pass = $numero_secreto;
  $intentos = $_GET["intentos"] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>adivina numero</title>

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
    }

    .container {
      width: 100%;
      max-width: 400px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    fieldset {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding: 1.5rem;
      border-radius: 8px;
      border-color: #4caf50;
    }

    button {
      padding: 0.5rem 1rem;
      cursor: pointer;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #388e3c;
    }

    h1 {
      text-align: center;
      color: #2e7d32;
    }

    legend {
      color: #2e7d32;
      font-weight: bold;
    }
</style>
</head>
<body>
  <main>
    <div class="container">
      <h1>Juego Adivina Numero</h1>
      <form action="jugar.php" method="POST">
        <fieldset>
          <legend>Selecciona una dificultado</legend>
          <div>
            <input
            type="radio"
            value="10"
            name="intentos"
            id="10"
            <?php if ($intentos === "10") echo 'checked'?>
          >
            <label for="10">1-1.023 (210) - 10 intentos</label>
          </div>
          <div>
            <input
            type="radio"
            value="15"
            name="intentos"
            id="15"
            <?php if ($intentos === "15") echo 'checked'?>
          >
            <label for="15">1-65.535 (215) - 15 intentos</label>
          </div>
          <div>
            <input type="radio"
            value="20"
            name="intentos"
            id="20"
            <?php if ($intentos === "20") echo 'checked'?>
          >
            <label for="20">1-1.048.575 (220) - 20 intentos</label>
          </div>
          <input type="hidden" name="numero_secreto" value="<?= $numero_secreto ?>">
          <input type="hidden" name="pass" value="<?= $pass ?>">
          <button type="submit">EMPEZAR</button>
        </fieldset>
      </form>
    </div>
  </main>
</body>
</html>