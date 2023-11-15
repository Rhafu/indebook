<?php

namespace Blog\Infra\Gateway;

final class PdoDatabaseConnection
{

  private \PDO $connection;

  public function __construct()
  {
    $dsn = env('DB_CONNECTION').':host='.env('DB_HOST').';port='.env('DB_PORT').';dbname='.env('DB_DATABASE');
    $this->connection = new \PDO($dsn,env('DB_USERNAME'),env('DB_PASSWORD'));
  }

  public function connection(): \PDO
  {
    return $this->connection;
  }
}