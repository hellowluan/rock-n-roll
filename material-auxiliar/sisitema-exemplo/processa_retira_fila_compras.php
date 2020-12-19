<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "sistema_modelo");
				
	
	$cod = $_GET["codigo"];	
	
	$sql_altera = "UPDATE amplificadores 		
				   SET 		fila_compra_amp = 'N'
				   WHERE 	cod_amp = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('Amplificador retirado da fila de compra com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. O amplificador não foi retirado da fila de compras. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}
?>