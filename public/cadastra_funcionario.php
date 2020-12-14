<?php 

session_start();
require "templates/header.php"; 
require "connection.php";

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  require "templates/form.php";
}
else
{
  header("Location: login.php");
}

require "templates/footer.php"; 

?>
