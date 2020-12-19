<?php

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && ($_SESSION['FUNCAO_FUN'] == 'administrador' || $_SESSION['FUNCAO_FUN'] == 'vendedor')) 
{
  echo "<script>
    showAlertSucessTimer('Venda Finalizada!'); 
  </script>";

  echo <<<_END
  <h1 class="title">Recibo</h1>
  
  <div class="description">
    <p class="text">Amplicadores</p>
  </div>

  <div class="amplificadores">
    <table id="customers">
      <tr>
        <th><b>Marca</b></th>
        <th><b>Modelo</b></th>
        <th><b>Preço</b></th>
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
    echo "<td>" . $data['PRECO_AMP'] . "</td>";
    echo "</tr>"; 

    $total += $data['PRECO_AMP'];
      
  }

  $data_venda = date("d/m/Y");
  $cod_fun = $_SESSION['COD_FUN'];
  $sql = "INSERT INTO vendas (COD_VEN, DATA_VEN, FUNCIONARIOS_COD_FUN) 
    VALUES (NULL, '$data_venda', '$cod_fun')";
  $sql = $connection->query($sql);

  $up = "SELECT * FROM vendas ORDER BY COD_VEN DESC";
  $up = $connection->query($up);

  if ($up->num_rows > 0)
  {
    $data = $up->fetch_assoc();    
    $vendas_cod_ven = $data['COD_VEN'];

    $up = "UPDATE amplificadores SET VENDAS_COD_VEN = '$vendas_cod_ven', 
      FILA_COMPRA_AMP = 'V' WHERE FILA_COMPRA_AMP = 'S' 
      AND VENDAS_COD_VEN IS NULL";

    $up = $connection->query($up);
    $connection->close();
  }
  
  echo "</table>";
  echo "<h2 class=\"recibo\">Venda Nº: <b>$vendas_cod_ven</b>";
  echo "<h2 class=\"recibo\">Data: <b>$data_venda</b></h2>";
  echo "<h1 class=\"total\">Total: R$ $total </h1>";
  echo "<p class=\"voltar\"><a href=\"vendas.php\">Fechar Recibo</a></p>";

}

require "templates/footer.php"; 

?>
