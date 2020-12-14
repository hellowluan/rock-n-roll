<?php 

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM funcionarios WHERE COD_FUN = '$id'";
  $sql = $connection->query($sql);

  if ($sql->num_rows > 0)
  {
    $data = $sql->fetch_assoc();

    ?>
    <h1 class="title">Dados do Funcionario</h1>
        
    <form action="processa_altera_fun.php" method="get" class="cadastra-funcionario">
      <hr>
      <input type=hidden name=id value="<?php echo $data['COD_FUN'] ?>">

      <label for="nome"><b>Nome</b></label>
      <input type="text" placeholder="Enter nome" name="nome" id="nome" value="<?php echo $data['NOME_FUN'] ?>" disabled>

      <label for="login"><b>Login</b></label>
      <input type="text" placeholder="Enter login" name="login" id="login" value="<?php echo $data['LOGIN_FUN'] ?>" disabled>

      <label for="senha"><b>Senha</b></label>
      <input type="password" placeholder="Enter senha" name="senha" id="senha" value="<?php echo $data['SENHA_FUN'] ?>" disabled>

      <label for="status"><b>Status</b></label><br>
        <label class="status">
        <input type="checkbox" name="status" id="status" <?php echo $data['STATUS_FUN'] == 'ativo' ? "checked" : '' ?> disabled>
        <span class="slider"></span>
      </label><br><br>
      </label>

      <label for="funcao"><b>Função</b></label><br>
      <input type="radio" id="estoquista" name="funcao" value="estoquista" <?php echo $data['FUNCAO_FUN'] == 'estoquista' ? "checked" : ''?> disabled>
      <label for="estoquista">Estoquista</label>
      <input type="radio" id="vendedor" name="funcao" value="vendedor" <?php echo $data['FUNCAO_FUN'] == 'vendedor' ? "checked" : ''?> disabled>
      <label for="vendedor">Vendedor</label>
    </form>
    <?php
  }
  else 
  {
    require "templates/not_found.php";
  }
}
else
{
  header("Location: login.php");
}

require "templates/footer.php"; 

?>
