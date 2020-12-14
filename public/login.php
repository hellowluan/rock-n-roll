<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wCOD_FUNth=device-wCOD_FUNth, initial-scale=1.0">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <link href="https://fonts.googleapis.com/css2?family=
    Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="img/logo.svg" type="image/x-icon">
  
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/container.css">
  <link rel="stylesheet" href="css/login.css">

  <title>Login</title>
</head>
<body>

  <div class="login-box">
    <img src="img/logomarca.svg" class="logo-icon">
    <form method="POST" class="form" action="processa_login.php">
      <label for="username">Usuario</label>
      <input type="text" name="username" required>
      <label for="password">Senha</label>
      <input type="password" name="password" required>

      <input type="submit" value="Entrar">
    </form>
  </div>

</body>
</html>
