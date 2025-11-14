<?php
  $_ = fn($__) => require_once "./$__.php";
  spl_autoload_register($_);

  use Racional;

  class OperacionRacional extends Operacion {
    public function __construct(string $operacion) {
      parent::__construct($operacion);

      $this->operando1 = new Racional($this->operando1);
      $this->operando2 = new Racional($this->operando2);
    }
    
    public function operar(): Racional | string {
      return match ($this->operador) {
        '+' => Racional::sumar($this->operando1, $this->operando2),
        '-' => Racional::restar($this->operando1, $this->operando2),
        '*' => Racional::multiplicar($this->operando1, $this->operando2),
        ':' => Racional::dividir($this->operando1, $this->operando2),
        default => "Operador no válido para racionales: $this->operador",
      };
    }
  }
?>