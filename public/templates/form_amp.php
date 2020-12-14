<h1 class="title">Cadastrar Amplicador</h1>
<p class="sub-title">Preencha todo o formulario para cadastrar um funcionario.</p>
    
<form action="processa_cadastra_amp.php" method="post" class="cadastra-funcionario" enctype="multipart/form-data">
  <hr>

  <label for="marca"><b>Marca</b></label>
  <input type="text" placeholder="Enter marca" name="marca" id="marca" required>

  <label for="modelo"><b>Modelo</b></label>
  <input type="text" placeholder="Enter modelo" name="modelo" id="modelo" required>

  <label for="tipo"><b>Tipo</b></label>
  <input type="text" placeholder="Enter tipo" name="tipo" id="tipo" required>

  <label for="preco"><b>Preço</b></label>
  <input type="text" placeholder="Enter preco" name="preco" id="preco" required>

  <label for="imagem"><b>Imagem</b></label>
  <input type="file" name="imagem" id="imagem" size="10" required>

  <button type="submit" class="cadastrar">Cadastrar</button>
</form>
