<?php 

session_start();
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN']))
{
  if ($_SESSION['FUNCAO_FUN'] == 'administrador')
  {
    echo <<<_END
      <div class="section">
        <div class="menu">
          <ul class="options">
            <li class="option">
              <a href="index.php">Adminstração</a>
            </li>
            <li class="option">
              <a href="lista_funcionarios.php">Funcionarios</a>
            </li>
            <li class="option">
              <a href="lista_amplificadores.php">Amplificadores</a>
            </li>
            <li class="option">
              <a href="vendas.php">Vendas</a>
            </li>
            <li class="option">
              <a href="relatorios.php">Relatorios</a>
            </li>
          </ul>
        </div>
      </div>
    _END;
  }
  else if ($_SESSION['FUNCAO_FUN'] == 'estoquista')
  {
    echo <<<_END
      <div class="section">
        <div class="menu">
          <ul class="options">
            <li class="option">
              <a href="index.php">Adminstração</a>
            </li>
            <li class="option">
              <a href="lista_amplificadores.php">Amplificadores</a>
            </li>
          </ul>
        </div>
      </div>
    _END;
  }
  else
  {
    echo <<<_END
      <div class="section">
        <div class="menu">
          <ul class="options">
            <li class="option">
              <a href="administracao.php">Adminstração</a>
            </li>
            <li class="option">
              <a href="vendas.php">Vendas</a>
            </li>
          </ul>
        </div>
      </div>
    _END;
  }
 }
else
{
  header("Location: login.php");
}

require "templates/footer.php"; 

?>
