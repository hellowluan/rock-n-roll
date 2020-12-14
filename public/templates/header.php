<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo.svg" type="image/x-icon">
  <script src="js/alert.js"></script>

  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/container.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/funcionarios.css">
  <link rel="stylesheet" href="css/formulario.css">

  <title>Rock N' Roll | Amplificadores</title>
</head>
<body>
<header class="header">
    <nav class="nav">
      <div class="rocknroll container">
        <img src="img/logotipo.svg" alt="Rock N' Roll" class="logotipo">
        <div class="exit">
          <span class="welcome">Seja bem-vindo <?php echo $_SESSION['NOME_FUN'] ?></span>
          <a href="logout.php" class="logout">Sair</a>
        </div>
      </div>
      <div class="background">
        <div class="options container">
      <?php

      if ($_SESSION['FUNCAO_FUN'] == 'administrador')
      {
        echo <<<_END
          <a href="index.php" class="option">Administração</a>
          <a href="lista_funcionarios.php" class="option">Funcionarios</a>
          <a href="lista_amplificadores.php" class="option">Amplificadores</a>
          <a href="vendas.php" class="option">Vendas</a>
          <a href="relatorios.php" class="option">Relatorios</a>
        _END;
      }
      else if ($_SESSION['FUNCAO_FUN'] == 'estoquista')
      {
        echo <<<_END
          <a href="index.php" class="option">Administração</a>
          <a href="lista_amplificadores.php" class="option">Amplificadores</a>
      _END;
      }
      else
      {
        echo <<<_END
          <a href="index.php" class="option">Administração</a>
          <a href="vendas.php" class="option">Vendas</a>
        _END;
      }
    ?>
        </div>
      </div>
    </nav>
  </header>
  
  <section class="container">
    <!-- start content of page -->

