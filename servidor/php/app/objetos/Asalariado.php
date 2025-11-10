<?php
  Trait Asalariado {
    private float $salario;

    public function setSalario(float $salario): void {
      $this->salario = $salario;
    }

    public function getSalario(): float {
      return $this->salario;
    }

    public function __toString(): string {
      return (string) $this->salario;
    }
  }
?>