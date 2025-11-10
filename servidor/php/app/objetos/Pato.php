<?php
  class Pato extends Animal {
    public function __construct() {
      Parent::__construct(2, "Pato");
    }
    public function hablar(): string {
      return "Cuac Cuac";
    }
  }
?>