<?php 

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador')
{
  echo <<<_END
    <h1 class="title">Relatorio dos Amplificadores em estoque</h1>
    <div class="amplificadores">
    <table id="customers">
      <tr>
        <th><b>Marca</b></th>
        <th><b>Modelo</b></th>
        <th><b>Tipo</b></th>
        <th><b>Preço</b></th>
      </tr>
  _END;

  $sql = "SELECT * FROM amplificadores WHERE VENDAS_COD_VEN IS NULL 
    AND FILA_COMPRA_AMP = 'N'";
  $sql = $connection->query($sql);

  for ($i = 0; $i < $sql->num_rows; $i++)
  {
    $data = $sql->fetch_assoc();

    echo "<tr>";
    echo "<td>" . $data['MARCA_AMP'] . "</td>";
    echo "<td><a class=\"exibe\" href=exibe_amplificador.php?id=" . $data['COD_AMP'] . "> " . $data['MODELO_AMP'] . "</a></td>";
    echo "<td>" . $data['TIPO_AMP'] . "</td>";
    echo "<td>" . $data['PRECO_AMP'] . "</td>";
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
