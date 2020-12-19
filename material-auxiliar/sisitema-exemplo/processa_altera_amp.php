<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "sistema_modelo");
				
	
	$cod = $_POST["codigo"];
	$marca = $_POST["marca"];	
	$modelo = $_POST["modelo"];
	$preco = $_POST["preco"];
	$tipo = $_POST["tipo"];
	$foto = $_FILES["foto"];
	
	
	if ($foto["name"] <> "") {
		$foto_nome = "img/".$foto["name"];		
		move_uploaded_file($foto["tmp_name"], $foto_nome);
	}
	
	$sql_altera = "UPDATE amplificadores 		
				   SET 		marca_amp='$marca', 
							modelo_amp = '$modelo',
							preco_amp ='$preco', 
							tipo_amp = '$tipo',
							foto_amp = '$foto_nome'
				   WHERE 	cod_amp = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('$modelo alterado com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('lista_amp.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Dados do amplificador não foram alterados. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('lista_amp.php') 
			 </script>";
	}
?>