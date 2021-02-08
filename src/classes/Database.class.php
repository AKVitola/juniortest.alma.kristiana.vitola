<?php
class Database
{
  const HOST = "localhost";
  const USER = "root";
  const PSW = "";
  const DB_NAME = "product";

  protected function connect()
  {
    $conn = new mysqli(self::HOST, self::USER, self::PSW, self::DB_NAME);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
  }
}
