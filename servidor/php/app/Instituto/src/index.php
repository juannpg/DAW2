<?php
  require '../vendor/autoload.php';

  use \Class\Alumno;

  $alumnos = [];
  
  $seeder = \Faker\Factory::create();

  for ($i = 0; $i < 10; $i++) {
    $firstName = $seeder->firstName();
    $email = $seeder->email();
    $alumno = new Alumno($firstName, $email);
    $alumnos[] = $alumno;
  }

  usort($alumnos, function($a, $b) {
    return strcmp($a->getNombre(), $b->getNombre());
  });
  
  for ($i = 0; $i < count($alumnos); $i++) {
    $p1 = $alumnos[$i];
    echo "<h1>$p1</h1>";
  }

?>