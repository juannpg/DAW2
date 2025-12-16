<?php
namespace clases;
class Colores{

  private static array $colores = [
    "Azul",
    "Rojo",
    "Naranja",
    "Verde",
    "Violeta",
    "Amarillo",
    "Marrón",
    "Rosa"
  ];

  public static function obtenerColores(): array{
    return self::$colores;
  }
}
?>