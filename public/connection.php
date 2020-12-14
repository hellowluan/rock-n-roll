<?php

require "../config.php";

$connection = new mysqli($host, $user, $password, $databse);

if ($connection->connect_errno)
{
  echo "<h1>Error<h1>";
  echo "Errno: " . $connection->connect_errno . "\n";
  echo "Error: " . $connection->connect_error . "\n";
}

?>
