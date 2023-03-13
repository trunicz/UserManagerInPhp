<?php

namespace Trnx\Usermanager\models;

use PDO;
use Trnx\Usermanager\lib\Database;


class User extends Database
{
  private string $uuid;

  public function __construct(private string $username, private string $usermail)
  {
    parent::__construct();
    $this->uuid = uniqid();
  }

  public static function createUserFromArray($arr)
  {
    $user = new User($arr['username'], $arr['usermail']);
    $user->setUUID($arr['uuid']);
    return $user;
  }

  public function save()
  {
    $query = $this->connect()->prepare("INSERT INTO users(uuid,username,usermail,updated,created) VALUES(:uuid,:username,:usermail,NOW(),NOW())");
    $query->execute(['uuid' => $this->uuid, 'username' => $this->username, 'usermail' => $this->usermail]);
  }

  public function update()
  {
    $query = $this->connect()->prepare("UPDATE users SET updated = NOW(), username = :username, usermail = :usermail WHERE uuid = :uuid");
    $query->execute(['username' => $this->username, 'usermail' => $this->usermail, 'uuid' => $this->uuid]);
  }

  public static function get($uuid): User
  {
    $database = new Database();
    $query = $database->connect()->prepare("SELECT * FROM users WHERE uuid = :uuid");
    $query->execute(["uuid" => $uuid]);

    $user = User::createUserFromArray($query->fetch(PDO::FETCH_ASSOC));
    return $user;
  }

  public static function getAll(): array
  {
    $users = [];
    $database = new Database();
    $query = $database->connect()->query("SELECT * FROM users");
    while ($record = $query->fetch(PDO::FETCH_ASSOC)) {
      $user = User::createUserFromArray($record);
      array_push($users, $user);
    }
    return $users;
  }

  public static function delete($uuid)
  {
    $db = new Database;
    $query = $db->connect()->prepare("DELETE FROM users WHERE uuid = :uuid");
    $query->execute(["uuid" => $uuid]);
  }

  public function getUsername()
  {
    return $this->username;
  }
  public function getUsermail()
  {
    return $this->usermail;
  }

  public function setUsername($val)
  {
    $this->username = $val;
  }
  public function setUsermail($val)
  {
    $this->usermail = $val;
  }

  public function getUUID()
  {
    return $this->uuid;
  }

  public function setUUID($val)
  {
    $this->uuid = $val;
  }
}
