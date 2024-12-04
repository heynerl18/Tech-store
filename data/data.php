<?php

class Data
{
  private static $instancia = null;

  private function __construct() {} // Evitar instancias directas
  private function __clone() {} // Evitar clonación

  public static function getInstance()
  {
    if (!isset(self::$instancia)) {
      try {
        $optionsPDO = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        // Obtén las credenciales desde un archivo de configuración
        $host = '127.0.0.1';
        $dbname = 'tech_store_db';
        $user = 'root';
        $password = '';

        self::$instancia = new PDO(
          "mysql:host=$host;dbname=$dbname;charset=utf8",
          $user,
          $password,
          $optionsPDO
        );
      } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
      }
    }

    return self::$instancia;
  }
}
