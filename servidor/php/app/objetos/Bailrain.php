<?php
  Class Bailarin extends Persona {
    use Asalariado;
    
    public function __construct(string $nombre, string $direccion, string $fechaNacimiento, private string $estilo, float $salario) {
      Parent::__construct($nombre, $direccion, $fechaNacimiento);
      $this->estilo = $estilo;
      $this->setSalario($salario);
    }

    public function __toString(): string {
      return Parent::__toString() . ", Estilo: $this->estilo";
    }
  }
?>