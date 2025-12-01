<?php
  require './vendor/autoload.php';
  use \class\db\db as DB;
  use \class\plantilla\plantilla as Plantilla;
  use Dotenv\Dotenv;

  $dotenv = Dotenv::createImmutable(__DIR__);
  $dotenv->load();
  
  $conexion = DB::getInstance();
  $tablas = $conexion->getAllTables();
  
  $campos = [];
  $resultado = [];
  if (isset($_POST["submit"])) {
    $campos = $conexion->getFieldNames($_POST["submit"]);
    $resultado = $conexion->getTableData($_POST["submit"]);
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor de Base de Datos</title>
  <link rel="stylesheet" href="class/plantilla/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script type="importmap">
    {
      "imports": {
        "sweetalert2": "https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.esm.all.min.js"
      }
    }
  </script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      min-height: 100vh;
      padding: 20px;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }
    h1 {
      color: #333;
      margin-bottom: 20px;
      text-align: center;
    }
    form {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    input[type="submit"] {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    input[type="submit"]:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(102, 126, 234, 0.4);
    }
    input[type="submit"]:active {
      transform: translateY(0);
    }
  </style>

</head>
<body>
  <div class="container">
    <h1>Gestor de Base de Datos</h1>
    <form method="post" action="index.php">
      <?php foreach ($tablas as $tabla) { ?>
        <input type="submit" value="<?= $tabla ?>" name="submit" />
      <?php } ?>
    </form>
    <h2>tabla <?= $_POST["submit"] ?? "" ?></h2>
    <?php echo Plantilla::crearPlantilla($campos, $resultado); ?>
  </div>
  <script src="./js/modal.js" type="module"></script>
</body>
</html>