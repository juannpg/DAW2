<?php
  namespace class\db;
  use mysqli;
  use mysqli_sql_exception;

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

    public function getAllTables(): array {
      $tablas = [];
      $sentencia = "SHOW TABLES;";
      $respuesta = $this->conexion->query($sentencia);
      $fila = $respuesta->fetch_row();
      while ($fila) {
        $tablas[] = $fila[0];
        $fila = $respuesta->fetch_row();
      }
      return $tablas;
    }

    public function getTableData(string $tabla): array {
      $sentencia = "SELECT * FROM $tabla;";
      $respuesta = $this->conexion->query($sentencia);
      $fila = $respuesta->fetch_row();
      $datos = [];
      while ($fila) {
        $datos[] = $fila;
        $fila = $respuesta->fetch_row();
      }
      return $datos;
    }
  }
?>