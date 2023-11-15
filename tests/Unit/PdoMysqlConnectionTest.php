<?php

use Blog\Infra\Gateway\PdoDatabaseConnection;

test("should instantiate a valid PDO connection", function () {
  $pdoConnection = new PdoDatabaseConnection();

  $connection = $pdoConnection->connection();

  expect($connection)->toBeInstanceOf(\PDO::class);
});

test("should executes query with success", function () {
  $pdoConnection = new PdoDatabaseConnection();

  $connection = $pdoConnection->connection();

  $return = $connection->query("SELECT 1 as value")->fetchObject();

  expect($return->value)->toBe(1);
});