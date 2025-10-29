<?php
  $url=  "https://raw.githubusercontent.com/MAlejandroR/json_tv/main/tv.json";
  $contenido = file_get_contents($url);
  $contenido = json_decode($contenido, true);

  
  $html = "";

  foreach ($contenido as $_ => $tipos) {
    $nombre = $tipos['name'];
    $html .= "<h1>$nombre</h1>";
    $html .= "<div style=\"display: flex; flex-direction: row\">";
    foreach ($tipos['channels'] as $_ => $canal) {
      $url = $canal['web'];
      $logo = $canal['logo'];
      $nombre = $canal['name'];

      $html .= "
      <div>
        <h2>$nombre</h2>
        <a href=\"$url\" target=\"_blank\" rel=\"noopener\">
          <img width=\"170px\" height=\"170px\" src=\"$logo\" />
        </a>
      </div>";
    }
    $html .= "</div>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>canales</title>
</head>
<body>
  <?= $html ?>
</body>
</html>