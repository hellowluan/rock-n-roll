<?php 

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  echo <<<_END
    <h1 class="title">Relatorio dos Funcionarios</h1>
    <div class="funcionario">
    <table id="customers">
      <tr>
        <th><b>Nome</b></th>
        <th><b>Funcao</b></th>
        <th><b>Status</b></th>
      </tr>
  _END;

  $sql = "SELECT * FROM funcionarios WHERE STATUS_FUN = 'ativo'";
  $sql = $connection->query($sql);

  for ($i = 0; $i < $sql->num_rows; $i++)
  {
    $data = $sql->fetch_assoc();

    echo "<tr>";
    echo "<td><a class=\"exibe\" href=exibe_funcionario.php?id=" . $data['COD_FUN'] . "> " . $data['NOME_FUN'] . "</a></td>";
    echo "<td>" . $data['FUNCAO_FUN'] . "</td>";
    echo "<td>" . $data['STATUS_FUN'] . "</td>";
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
