<?php
  class RegEx {
    // ^(0|[1-9][0-9]*)\/[1-9][0-9]*$ numero racional
    public static function validar(string $regex, string $cadena): bool {
      if ($regex[0] != $regex[strlen($regex) - 1] || strlen($regex) === 1) {
        $regex = "#$regex#";
      }
      return preg_match($regex, $cadena) === 1;
    }
  }
?>