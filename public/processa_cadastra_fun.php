<?php

session_start();
require "connection.php";
require "templates/header.php";

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  $nome = $_GET['nome'];
  $login = $_GET['login'];
  $senha = $_GET['senha'];
  $status = isset($_GET['status']) ? 'ativo' : 'desativo';
  $funcao = $_GET['funcao'];

  $usuario_existe = "SELECT *  FROM funcionarios WHERE LOGIN_FUN = '$login'";
  $usuario_existe = $connection->query($usuario_existe);

  if ($usuario_existe->num_rows > 0)
  {
    echo "<script>
      showAlertError('Erro ao Cadastrar!', 'Nome de Login indisponivel.', 'cadastra_funcionario.php');
    </script>";
  } 
  else
  {
    $sql = "INSERT INTO funcionarios (COD_FUN, NOME_FUN, LOGIN_FUN, SENHA_FUN, STATUS_FUN, FUNCAO_FUN) 
      VALUES (NULL, '$nome', '$login', '$senha', '$status', '$funcao')";
    $sql = $connection->query($sql);

    echo "<script>
      showAlertSucess('Funcionario Cadastrado!', 'cadastra_funcionario.php');
    </script>";
  }
  
  $connection->close();
}
else
{
  header("Location: login.php");
}

require "templates/footer.php";
