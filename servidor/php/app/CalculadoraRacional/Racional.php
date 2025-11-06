<!-- esta clase es para el ejercicio de validar poque la entrada siempre es un string al tratarse de un input text -->
<?php
  class Racional {
    private int $numerador;
    private int $denominador;

    public function __construct(string $entrada = "1/1") {
      // $regex = '/^-?\d+(\/-?\d+)?$/';

      // if (!preg_match($entrada, $regex)) return;
      
      $valores = explode("/", $entrada);
      $numerador = $valores[0];
      $denominador = sizeof($valores) === 1 ? 1 : $valores[1];
      
      $this->numerador = (int) $numerador;
      $this->denominador = (int) $denominador;
    }

    public function __toString(): string {
      return "$this->numerador/$this->denominador";
    }
  }
?>