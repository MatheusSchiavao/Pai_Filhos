<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link do CSS -->
  <link rel="stylesheet" href="./style.css">
  <!-- Frameworks/libs do CSS -->
  <!-- Bootstrap - CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- W3.CSS -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
  <!-- Cloudflare -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <title>Pai & Filhos</title>

</head>

<body id="home">
  <!-- DIV geral da nav -->
  <div id="header_1">
    <!-- DIV do nome da empresa -->
    <div class="logo_1">
      <a href="#home">Comercial Pai & Filhos</a>
      <!-- Fim - Div -->
    </div>
    <!-- NAV -->
    <nav style="width: 820px; padding-top: 5px; margin-right: 113px;">
      <!-- ul engloba e ordena todos os 'li' -->
      <ul style="padding-left: 0px;">
        <!-- li para acesso do index -->
        <li>
          <a href="#home">Início</a>
        </li>
        <!-- li para acesso da tela produtos -->
        <li>
          <a href="../prod/index.php">Produtos</a>
          <ul class="drop" style="margin-left: 40px;">
            <!-- li do dropdown para acessar as cetegorias de produtos -->
            <li class="scroll">
              <ul class="mega-col" style="margin-right: 20px ;">
                <li><a href="../prod/index.php?categ=travesseiros">Travesseiros</a></li>
                <li><a href="../prod/index.php?categ=colchoes">Colchões</a></li>
                <li><a href="../prod/index.php?categ=edredons">Edredons</a></li>
                <li><a href="../prod/index.php?categ=lencois">Lençois</a></li>
              </ul>
              <ul class="mega-col">
                <li><a href="../prod/index.php?categ=cadeiras">Cadeiras</a></li>
                <li><a href="../prod/index.php?categ=plasticos">Plásticos</a></li>
                <li><a href="../prod/index.php?categ=aluminios">Alumínios</a></li>
                <li><a href="../prod/index.php?categ=vidros">Vidros</a></li>
              </ul>
              <ul class="mega-col">
                <li><a href="../prod/index.php?categ=eletros">Eletrodomésticos</a></li>
                <li><a href="../prod/index.php?categ=escadas">Escadas</a></li>
                <li><a href="../prod/index.php?categ=tapetes">Tapetes</a></li>
                <li><a href="../prod/index.php?categ=panos">Panos</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- li para acessar a página de contatos da empresa -->
        <li class="drop_1">
          <a href="../contatos/contatos.php">Contatos</a>
        </li>
        <!-- li do user/admin -->
        <li class="drop_2">
          <?php
          /* O usuário irá ver seu nome no header caso esteja logado. Senão verá uma mensagem de login. */
          if(isset($_SESSION['nome'])){
            echo '<a href="../user/index.php">Olá, ' . $_SESSION['nome'] . '</a>
                <ul class="drop" style="width: 20%; margin-left: 457px;">
                  <li class="scroll">
                    <ul class="mega-col">
                      <li><a href="../assets/bd/exit.php">Sair</a></li>
                    </ul>
                  </li>
                </ul>';
          }else{
            echo "<a href='../login/index.php'>Faça o login</a>";
          }
          ?>
        </li>
        <!-- li com img para simbolizar e acessar o carrinho -->
        <li class="icon-buy">
          <a href="../carrinho/carrinho.php" style="height: 85px; width: 90px;"><img src="../assets/images/icon-buy.png" alt="" style="height: 50px; width: 50px; margin-top: -10px; margin-left: -10px;"></a>
        </li>
        <!-- form do search para conseguir pesquisar os produtos de forma automática -->
        <form action="../prod/search.php" method="GET" class="d-flex" role="search" style="padding-top: 27px; padding-left: 45px;">
            <!-- Input para fazer a pesquisa -->
            <input class="form-control" type="search" placeholder="Pesquisar" name="search" aria-label="Pesquisar" list="datalistOptions" style="margin-right: 4px; margin-left: -10px; width: 10pc;">
            <!-- Botão para fazer a pesquisa do produto -->
            <button class="btn btn-outline-success" type="submit" style="margin-right: -48px;"><i class="fa fa-search"></i></button>
            <!-- Fim - form -->
        </form>
        <!-- Fim - ul -->
      </ul>
      <!-- Fim - Nav -->
    </nav>
    <!-- Fim - Div -->
  </div>
  <!-- Main com a finalidade de separar da section logo abaixo e da nav de cima.
  Imagem meramente ilustrativa, a fins de chamar a atenção docliente juntamente com o texto se movimentando -->
  <main id="home">
    <!-- Div geral da main -->
    <div class="container">
      <!-- Segunda Div geral  -->
      <div class="title">
        <!-- Título -->
        <h2 style=" font-family: var(--font-used);">Pai & Filhos</h2>
        <!-- Subtítulo -->
        <h3 class="ml12">Sua casa na moda</h3>
        <!-- Script para o título se movimentar juntamente com o script na pg title.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <br>
        <!-- Div do botão -->
        <div class="button">
          <!-- Botão que redireciona para a página contatos -->
          <button type="button" class="btn btn-success"><a href="../contatos/contatos.php">Venha nos
              conhecer!</a></button>
          <!--Fim - Div  -->
        </div>
        <!-- Fim - Div -->
      </div>
      <!-- Fim - Div -->
    </div>
    <!-- Fim - Main -->
  </main>
  <!-- Section para organizar a terceira parte da página -->
  <section>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Anchor para o back to top, com essa seta a página retornará ao topo novamente -->
    <a href="#home" id="NUMBER"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
      </svg></a>
    <!-- Div para englobar a primeira section por completo -->
    <div class="container-fluid text-center">
      <!-- Div com a class jumbotron irá ajudar na organização do site  -->
      <div class="jumbotron">
        <!-- Frase de entrada -->
        <h2 class="display-2" id="text">Olá, Bem-vindo(a)!</h2>
        <p class="display-6">Feitos para você!</p>
        <!-- Div do hr para personalizá-lo -->
        <div class="text-success">
          <hr class="my-3">
          <!-- Fim - Div -->
        </div>
        <!-- Fim - Div -->
      </div>
      <!-- Título para mostrar do que se trata -->
      <h4>Cama, mesa e banho</h4>
      <!-- Div com class row necessária para o funcionamento do grid -->
      <div class="row">
        <!-- Div para organizar corretamente os produtos na tela -->
        <div class="col-1 offset-sm-1" style="margin-left: 65px;">
          <!-- Div do card do produto -->
          <div class="card" style="width: 18rem;">
            <!-- Imagem do produto -->
            <img src="../assets/images/cama nova 2.jpg" class="card-img-top" alt="...">
            <!-- Div do corpo do card -->
            <div class="card-body">
              <!-- Nome do produto -->
              <p class="card-text">Camas</p>
              <!-- Fim - Div -->
            </div>
            <!-- Botão de acesso a determinada categoria transcrita acima -->
            <button type="button" class="btn btn-outline-success"><a href="../prod/index.php?categ=colchoes">Saiba mais</a></button>
            <!-- Fim - Div -->
          </div>
          <!-- Fim - Div -->
        </div>
        <!-- Div para organizar corretamente os produtos na tela -->
        <div class="col-2 offset-md-3">
          <!-- Div do card do produto -->
          <div class="card" style="width: 18rem;">
            <!-- Imagem do produto -->
            <img src="../assets/images/mesa nova.jpg" class="card-img-top" alt="...">
            <!-- Div do corpo do card -->
            <div class="card-body">
              <!-- Nome do produto -->
              <p class="card-text">Toalhas de mesa</p>
              <!-- Fim - Div -->
            </div>
            <!-- Botão de acesso a determinada categoria transcrita acima -->
            <button type="button" class="btn btn-outline-success"><a href="../prod/index.php?categ=panos">Saiba mais</a></button>
            <!-- Fim - Div -->
          </div>
          <!-- Fim - Div -->
        </div>
        <!-- Div para organizar corretamente os produtos na tela -->
        <div class="col-3 offset-sm-2">
          <!-- Div do card do produto -->
          <div class="card" style="width: 18rem;">
            <!-- Imagem do produto -->
            <img src="../assets/images/toalha nova.jpg" class="card-img-top" alt="...">
            <!-- Div do corpo do card -->
            <div class="card-body">
              <!-- Nome do produto -->
              <p class="card-text">Toalhas de banho</p>
              <!-- Fim - Div -->
            </div>
            <!-- Botão de acesso a determinada categoria transcrita acima -->
            <button type="button" class="btn btn-outline-success"><a href="../prod/index.php?categ=panos">Saiba mais</a></button>
            <!-- Fim - Div -->
          </div>
          <!-- Fim - Div -->
        </div>
        <!-- Fim - Div -->
      </div>
      <!-- Fim - Div -->
    </div>
    <!-- Fim - Section -->
  </section>
  <!-- Section para organizar a quarta parte da página -->
  <section>
    <!-- Div para englobar a primeira section por completo -->
    <div class="container-fluid text-center">
      <!-- Div do hr para personalizá-lo -->
      <div class="text-success">
        <hr class="my-3">
        <!-- Fim - Div -->
      </div>
      <!-- Div com a class jumbotron irá ajudar na organização do site  -->
      <div class="jumbotron">
        <!-- Título para mostrar do que se trata -->
        <h4>utensílios para casa</h4>
        <!-- Fim - Div -->
      </div>
      <!-- Div com class row necessária para o funcionamento do grid -->
      <div class="row">
        <!-- Div para organizar corretamente os produtos na tela -->
        <div class="col-1 offset-sm-1" style="margin-left: 65px;">
          <!-- Div do card do produto -->
          <div class="card" style="width: 18rem;">
            <!-- Imagem do produto -->
            <img src="../assets/images/colheres novas.jpg" class="card-img-top" alt="...">
            <!-- Div do corpo do card -->
            <div class="card-body">
              <!-- Nome do produto -->
              <p class="card-text">Kit talheres</p>
              <!-- Fim - Div -->
            </div>
            <!-- Botão de acesso a determinada categoria transcrita acima -->
            <button type="button" class="btn btn-outline-success"><a href="../prod/index.php?categ=aluminios">Saiba mais</a></button>
            <!-- Fim - Div -->
          </div>
          <!-- Fim - Div -->
        </div>
        <!-- Div para organizar corretamente os produtos na tela -->
        <div class="col-2 offset-md-3">
          <!-- Div do card do produto -->
          <div class="card" style="width: 18rem;">
            <!-- Imagem do produto -->
            <img src="../assets/images/panela nova.jpg" class="card-img-top" alt="...">
            <!-- Div do corpo do card -->
            <div class="card-body">
              <!-- Nome do produto -->
              <p class="card-text">Panelas</p>
              <!-- Fim - Div -->
            </div>
            <!-- Botão de acesso a determinada categoria transcrita acima -->
            <button type="button" class="btn btn-outline-success "><a href="../prod/index.php?categ=aluminios">Saiba mais</a></button>
            <!-- Fim - Div -->
          </div>
          <!-- Fim - Div -->
        </div>
        <!-- Div para organizar corretamente os produtos na tela -->
        <div class="col-3 offset-sm-2">
          <!-- Div do card do produto -->
          <div class="card" style="width: 18rem;">
            <!-- Imagem do produto -->
            <img src="../assets/images/cadeira nova.jpg" class="card-img-top" alt="...">
            <!-- Div do corpo do card -->
            <div class="card-body">
              <!-- Nome do produto -->
              <p class="card-text">Cadeiras</p>
              <!-- Fim - Div -->
            </div>
            <!-- Botão de acesso a determinada categoria transcrita acima -->
            <button type="button" class="btn btn-outline-success"><a href="../prod/index.php?categ=cadeiras">Saiba mais</a></button>
            <!-- Fim - Div -->
          </div>
          <!-- Fim - Div-->
        </div>
        <!-- Fim - Div-->
      </div>
      <!-- Fim - Section -->
  </section>
  <br>
  <!-- Footer com menção a trindade FullStack -->
  <footer>
    <span>© 2022 By <a href="../criators/criators.html">Trindade Fullstack</a></span>
  </footer>

  <!-- Scripts do site -->
  <script src="./js/main.js"></script>
  <script src="./js/title.js"></script>
  <script src="./js/scroll.js"></script>

  <!-- Booststrap - JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
</body>

</html>