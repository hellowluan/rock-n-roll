<?php
	session_start();

	$conectar = mysqli_connect ("localhost", "root", "", "sistema_modelo");
	
	$marca = $_POST["marca"];
	$modelo = $_POST["modelo"];
	$preco = $_POST ["preco"];
	$tipo = $_POST["tipo"];	
	$foto = $_FILES["foto"];
	
	$foto_nome = "img/".$foto["name"];
	move_uploaded_file($foto["tmp_name"], $foto_nome);
	
	$sql_cadastrar = "INSERT INTO amplificadores (marca_amp, 
											modelo_amp, 
											preco_amp, 
											tipo_amp, 
											foto_amp) 
					  VALUES 			   ('$marca',
											'$modelo', 
											'$preco',
											'$tipo',
											'$foto_nome')";
											
	$sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
	
	if ($sql_resultado_cadastrar == true) { 	
		echo "<script>
				alert ('$modelo cadastrado com sucesso') 
			  </script>";
		echo "<script>
				location.href = ('cadastra_amp.php') 
			  </script>";		
	}
	else { 	
		echo "<script> 
				alert ('ocorreu um erro no servidor ao 
											tentar cadastrar') 
			  </script>";
		
		echo "<script> 
				location.href = ('cadastra_amp.php') 
			  </script>";
	
	}
?>