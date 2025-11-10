<?php
  abstract class Animal {
    public function __construct(private int $patas, private string $especie) {}

    public function __toString() {
      return "Especie: $this->especie, Número de patas: $this->patas";
    }

    public abstract function hablar(): string;
  }
?>