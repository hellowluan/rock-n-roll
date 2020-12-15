<?php
/*
[ ] - atualizar sem ter que upar uma nova imagem
[ ] - adicionar funcao que apaga imagem antiga 
      caso faça upload de uma nova imagem
[ ] - refatorar
*/

session_start();
require "connection.php";
require "templates/header.php";

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && ($_SESSION['FUNCAO_FUN'] == 'administrador' || $_SESSION['FUNCAO_FUN'] == 'estoquista'))
{
  $id = $_POST['id'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $tipo = $_POST['tipo'];
  $preco = $_POST['preco'];
  $imagem = $_FILES['imagem']['name'];
  $dir = 'img/amplificadores/'.$imagem;

  if (!empty($imagem))
  {
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $dir))
    {
      $sql = "UPDATE amplificadores SET MARCA_AMP = '$marca', MODELO_AMP = '$modelo', TIPO_AMP = '$tipo', PRECO_AMP = '$preco', FOTO_AMP = '$imagem' WHERE COD_AMP = '$id'";
      
      $sql = $connection->query($sql);
    }
  }
    
  $sql = "UPDATE amplificadores SET MARCA_AMP = '$marca', MODELO_AMP = '$modelo', TIPO_AMP = '$tipo', PRECO_AMP = '$preco' WHERE COD_AMP = '$id'";
  $sql = $connection->query($sql);
  
  echo "<script> 
    showAlertSucess('Amplicador Alterado', 'altera_amplificador.php?id=$id', 'lista_amplificadores.php');
  </script>;";

  $connection->close();
}
else
{
  header("Location: login.php");
}

require "templates/footer.php";
