<?php 

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  echo <<<_END
  <h1 class="title">Funcionarios</h1>
  
  <div class="description">
    <p class="text">Lista de Funcionarios</p>
    <a href="cadastra_funcionario.php" class="button">Cadastar Funcionario</a>
  </div>

  <div class="funcionario">
    <table id="customers">
      <tr>
        <th><b>Nome</b></th>
        <th><b>Funcao</b></th>
        <th><b>Status</b></th>
        <th><b>Acao</b></th>
      </tr>
  _END;

  $sql = "SELECT * FROM funcionarios";
  $sql = $connection->query($sql);

  for ($i = 0; $i < $sql->num_rows; $i++)
  {
    $data = $sql->fetch_assoc();

    echo "<tr>";
    echo "<td><a class=\"exibe\" href=exibe_funcionario.php?id=" . $data['COD_FUN'] . "> " . $data['NOME_FUN'] . "</a></td>";
    echo "<td>" . $data['FUNCAO_FUN'] . "</td>";
    echo "<td>" . $data['STATUS_FUN'] . "</td>";
    echo "<td><a href=altera_funcionario.php?id=" 
      . $data['COD_FUN'] ." class=\"alter\">Alterar</a></td>";
    echo "</tr>"; 
      
  }
  echo "</table>";

  $connection->close();
}
else
{
  header("Location: login.php");
}

require "templates/footer.php";

?>
