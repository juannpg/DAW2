<?php
  namespace class\db;
  use mysqli;
  use mysqli_sql_exception;
  use mysqli_result;

  class DB {
    private static DB | null $instancia = null;
    private string $host;
    private string $user;
    private string $pass;
    private string $db;
    private mysqli $conexion;
    
    private function __construct() {
      $this->host = $_ENV["DB_HOST"];
      $this->user = $_ENV["DB_USER"];
      $this->pass = $_ENV["DB_PASS"];
      $this->db = $_ENV["DB_NAME"];

      try {
        $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db);
      } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage() . "<br />");
      }
    }

    public static function getInstance(): DB {
      if (self::$instancia === null) {
        self::$instancia = new self();
      }
      return self::$instancia;
    }

    private function iterarFilas(bool | mysqli_result $respuesta, int $indice = -1): array {
      $fila = $respuesta->fetch_row();
      $campos = [];
      while ($fila) {
        $campos[] = $indice === -1 ? $fila : $fila[$indice];
        $fila = $respuesta->fetch_row();
      }
      return $campos;
    }

    public function getAllTables(): array {
      $sentencia = "SHOW TABLES;";
      $respuesta = $this->conexion->query($sentencia);
      return $this->iterarFilas($respuesta, 0);
    }

    public function getFieldNames(string $tabla): array {
      $sentencia = "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = '$tabla'
        ORDER BY ORDINAL_POSITION;";
      $respuesta = $this->conexion->query($sentencia);
      return $this->iterarFilas($respuesta,0);
    }

    public function getTableData(string $tabla): array {
      $sentencia = "SELECT * FROM $tabla;";
      $respuesta = $this->conexion->query($sentencia);
      return $this->iterarFilas($respuesta);
    }

    public function deleteField(string $tabla, int $id): bool {
      $sentencia = "DELETE FROM $tabla WHERE id = $id;";
      return $this->conexion->query($sentencia);
    }
  }
?>