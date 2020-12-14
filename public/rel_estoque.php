<?php 

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  echo <<<_END
    <h1 class="title">Relatorio dos Amplificadores em estoque</h1>
  _END;
}
else
{
  header("Location: login.php");
}

require "templates/footer.php"; 

?>
