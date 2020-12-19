<?php 

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  echo <<<_END
    <h1 class="title">Faturamento Total</h1>
    _END;

  $sql = "SELECT * FROM amplificadores WHERE FILA_COMPRA_AMP = 'V'";
  $sql = $connection->query($sql);
  $total = 0;

  for ($i = 0; $i < $sql->num_rows; $i++)
  {
    $total += $sql->fetch_assoc()['PRECO_AMP'];
  }

  echo "<h2 class=\"sub-title\"> " . date('d/m/Y') . "</\h2>";
  echo "<p class=\"voltar\"><a href=\"relatorios.php\">Voltar</a></p>";
  echo "<h1 class=\"total\">Total: R$ $total </h1>";
}
else
{
  header("Location: login.php");
}

require "templates/footer.php"; 

?>
