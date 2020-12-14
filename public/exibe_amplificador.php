<?php 

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN']))
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM amplificadores WHERE COD_AMP = '$id' AND FILA_COMPRA_AMP != 'V'";
  $sql = $connection->query($sql);

  if ($sql->num_rows > 0)
  {
    $data = $sql->fetch_assoc();

    ?>
    <h1 class="title">Dados do Amplificador</h1>
        
    <form action="processa_altera_fun.php" method="get" class="cadastra-funcionario">
      <hr>
      <input type=hidden name=id value="<?php echo $data['COD_AMP'] ?>">

      <label for="marca"><b>Marca</b></label>
      <input type="text" placeholder="Enter marca" name="marca" id="marca" value="<?php echo $data['MARCA_AMP'] ?>" disabled>

      <label for="modelo"><b>Modelo</b></label>
      <input type="text" placeholder="Enter modelo" name="modelo" id="modelo" value="<?php echo $data['MODELO_AMP'] ?>" disabled>

      <label for="tipo"><b>Tipo</b></label>
      <input type="text" placeholder="Enter tipo" name="tipo" id="tipo" value="<?php echo $data['TIPO_AMP'] ?>" disabled>

      <label for="preco"><b>Preço</b></label>
      <input type="text" placeholder="Enter preco" name="preco" id="preco" value="<?php echo $data['PRECO_AMP'] ?>" disabled>

      <label for="imagem"><b>Imagem</b></label><br>
      <img src="img/amplificadores/<?php echo $data['FOTO_AMP'] ?>" width="300px" alt="Amplificador">
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
