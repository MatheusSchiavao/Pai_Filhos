<?php
session_start();

/* Criando uma variável para o total do preço do carrinho. */
$total = 0;

//Conexão com o banco
require("../assets/bd/connect.php");
/* Caso não haja uma sessão aberta, o usuário terá de fazer login antes. */
if (!isset($_SESSION['nome'])) {
?>
  <script>
    alert("Faça login primeiro...");
    window.location.replace('../login/index.php');
  </script>
  <?php
}

if (isset($_GET['action'])) {
  if ($_GET['action'] = "limp") {
    unset($_SESSION['carrinho']);
  }
}

if (isset($_GET['id_prod'])) {

  $id = intval($_GET['id_prod']);

  if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
  }

  /* Pesquisando produtos com o código no $_GET */
  $pesquisar_prod = "SELECT * FROM `produto` WHERE `cod_prod` = '$id'";
  $resultado_prod = mysqli_query($conexao, $pesquisar_prod);
  $numero_resultado = mysqli_num_rows($resultado_prod);

  /* Caso não haja produtos com tal código, o programa pode prosseguir. */
  if ($numero_resultado == 0) {
  ?>
    <script>
      alert("Este produto não foi encontrado...");
      javascript: history.back;
      die();
    </script>
<?php
  } else {
    if (!isset($_GET['action'])) {
      if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += 1;
      } else {
        $_SESSION['carrinho'][$id] = 1;
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/carrinho.css">
  <title>Carrinho - Pai & Filhos</title>
</head>

<body>
  <div class="wrap cf">
    <img src="../assets/images/Logo_P&F.png" alt="Pai & Filhos" style="height: 110px; width: 120px;">
    <!-- Título class carrinho -->
    <h1 class="projTitle">Pai & Filhos</h1>
    <div class="heading cf">
      <h1>Meu carrinho</h1>
      <!-- Link direcionado para pagina de produtos -->
      <a href="../prod/index.php" class="continue">Continue comprando</a>
    </div>
    <!-- class principal -->
    <div class="cart">
      <ul class="tableHead">
        <!-- Elementos da class -->
        <li class="prodHeader">Produtos</li>
        <li>Total</li>
      </ul>
      <?php
      /* Se a variável do carrinho não for nula, o programa irá realizar uma estrutura de repetição para inserir as informações
      estilizadas de cada produto presente no carrinho na página. Caso contrário o site dará o carrinho como vazio, 
      e o usuário terá de voltar ao início. */
      if ($_SESSION['carrinho'] != NULL) {
        foreach ($_SESSION['carrinho'] as $id => $qtd) {
          /* Pesquisando informações do código no array do carrinho e colocando-a em outro array, apresentando no bloco. */
          $pesquisar_prod = "SELECT * FROM `produto` WHERE `cod_prod` = '$id'";
          $resultado_prod = mysqli_query($conexao, $pesquisar_prod);
          $vetor_prod = mysqli_fetch_array($resultado_prod);
      ?>
          <ul class="cartWrap">
            <li class="items even" style="padding-left: 0;">
              <div class="infoWrap">
                <div class="cartSection">
                  <img src="<?php echo $vetor_prod[4]; ?>" alt="" class="itemImg" />
                  <p class="itemNumber">ID do produto: <?php echo $vetor_prod[0]; ?></p>
                  <h3><?php echo $vetor_prod[1]; ?> - <?php echo $vetor_prod[3]; ?></h3>

                  <p><?php echo $qtd. " x " . $vetor_prod[6]; ?></p>
                </div>
                <div class="prodTotal cartSection">
                  <p><?php echo $vetor_prod[6] * $qtd; ?></p>
                </div>
              </div>
            </li>
            <hr>
          </ul>
        <?php
          /* Somando o total dos preços. */
          $total += $vetor_prod[6] * $qtd;
        }
      } else {
        ?>
        <script>
          alert("Não há nada no carrinho...");
          window.location.replace("../prod/index.php");
        </script>
      <?php
      }
      ?>
    </div>
    <!-- Class do pagameto final -->
    <div class="subtotal cf" style="margin-right: 35%">
      <ul style="list-style-type: none;">
        <li class="totalRow final" style="margin-right: 32%"><span class="label">Total</span><span class="value">R$<?php echo $total; ?></span></li>
        <li class="totalRow"><a href="?action=limp" class="btn continue" style="background-color: red; margin-bottom: 30px">Limpar carrinho</a></li>
        <li class="totalRow"><a href="../index/index.php" class="btn continue" onclick="alert('Pedido finalizado!');">Finalizar pedido</a></li>
      </ul>
    </div>
  </div>
  <!-- JS Link -->
  <script src="./js/main.js"></script>
</body>

</html>