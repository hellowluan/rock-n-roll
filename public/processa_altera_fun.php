<?php

session_start();
require "connection.php";
require "templates/header.php";

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
&& $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  $id = $_GET['id'];
  $nome = $_GET['nome'];
  $login = $_GET['login'];
  $senha = $_GET['senha'];
  $status = isset($_GET['status']) ? 'ativo' : 'desativo';
  $funcao = $_GET['funcao'];

  $sql = "UPDATE funcionarios SET NOME_FUN = '$nome', LOGIN_FUN = '$login', SENHA_FUN = '$senha', STATUS_FUN = '$status', FUNCAO_FUN = '$funcao' WHERE COD_FUN = '$id'";
  $sql = $connection->query($sql);

  echo "<script>
    showAlertSucess('Funcionario Alterado!', 'altera_funcionario.php?id=$id');
  </script>";

}
else
{
  header("Location: login.php");
}

require "templates/footer.php";
