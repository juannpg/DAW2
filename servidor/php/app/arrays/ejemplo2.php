<?php
  $notas = array_fill(0, 5, null);
  $notas = array_map(
    fn(): int => rand(0,10),
    $notas
  );

  var_dump($notas);
  
  echo "<h2>nota maxima" . max($notas) . "</h2>";
  echo "<h2><br />nota minima" . min($notas) . "</h2>";
  echo "<h2><br />nota media" . array_sum($notas) / count($notas) . "</h2>";

  foreach ($notas as $key => &$nota) {
    $nota += 1;
    echo "<br />la nota $key es $nota";
  }

  var_dump($notas);
?>