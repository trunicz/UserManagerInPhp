<?php

namespace Trnx\Usermanager\lib;

use PDO;
use PDOException;

class Database
{
  private string $host;
  private string $dbname;
  private string $user;
  private string $password;
  private string $charset;

  public function __construct()
  {
    $this->host = 'localhost';
    $this->dbname = 'userapp';
    $this->user = 'root';
    $this->password = '';
    $this->charset = 'utf8';
  }

  public function connect(): PDO
  {
    try {
      $connection = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
      ];
      $pdo = new PDO($connection, $this->user, $this->password, $options);
      return $pdo;
    } catch (PDOException $th) {
      throw $th;
    }
  }
}
