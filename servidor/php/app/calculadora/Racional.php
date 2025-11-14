<?php
  $_ = fn($__) => require_once "./$__.php";
  spl_autoload_register($_);

    class Racional {
      private int $numerador;
      private int $denominador;

      public function __construct(int | string $numerador = 1, int $denominador = 1) {
        if (is_string($numerador)) {
          $valores = explode("/", $numerador);
          $numerador = $valores[0];
          $denominador = $valores[1] ?? 1;
        }

        $this->numerador = (int) $numerador;
        $this->denominador = (int) $denominador;
      }

      public function __toString(): string {
        return "$this->numerador/$this->denominador";
      }

      public function getNumerador(): int {
        return $this->numerador;
      }

      public function getDenominador(): int {
        return $this->denominador;
      }

      public function setNumerador(int $numerador): void {
        $this->numerador = $numerador;
      }

      public function setDenominador($denominador): void {
        $this->denominador = $denominador;
      }

      private static function mcd(int $x, int $y): int {
        return $y == 0 ? $x : Racional::mcd($y, $x % $y);
      }
      
      private static function mcm($x, $y): int {
        return $x * $y / Racional::mcd($x, $y);
      }
      
      public static function sumar(Racional $racional1, Racional $racional2): Racional {
        $denominadorComun = Racional::mcm($racional1->getDenominador(), $racional2->getDenominador());

        $razonRacional1 = $denominadorComun / $racional1->getDenominador();
        $razonRacional2 = $denominadorComun / $racional2->getDenominador();

        $numerador1 = $racional1->getNumerador() * $razonRacional1;
        $numerador2 = $racional2->getNumerador() * $razonRacional2;

        $numeradorSumado = $numerador1 + $numerador2;
        
        return new Racional($numeradorSumado, $denominadorComun);
      }

      public static function restar(Racional $racional1, Racional $racional2): Racional {
        $denominadorComun = Racional::mcm($racional1->getDenominador(), $racional2->getDenominador());

        $razonRacional1 = $denominadorComun / $racional1->getDenominador();
        $razonRacional2 = $denominadorComun / $racional2->getDenominador();

        $numerador1 = $racional1->getNumerador() * $razonRacional1;
        $numerador2 = $racional2->getNumerador() * $razonRacional2;

        $numeradorRestado = $numerador1 - $numerador2;
        
        return new Racional($numeradorRestado, $denominadorComun);
      }

      public static function multiplicar(Racional $racional1, Racional $racional2): Racional {
        $numerador = $racional1->getNumerador() * $racional2->getNumerador();
        $denominador = $racional1->getDenominador() * $racional2->getDenominador();
        
        return new Racional($numerador, $denominador);
      }

      public static function dividir(Racional $racional1, Racional $racional2): Racional {
        $numerador = $racional1->getNumerador() * $racional2->getDenominador();
        $denominador = $racional1->getDenominador() * $racional2->getNumerador();
        
        return new Racional($numerador, $denominador);
      }

      public function simplificar(): Racional {
        $razonDivisora = Racional::mcd($this->getNumerador(), $this->getDenominador());
        $numerador = $this->getNumerador() / $razonDivisora;
        $denominador = $this->getDenominador() / $razonDivisora;
        return new Racional($numerador, $denominador);
      }
  }
?>