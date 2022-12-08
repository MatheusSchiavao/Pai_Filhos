<?php
session_start();

/* A sequência irá verificar se há uma sessão ativa no dispositivo, caso contrário levará o usuário para a página de login. 
Logo após o código irá verificar se a conta da sessão possui privilégios de administrador, caso contrário irá levar para a página inicial. */
if(isset($_SESSION['nome'])){
  if($_SESSION['verif_admin'] == 0){
  ?>
    <script>
      alert("Você não deveria estar aqui...");
      window.location.replace("../index/index.php");
    </script>
  <?php
  }
}else{
  ?>
  <script>
    window.location.replace("../login/index.php");
  </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/images/Logo_P&F.png" type="image/x-icon">
  <!-- Link do CSS-->
  <link rel="stylesheet" href="style_index.css">
  <title>Admin - Pai & Filhos</title>
</head>

<body>
  <!-- Título do container esquerdo -->
  <h2>Comercial Pai & Filhos - Página de administrador</h2>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
    </div>
    <div class="form-container sign-in-container">
      <!-- Elementos deontro do container -->
      <form action="#">
        <!--Título -->
        <h1>Gerenciamento</h1>
        <!-- Cadastrar produto -->
        <button><a href="./cad_prod.php">Cadastrar</a></button>
        <!-- Alterar produto -->
        <button><a href="./lista_prod.php">Alterar</a></button>
        <!-- Excluir produto -->
        <button><a href="./exluir_prod.php">Excluir</a></button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">

        </div>
        <!-- Class do container direito -->
        <div class="overlay-panel overlay-right">
          <h1>Olá, <?php echo $_SESSION['nome']; ?>!</h1>
          <p>Acesso restrito</p>
          <button><a href="../index/index.php">Voltar</a></button>
        </div>
      </div>
    </div>
  </div>
<!-- JS Links -->
  <script src="./js/index.js"></script>
</body>

</html>