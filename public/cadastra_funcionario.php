<?php 

session_start();
require "templates/header.php"; 
require "connection.php";

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  echo <<<_END
  <h1 class="title">Cadastrar Funcionario</h1>
  <p class="sub-title">Preencha todo o formulario para cadastrar um funcionario.</p>
      
  <form action="processa_cadastra_fun.php" method="get" class="cadastra-funcionario">
    <hr>

    <label for="nome"><b>Nome</b></label>
    <input type="text" placeholder="Enter nome" name="nome" id="nome" required>

    <label for="login"><b>Login</b></label>
    <input type="text" placeholder="Enter login" name="login" id="login" required>

    <label for="senha"><b>Senha</b></label>
    <input type="password" placeholder="Enter senha" name="senha" id="senha" required>

    <label for="status"><b>Status</b></label><br>
      <label class="status">
      <input type="checkbox" name="status" id="status" checked>
      <span class="slider"></span>
    </label><br><br>
    </label>

    <label for="funcao"><b>Função</b></label><br>
    <input type="radio" id="estoquista" name="funcao" value="estoquista">
    <label for="estoquista">Estoquista</label>
    <input type="radio" id="vendedor" name="funcao" value="vendedor">
    <label for="vendedor">Vendedor</label>

    <button type="submit" class="cadastrar">Cadastrar</button>
  </form>
  _END;
}
else
{
  header("Location: login.php");
}

require "templates/footer.php"; 

?>
