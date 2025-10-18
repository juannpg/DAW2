<?php
  $numero_secreto = $_POST["numero_secreto"] ?? null;
  $pass = $_POST["pass"] ?? null;

  if ($numero_secreto === null || $pass === null || $numero_secreto != $pass) {
    header(header: "Location: index.php");
    exit();
  }

  $intentos = $_POST["intentos"];
  $intentos = intval($intentos);
  $dificultad = $_POST["dificultad"] ?? pow(2, $intentos);
  $min = $_POST["min"] ?? 0;
  $max = $_POST["max"] ?? $dificultad;
  $pregunta = $_POST["pregunta"] ?? ($min + $max) / 2;
  $jugada = $_POST["jugada"] ?? 1;

  $estado = $_POST["estado"] ?? null;

  if (isset($_POST["submit"])) {
    switch ($_POST["submit"]) {
      case "jugar": {
        switch ($estado) {
          case "mayor": {
            if ($jugada >= $intentos) {
              $intentosRestantes = $intentos - $jugada;

              echo <<<HTML
                <form action="fin.php" method="POST" id="finForm">
                  <input type="hidden" name="intentosRestantes" value="{$intentosRestantes}">
                  <input type="hidden" name="intentos" value="{$intentos}">
                  <input type="hidden" name="jugada" value="{$jugada}">
                  <input type="hidden" name="numero_secreto" value="{$numero_secreto}">
                  <input type="hidden" name="pass" value="{$pass}">
                  <input type="hidden" name="resultado" value="perdedor">
                </form>
                <script>
                  document.getElementById("finForm").submit();
                </script>
              HTML;
              exit();
            }

            $min = $pregunta;
            $pregunta = ($min + $max) / 2;
            $jugada++;
            break;  
          }

          case "menor": {
            if ($jugada >= $intentos) {
              $intentosRestantes = $intentos - $jugada;

              echo <<<HTML
                <form action="fin.php" method="POST" id="finForm">
                  <input type="hidden" name="intentosRestantes" value="{$intentosRestantes}">
                  <input type="hidden" name="intentos" value="{$intentos}">
                  <input type="hidden" name="jugada" value="{$jugada}">
                  <input type="hidden" name="numero_secreto" value="{$numero_secreto}">
                  <input type="hidden" name="pass" value="{$pass}">
                  <input type="hidden" name="resultado" value="perdedor">
                </form>
                <script>
                  document.getElementById("finForm").submit();
                </script>
              HTML;
              exit();
            }
            
            $max = $pregunta;
            $pregunta = ($min + $max) / 2;
            $jugada++;
            break;
          }

          default: {
            $intentosRestantes = $intentos - $jugada;

            echo <<<HTML
              <form action="fin.php" method="POST" id="finForm">
                <input type="hidden" name="intentosRestantes" value="{$intentosRestantes}">
                <input type="hidden" name="intentos" value="{$intentos}">
                <input type="hidden" name="jugada" value="{$jugada}">
                <input type="hidden" name="numero_secreto" value="{$numero_secreto}">
                <input type="hidden" name="pass" value="{$pass}">
                <input type="hidden" name="resultado" value="ganador">
              </form>
              <script>
                document.getElementById("finForm").submit();
              </script>
            HTML;
            exit();
          };
        }
        break;
      }

      case "reiniciar": {
        $min = 0;
        $max = $dificultad;
        $pregunta = ($min + $max) / 2;
        $jugada = 1;
        break;
      }

      default: {
        header(header: "Location: index.php?intentos=" . $intentos);
        exit();
      };
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jugar</title>

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

    .btn-container {
      display: flex;
      justify-content: space-evenly;
      gap: 1rem;
      margin-top: 1rem;
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

    h1, h2 {
      text-align: center;
      color: #2e7d32;
    }

    legend {
      color: #2e7d32;
      font-weight: bold;
    }

    p {
      text-align: center;
      color: #1b5e20;
      font-size: 1.2rem;
    }
</style>
</head>
<body>
  <main>
    <div class="container">
      <h1>Empieza el juego</h1>
      <div>
        <h2>Jugada número <?= $jugada ?></h2>
        <p>El número es <?= $pregunta ?>?</p>
      </div>
      <form action="jugar.php" method="POST">
        <input type="hidden" name="numero_secreto" value="<?= $numero_secreto ?>">
        <input type="hidden" name="pass" value="<?= $pass ?>">
        <input type="hidden" name="dificultad" value="<?= $dificultad ?>">
        <input type="hidden" name="intentos" value="<?= $intentos ?>">
        <input type="hidden" name="pregunta" value="<?= $pregunta ?>">
        <input type="hidden" name="min" value="<?= $min ?>">
        <input type="hidden" name="max" value="<?= $max ?>">
        <input type="hidden" name="pregunta" value="<?= $pregunta ?>">
        <input type="hidden" name="jugada" value="<?= $jugada ?>">
        <fieldset>
          <legend>Tu numero es</legend>
          <div>
            <input
              type="radio"
              value="mayor"
              name="estado"
              id="mayor"
              <?php if ($estado === "mayor") echo 'checked'?>
            >
            <label for="mayor">Mayor</label>
          </div>
          <div>
            <input
              type="radio"
              value="menor"
              name="estado"
              id="menor"
              <?php if ($estado === "menor") echo 'checked'?>
            >
              <label for="menor">Menor</label>
            </div>
            <div>
              <input type="radio" value="igual" name="estado" id="igual">
              <label for="igual">Igual</label>
            </div>
          <div class="btn-container">
            <button type="submit" name="submit" value="jugar">JUGAR</button>
            <button type="submit" name="submit" value="reiniciar">REINICIAR</button>
            <button type="submit" name="submit" value="volver">VOLVER</button>
          </div>
        </fieldset>
      </form>
    </div>
  </main>
</body>
</html>