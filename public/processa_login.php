<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wCOD_FUNth=device-wCOD_FUNth, initial-scale=1.0">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <link href="https://fonts.googleapis.com/css2?family=
    Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo.svg" type="image/x-icon">
  
  <link rel="stylesheet" href="css/base.css">
  
  <title>Login</title>
</head>
<body>
<?php

session_start();
require "connection.php";

if(isset($_SESSION['LOGIN_FUN']) == 0)
{
  if(isset($_POST['username']) && !empty($_POST['username']) 
    && isset($_POST['password']) && !empty($_POST['password'])) 
  {

    $user = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    $sql = "SELECT * FROM funcionarios WHERE 
      LOGIN_FUN = '$user' AND SENHA_FUN = '$password' AND STATUS_FUN = 'ativo'";
    $sql = $connection->query($sql);

    if($sql->num_rows > 0) 
    {
      $data = $sql->fetch_assoc();
      $_SESSION['LOGIN_FUN'] = $data['LOGIN_FUN'];
      $_SESSION['NOME_FUN'] = $data['NOME_FUN'];
      $_SESSION['FUNCAO_FUN'] = $data['FUNCAO_FUN'];
      $_SESSION['COD_FUN'] = $data['COD_FUN'];
      
      header("Location: index.php");
    }
    else
    {
      echo "<script>
              Swal.fire({
                title: 'Acesso Negado!',
                text: 'Usuario ou Senha invalido.',
                icon: 'error',
                confirmButtonText: 'Tentar Novamente'
              }).then((result) => {
                if (result.isConfirmed) {
                  location.href = ('login.php');
                } else {
                  location.href = ('login.php');
                }
              });            
          </script>";
    }
    
  }
} 
else
{
  header("Location: index.php");
}

?>

</body>
</html>

