<?php

session_start();
require "connection.php";
require "templates/header.php";

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && ($_SESSION['FUNCAO_FUN'] == 'administrador' || $_SESSION['FUNCAO_FUN'] == 'estoquista'))
{
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $tipo = $_POST['tipo'];
  $preco = $_POST['preco'];
  $imagem = $_FILES['imagem']['name'];
  $dir = 'img/amplificadores/'.$imagem;

  if (move_uploaded_file($_FILES['imagem']['tmp_name'], $dir))
  {
    $sql = "INSERT INTO amplificadores (COD_AMP, TIPO_AMP, MARCA_AMP, MODELO_AMP, PRECO_AMP, FOTO_AMP, FILA_COMPRA_AMP, VENDAS_COD_VEN) VALUES (NULL, '$tipo', '$marca', '$modelo', '$preco', '$imagem', 'N', NULL)";
    $sql = $connection->query($sql);
    
    echo "<script>
      showAlert('success','Amplicador Cadastrado!', 'Deseja cadastar mais um amplificador?', 'Sim', 'Não', 'cadastra_amplificador.php', 'lista_amplificadores.php');
    </script>
    ";

  }
  else
  {
    require "templates/not_found.php";
    echo "<script>
    function showAlertError() {
      Swal.fire({
        title: 'Erro ao Cadastar!',
        text: 'Ocorreu um erro ao upar a imagem.',
        icon: 'error',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = ('cadastra_funcionario.php');
        } else {
          location.href = ('cadastra_funcionario.php');
        }
      });
    }

    showAlertError();

    </script>";

  }

}
else
{
  header("Location: login.php");
}

require "templates/footer.php";

