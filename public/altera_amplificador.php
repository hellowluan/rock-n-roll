<?php 

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && ($_SESSION['FUNCAO_FUN'] == 'administrador' || $_SESSION['FUNCAO_FUN'] == 'estoquista'))
{
  $id = $_GET['id'];
  $sql = "SELECT * FROM amplificadores WHERE COD_AMP = '$id' AND FILA_COMPRA_AMP = 'N'";
  $sql = $connection->query($sql);

  if ($sql->num_rows > 0)
  {
    $data = $sql->fetch_assoc();

    ?>

    <h1 class="title">Dados do Amplificador</h1>
    <p class="sub-title">Preencha todo o formulario para alterar os dados do amplificador.</p>
        
    <form action="processa_altera_amp.php" method="post" class="cadastra-funcionario" enctype="multipart/form-data">
      <hr>
      <input type=hidden name=id value="<?php echo $data['COD_AMP'] ?>">

      <label for="marca"><b>Marca</b></label>
      <input type="text" placeholder="Enter marca" name="marca" id="marca" value="<?php echo $data['MARCA_AMP'] ?>" required>

      <label for="modelo"><b>Modelo</b></label>
      <input type="text" placeholder="Enter modelo" name="modelo" id="modelo" value="<?php echo $data['MODELO_AMP'] ?>" required>

      <label for="tipo"><b>Tipo</b></label>
      <input type="text" placeholder="Enter tipo" name="tipo" id="tipo" value="<?php echo $data['TIPO_AMP'] ?>" required>

      <label for="preco"><b>Preço</b></label>
      <input type="text" placeholder="Enter preco" name="preco" id="preco" value="<?php echo $data['PRECO_AMP'] ?>" required>

      <label for="imagem"><b>Imagem</b></label><br>
      <img src="img/amplificadores/<?php echo $data['FOTO_AMP'] ?>" width="300px" alt="Amplificador">
      <input type="file" placeholder="Enter imagem" name="imagem" id="imagem" size="10">

      <button type="submit" class="cadastrar">Salvar Alterações</button>
    </form>
    
    <?php

    $connection->close();
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
