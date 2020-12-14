<?php

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && ($_SESSION['FUNCAO_FUN'] == 'administrador' || $_SESSION['FUNCAO_FUN'] == 'vendedor')) 
{
  echo <<<_END
  <h1 class="title">Carrinho</h1>
  
  <div class="description">
    <p class="text">Amplicadores</p>
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

  $sql = "SELECT *  FROM amplificadores WHERE FILA_COMPRA_AMP = 'S'";
  $sql = $connection->query($sql);
  $total = 0;

  for ($i = 0; $i < $sql->num_rows; $i++)
  {
    $data = $sql->fetch_assoc();

    echo "<tr>";
    echo "<td>" . $data['MARCA_AMP'] . "</td>";
    echo "<td><a class=\"exibe\" href=exibe_amplificador.php?id=" . $data['COD_AMP'] . "> " . $data['MODELO_AMP'] . "</a></td>";
    echo "<td>" . $data['TIPO_AMP'] . "</td>";
    echo "<td>" . $data['PRECO_AMP'] . "</td>";
    echo "<td><a href=remove_amplificador.php?id=" 
      . $data['COD_AMP'] ." class=\"remove\">Remover</a></td>";
    echo "</tr>"; 

    $total += $data['PRECO_AMP'];
      
  }
  $final = $total > 0 ? "recibo_venda.php" : "";
  echo "</table>";
  echo "<p class=\"voltar\"><a href=\"vendas.php\">Voltar a seleção de amplificadores</a></p>";
  echo "<h1 class=\"total\">Total: R$ $total </h1>";
  echo "<a href=\"$final\" class=\"finalizar\">Finalizar</a>";

  $connection->close();
}

require "templates/footer.php"; 

?>
