<?php
  $_ = fn($__) => require_once "./$__.php";
  spl_autoload_register($_);

  class OperacionReal extends Operacion {
    public function operar(): int | float | string {
      return match ($this->operador) {
        '+' => $this->operando1 + $this->operando2,
        '-' => $this->operando1 - $this->operando2,
        '*' => $this->operando1 * $this->operando2,
        '/' => $this->operando1 / $this->operando2,
        default => "Operador no válido: $this->operador",
      };
    }
  }
?>