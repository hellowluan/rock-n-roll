<?php

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && ($_SESSION['FUNCAO_FUN'] == 'administrador' || $_SESSION['FUNCAO_FUN'] == 'vendedor')) 
{
  echo <<<_END
  <h1 class="title">Vendas</h1>
  
  <div class="description">
    <p class="text">Amplicadores</p>
    <a href="ver_fila_compras.php" class="button">Carrinho</a>
  </div>

  <div class="amplificadores">
    <table id="customers">
      <tr>
        <th><b>Marca</b></th>
        <th><b>Modelo</b></th>
        <th><b>Tipo</b></th>
        <th><b>Preço</b></th>
        <th><b>Ação</b></th>
      </tr>
  _END;

  $sql = "SELECT * FROM amplificadores WHERE FILA_COMPRA_AMP = 'N'";
  $sql = $connection->query($sql);

  for ($i = 0; $i < $sql->num_rows; $i++)
  {
    $data = $sql->fetch_assoc();

    echo "<tr>";
    echo "<td>" . $data['MARCA_AMP'] . "</td>";
    echo "<td><a class=\"exibe\" href=exibe_amplificador.php?id=" . $data['COD_AMP'] . "> " . $data['MODELO_AMP'] . "</a></td>";
    echo "<td>" . $data['TIPO_AMP'] . "</td>";
    echo "<td>" . $data['PRECO_AMP'] . "</td>";
    echo "<td><a href=adiciona_amplificador.php?id=" 
      . $data['COD_AMP'] ." class=\"alter\">Adicionar</a></td>";
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
