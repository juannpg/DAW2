<?php
  $_ = fn($__) => require_once "./$__.php";
  spl_autoload_register($_);

  abstract class Operacion {
    private static string $regexOperacionReal = "#^(?:0|[1-9][0-9]*)(?:\.[0-9]+)?[+\-:/*](?:0|[1-9][0-9]*)(?:\.[0-9]+)?$#";
    private static string $regexOperacionRacional = "#^(?:(?:0|[1-9][0-9]*)\/[1-9][0-9]*[+\-:/*](?:0|[1-9][0-9]*|(?:0|[1-9][0-9]*)\/[1-9][0-9]*)|(?:0|[1-9][0-9]*)[+\-:/*](?:0|[1-9][0-9]*)\/[1-9][0-9]*)$#";
    private static string $regexOperador = '#^([0-9]+(?:\.[0-9]+)?(?:/[0-9]+)?)([+\-*/:])([0-9]+(?:\.[0-9]+)?(?:/[0-9]+)?)$#';

    protected float | Racional $operando1;
    protected float | Racional $operando2;
    protected string $operador;
    
    public function __construct(protected string $operacion) {
      preg_match(self::$regexOperador, $operacion, $matches);

      switch (self::tipoOperacion($operacion)) {
        case 'real':
          $this->operando1 = (float) $matches[1];
          $this->operando2 = (float) $matches[3];
          break;
        case 'racional':
          $this->operando1 = new Racional($matches[1]);
          $this->operando2 = new Racional($matches[3]);
          break;
      }
      $this->operador = $matches[2];
    }
  
    public function getOperando1(): float | Racional {
      return $this->operando1;
    }

    public function getOperando2(): float | Racional {
      return $this->operando2;
    }

    public function getOperador(): string {
      return $this->operador;
    }
    
    protected abstract function operar(): int | float | Racional | string;

    public static function tipoOperacion(string $operacion): string {
      if (preg_match(self::$regexOperacionReal, $operacion)) {
        return 'real';
      }
      
      if (preg_match(self::$regexOperacionRacional, $operacion)) {
        return 'racional';
      }
      
      return 'error';
    }
  }
?>