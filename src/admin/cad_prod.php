<?php
session_start();
if (isset($_SESSION['nome'])) {
  if ($_SESSION['verif_admin'] == 0) {
?>
    <script>
      alert("Você não deveria estar aqui...");
      window.location.replace("../index/index.php");
    </script>
  <?php
  }
} else {
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
  <link rel="stylesheet" href="style_cad.css">
  <title>Cadastrar produtos (admin)</title>
</head>

<body>
  <!-- Título do container esquerdo -->
  <h2>Comercial Pai & Filhos - Cadastro de produtos</h2>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
    </div>
    <div class="form-container sign-in-container">
      <br>
      <!-- Formulario das descrições do produto que será cadastrado -->
      <form enctype="multipart/form-data" method="post" action="upload_prod.php">
        <!--Nome do produto-->
        Nome: <input name="c_nome_prod" type=text size=140 maxlength=120>
        <!--Marca do produto-->
        Marca: <input name="c_marca" type=text size=100 maxlength=100>
        <!--Descrição do produto-->
        Descrição: <br><textarea name="c_desc_prod" type=text size=460 maxlength=450 rows=6 cols=40></textarea>
        <!--Categoria do produto-->
        Categoria: <select name="c_categoria">
          <!--Select com as categorias existentes -->
          <option>Selecione...</option>
          <option value="travesseiros">Travesseiros</option>
          <option value="colchoes">Colchões</option>
          <option value="edredons">Edredons</option>
          <option value="lencois">Lençois</option>
          <option value="cadeiras">Cadeiras</option>
          <option value="plasticos">Plásticos</option>
          <option value="aluminios">Alumínios</option>
          <option value="vidros">Vidros</option>
          <option value="eletros">Eletrodomésticos</option>
          <option value="escadas">Escadas</option>
          <option value="tapetes">Tapetes</option>
          <option value="panos">Panos</option>
        </select><br>
        <!--Preço do produto-->
        Preço: <input name="c_preco" type=text 
        onkeypress="return event.charCode >= 46 && event.charCode <= 57" size=20 maxlength=11>
        <!--Imagem do produto-->
        Imagem: <input type="file" name="c_img">
        <input type=submit value=Enviar>
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
          <button><a href="index.php">Voltar</a></button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <!-- JS Links -->
  <script src="./js/index.js"></script>
</body>

</html>