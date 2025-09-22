<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hola docker</title>
  <style>
    body {
      background: #f5f6fa;
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }
    h1 {
      color: #2980b9;
      margin-top: 2em;
      letter-spacing: 2px;
    }
    p {
      color: #555;
      font-size: 1.2em;
      margin-bottom: 2em;
    }
    h2 {
      color: #16a085;
      margin-bottom: 0.5em;
    }
    .random-number {
      font-size: 3em;
      color: #2c3e50;
      font-weight: bold;
      background: #ecf0f1;
      border-radius: 12px;
      padding: 0.5em 1.5em;
      box-shadow: 0 2px 8px rgba(44,62,80,0.08);
      margin-bottom: 2em;
      margin-top: 0.5em;
      letter-spacing: 2px;
    }
  </style>
</head>
<body>
  <h1>hola docker!</h1>
  <p>Esto esta hecho desde un docker con apache</p>
  <h2>numero random:</h2>
  <div class="random-number">
    <?php
      $numero = random_int(1, 100);
      echo $numero;
    ?>
  </div>
</body>
</html>