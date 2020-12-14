<?php

require "config.php";

try 
{
  $connection = new PDO("mysql:host=$host", $user, $password, $options);
  $sql = file_get_contents("data/database.sql");
  $connection->exec($sql);

  echo "Banco de Dados criado com Sucesso!";
}
catch (PDOException $ex)
{
  echo "<strong>ERROR</strong><br>" . $sql . "<br>" . $ex->getMessage();
}

?>
