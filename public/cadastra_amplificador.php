<?php 

session_start();
require "templates/header.php"; 
require "connection.php";

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && ($_SESSION['FUNCAO_FUN'] == 'administrador' || $_SESSION['FUNCAO_FUN'] == 'estoquista'))
{
  require "templates/form_amp.php";
}
else
{
  header("Location: login.php");
}

require "templates/footer.php"; 

?>
