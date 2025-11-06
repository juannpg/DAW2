<?php
  class Racional {
    private int $numerador;
    private int $denominador;

    public function __construct(int | string $numerador = 1, int $denominador = 1) {
      if (is_string($numerador)) {
        $valores = explode("/", $numerador);
        $numerador = $valores[0];
        $denominador = sizeof($valores) === 1 ? $denominador : $valores[1];
      }

      $this->numerador = $numerador;
      $this->denominador = $denominador;
    }

    public function __toString(): string {
      return "$this->numerador/$this->denominador";
    }
  }
?>