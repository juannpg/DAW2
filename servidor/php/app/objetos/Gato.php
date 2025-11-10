<?php
  class Gato extends Animal {
    public function __construct() {
      Parent::__construct(4, "Gato");
    }
    public function hablar(): string {
      return "Miau Miau";
    }
  }
?>