<?php
  class Persona {
    private static int $numeroPersonas = 0;
    public function __construct(private string $nombre, private string $fechaNacimiento, private string $direccion) {
      self::$numeroPersonas++;
    }

    public function __destruct() {
      self::$numeroPersonas--;
    }

    public function __toString(): string {
      return "Nombre: $this->nombre, Fecha de Nacimiento: $this->fechaNacimiento, Dirección: $this->direccion";
    }
    
    public function getNombre(): string {
      return $this->nombre;
    }

    public function getFechaNacimiento(): string {
      return $this->fechaNacimiento;
    }

    public function getDireccion(): string {
      return $this->direccion;
    }

    public static function getNumeroPersonas(): int {
      return Persona::$numeroPersonas;
    }

    public function setNombre(string $nombre): void {
      $this->nombre = $nombre;
    }

    public function setFechaNacimiento(string $fechaNacimiento): void {
      $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setDireccion(string $direccion): void {
      $this->direccion = $direccion;
    }
  }
?>