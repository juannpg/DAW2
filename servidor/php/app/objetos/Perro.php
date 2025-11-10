<?php
  class Perro extends Animal {
    public function __construct() {
      Parent::__construct(4, "Perro");
    }
    public function hablar(): string {
      return "Guau Guau";
    }
  }
?>