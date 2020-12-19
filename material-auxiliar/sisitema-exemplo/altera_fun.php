<?php 
	session_start ();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    </head>
    <body>
        <div id="principal">
			<div id="topo">
				<div id="logo">
					<h1> ROCK N´ROLL Amplificadores </h1>
					<h4> Controle de estoque e venda </h4>
				</div>
				<div class="menu_global">
					<ul>
                        <li> Olá <?php include "valida_login.php";?></li>
						<li><a href="logout.php" class="active">Sair</a></li>                        
                    </ul>                
				</div>
			</div>
			<div id="conteudo_especifico">
				<div class="div_central centralizar">
					<h1> ALTERAÇÃO DE USUÁRIOS </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu_local.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "sistema_modelo");
						
						$cod = $_GET["codigo"];
										
						$sql_pesquisa = "SELECT  nome_fun, funcao_fun, login_fun, senha_fun, status_fun
										 FROM funcionarios
										 WHERE cod_fun = '$cod'";
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row($resultado_pesquisa);
					?>
					<form method="post" action="processa_altera_fun.php">
						
						<input type="hidden" name="codigo" value="<?php echo "$cod"; ?>">
						<input type="hidden" name="funcao" value="<?php echo "$registro[1]"; ?>">
						<?php 
							if ($registro[1] <> "administrador") 
							{ 
						?>
							<table class="centralizar">	
								<tr>
									<td>
										<p> Nome: </p>
									</td>
									<td>
										<p> <input type="text" name="nome" value="<?php echo "$registro[0]";?>" required> </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> funcao:  </p>
									</td>
									<td>
										<p> 
											<input type="radio" name="funcao" value="estoquista" 
											<?php
												if ($registro[1] == "estoquista") {
													echo "checked";
												}
											?>> Estoquista
											<input type="radio" name="funcao" value="vendedor"
											<?php
												if ($registro[1] == "vendedor") {
													echo "checked";
												}
											?>> Vendedor  
										</p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Login:  </p>
									</td>
									<td>
										<p> <input type="text" name="login" value="<?php echo "$registro[2]";?>" required>  </p>
									</td>
									
								</tr>
								<tr>
									<td>
										<p> Senha:  </p>
									</td>
									<td>
										<p> <input type="password" name="senha" value="<?php echo "$registro[3]";?>" required>  </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Status:  </p>
									</td>
									<td>
										<p>
											<select name="status">
												<option value="ativo"
													<?php
														if ($registro[4] == "ativo") {
															echo "selected";
														}
													?> > Ativo 
												</option>
												<option value="inativo"<?php
													if ($registro[4] == "inativo") {
														echo "selected";
													}
													?> > Inativo 
												</option>
											</select>
										</p>
									</td>
								</tr>
															
								<tr>
									<td colspan="2">
										<p> <input type="submit" value="Alterar Funcionário">  </p>
									</td>
								</tr>
							</table>
						<?php
							}
							else {
						?>
							<table class="centralizar">	
								<tr>
									<td>
										<p> Nome: </p>
									</td>
									<td>
										<p> <?php echo "$registro[0]";?> </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> funcao:  </p>
									</td>
									<td>
										<p> <?php echo "$registro[1]";?> </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Login:  </p>
									</td>
									<td>
										<p> <?php echo "$registro[2]";?> </p>
									</td>
									
								</tr>
								<tr>
									<td>
										<p> Senha:  </p>
									</td>
									<td>
										<p> <input type="password" name="senha" value="<?php echo "$registro[3]";?>" required>  </p>
									</td>
								</tr>
								<tr>
									<td>
										<p> Status:  </p>
									</td>
									<td>
										<p>
											Ativo
										</p>
									</td>
								</tr>															
								<tr>
									<td colspan="2">
										<p> <input type="submit" value="Alterar Usuario">  </p>
									</td>
								</tr>
							</table>
						<?php
							}
						?>
					</form>
				</div>				
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> AMPLI - CONTROL </h6> 
						<h6> Rua do Rock, 666 -- E-mail: contato@ampli_control.com.br -- Fone: (61) 9966 - 6677 </h6> 
					</div> 
				</div>
		</div>
    </body>
</html>