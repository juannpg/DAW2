<?php
  namespace Class;

  class Alumno {
    public function __construct(private string $nombre, private string $email){}

    public function __tostring() {
      return "Nombre: " . $this->nombre . " - Email: " . $this->email;
    }

    public function getNombre(): string {
      return $this->nombre;
    }
  }
?>