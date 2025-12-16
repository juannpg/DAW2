<?php
namespace clases;

use mysqli;
use mysqli_sql_exception;

class BaseDeDatos {
  private static ?BaseDeDatos $instance = null;
  private ?mysqli $connection;
  private string $hostname;
  private string $username;
  private string $password;
  private string $database;

  private function __construct(
  ) {
    $this->hostname = $_ENV["DB_HOST"];
    $this->username = $_ENV["DB_USER"];
    $this->password = $_ENV["DB_PASS"];
    $this->database = $_ENV["DB_NAME"];

    try {
      $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);
    } catch(mysqli_sql_exception $e) {
      $this->connection = null;
      die ("Error: ".$e->getMessage()."</br>");
    }
  }

  public static function getInstance(): BaseDeDatos {
    if(self::$instance ==null){
      self::$instance = new BaseDeDatos();
    }

    return self::$instance;
  }

  public function getConnection(): ?mysqli {
    return $this->connection;
  }

  public function registrarUsuario($nombre, $password) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sentencia = "INSERT INTO usuarios (nombre, password) VALUES (?, ?)";
      try {
        $stmt = $this->connection->prepare($sentencia);
        $stmt->bind_param("ss", $nombre, $password);
        $response = $stmt->execute();

        if($response){
          return true;
        } else {
          return "No se pudo registrar";
        }
      } catch (mysqli_sql_exception $e) {
        $mensajeError = match ($e->getCode()) {
          1062 => "El usuario introducido ya existe",
          default => "Error insertando al usuario ".$e->getMessage()
        };

        return $mensajeError;
      }
  }

  public function comprobarUsuario($nombre, $password) {
      $sentencia = "SELECT password FROM usuarios WHERE nombre = ?";
      try {
        $stmt = $this->connection->prepare($sentencia);
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $response = $stmt->get_result();
        if($response && $response->num_rows > 0){
          $passwordBD = $response->fetch_assoc();
          if(password_verify($password, $passwordBD['password'])){
            return true;
          }
        }
        return "Credenciales incorrectos";
    } catch (mysqli_sql_exception $e) {
      return "Error: ".$e->getMessage();
    }
  }
}
?>