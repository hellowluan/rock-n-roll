<?php

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && ($_SESSION['FUNCAO_FUN'] == 'administrador' || $_SESSION['FUNCAO_FUN'] == 'vendedor')) 
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM amplificadores WHERE COD_AMP = '$id'";
  $sql = $connection->query($sql);
  $cod_ven = $_SESSION['COD_FUN'];

  if ($sql->num_rows > 0)
  {
    $sql = "UPDATE amplificadores SET FILA_COMPRA_AMP = 'S' WHERE COD_AMP = '$id'";
    $sql = $connection->query($sql);
    
    echo "<script>
      showAlertSucess('Produto Adicionado!', 'vendas.php');
    </script>";

    $connection->close();
  }
}

require "templates/footer.php"; 

?>
