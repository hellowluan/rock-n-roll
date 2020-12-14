<?php

session_start();
require "connection.php";
require "templates/header.php"; 

if (isset($_SESSION['LOGIN_FUN']) && !empty($_SESSION['LOGIN_FUN'])
  && $_SESSION['FUNCAO_FUN'] == 'administrador') 
{
  echo <<<_END
      <div class="section">
        <div class="menu">
          <ul class="options">
            <li class="option">
              <a href="index.php">Adminstração</a>
            </li>
            <li class="option">
              <a href="rel_funcionarios.php">Relatorio dos Funcionarios</a>
            </li>
            <li class="option">
              <a href="rel_estoque.php">Relatorio de Amplificadores em estoque</a>
            </li>
            <li class="option">
              <a href="rel_total_vendas.php">Faturamento Total do Mes</a>
            </li>
          </ul>
        </div>
      </div>
    _END;
}

require "templates/footer.php"; 

?>
