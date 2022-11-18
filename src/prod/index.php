<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Link do CSS -->
    <link rel="stylesheet" href="../prod/style.css">
    <!-- Frameworks/libs do CSS -->
    <!-- Bootstrap - CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <!-- Cloudflare -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

    <title>Produtos - Pai & Filhos</title>
</head>

<body id="home">
    <!-- DIV geral da nav -->
    <div id="header_1">
        <!-- DIV do nome da empresa -->
        <div class="logo_1">
            <a href="../index/index.php">Comercial Pai & Filhos</a>
            <!-- Fim - Div -->
        </div>
        <!-- NAV -->
        <nav style="width: 820px; padding-top: 5px; margin-right: 113px;">
            <!-- ul engloba e ordena todos os 'li' -->
            <ul style="padding-left: 0px;">
                <!-- li para acesso do index -->
                <li>
                    <a href="../index/index.php">Início</a>
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
                    if (isset($_SESSION['nome'])) {
                        echo '<a href="../user/index.php">Olá, ' . $_SESSION['nome'] . '</a>
                    <ul class="drop" style="width: 20%; margin-left: 457px;">
                    <li class="scroll">
                        <ul class="mega-col">
                        <li><a href="../assets/bd/exit.php">Sair</a></li>
                        </ul>
                    </li>
                    </ul>';
                    } else {
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
    <!-- Imagem da promoção de inverno -->
    <img src="../assets/images/produtos.PNG" style="width: 70rem; height: 30rem; margin-left: 12rem;">
    <!-- DIV do botão para acessar a promoção -->
    <div class="button">
        <button type="button" class="btn btn-success" style="margin-top: -15rem; margin-left: 17rem;" disabled>
            <a class="btn-hover" style="text-decoration: none;" disabled>Em breve</a>
        </button>
    </div>
    <hr>
    <?php
    /* Caso não haja uma categoria selecionada através do $_GET, o site irá pesquisar todas as categorias de produtos no banco de dados
    de forma separada, apresentando-as atráves de uma estrutura de repetição que vai mostrar todos os produtos daquela categoria. 
    Caso contrário, o site processará somente a pesquisa da categoria escolhida no banco de dados. */
    if (!isset($_GET['categ'])) {

        $col = 0;

        //Conexão com o banco
        require("../assets/bd/connect.php");

        /* Procurando produtos com a categoria específica. */
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'travesseiros'";
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);
        $numero_resultado = mysqli_num_rows($resultado_prod);

        /* Caso haja resultados, o site irá usar a estrutura de repetição */
        if ($numero_resultado != 0) {
            echo '
        <hr>
        <h2 class="text-center">Travesseiros</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'edredons'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if($numero_resultado != 0){
            echo '
        <hr>
        <h2 class="text-center">Edredons</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'lencois'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if($numero_resultado != 0){
            echo '
        <hr>
        <h2 class="text-center">Lençóis</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'cadeiras'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if($numero_resultado != 0){
            echo '
        <hr>
        <h2 class="text-center">Cadeiras</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'plasticos'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if ($numero_resultado != 0) {
            echo '
        <hr>
        <h2 class="text-center">Plásticos</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'aluminios'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if ($numero_resultado != 0) {
            echo '
        <hr>
        <h2 class="text-center">Alumínios</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'vidros'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if ($numero_resultado != 0) {
            echo '
        <hr>
        <h2 class="text-center">Vidros</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'eletros'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if ($numero_resultado != 0) {
            echo '
        <hr>
        <h2 class="text-center">Eletrodomésticos</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'escadas'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if ($numero_resultado != 0) {
            echo '
        <hr>
        <h2 class="text-center">Escadas</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'tapetes'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if ($numero_resultado != 0) {
            echo '
        <hr>
        <h2 class="text-center">Tapetes</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
          <section id="col" style="margin-bottom: 50px;">
              <div class="container-fluid text-center">
                  <div class="text-success"></div>
                  <div class="row">';
                }

                if ($col == 1) {
                    echo '
                      <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                      <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                      <div class="col-3 offset-sm-2">';
                }
                echo '
                          <div class="card" style="width: 18rem;">
                              <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[1] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">' . $vetor_prod[3] . '</p>
                              </div>
                              <div class="card-body">
                                  <p class="card-text">R$' . $vetor_prod[6] . '</p>
                              </div>
                              <button type="button" class="btn btn-outline-success">
                                  <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                              </button>
                          </div>
                      </div>';
                if ($col == 3) {
                    echo '
                  </div>
              </div>
          </section>
                      ';
                    $col = 0;
                }
            }
        }

        $col = 0;

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = 'panos'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if ($numero_resultado != 0) {
            echo '
        <hr>
        <h2 class="text-center">Panos</h2>';

            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
            <section id="col" style="margin-bottom: 50px;">
                <div class="container-fluid text-center">
                    <div class="text-success"></div>
                    <div class="row">';
                }

                if ($col == 1) {
                    echo '
                        <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                        <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                        <div class="col-3 offset-sm-2">';
                }
                echo '
                            <div class="card" style="width: 18rem;">
                                <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">' . $vetor_prod[1] . '</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">' . $vetor_prod[3] . '</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">R$' . $vetor_prod[6] . '</p>
                                </div>
                                <button type="button" class="btn btn-outline-success">
                                    <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                                </button>
                            </div>
                        </div>';
                if ($col == 3) {
                    echo '
                    </div>
                </div>
            </section>
                      ';
                    $col = 0;
                }
            }
        }
    }else{
        //Conexão com o banco
        require("../assets/bd/connect.php");

        $col = 0;

        $categoria = $_GET['categ'];

        //Gerando a SQL de PESQUISA das categorias existentes no BD
        $pesquisar_prod = "SELECT * FROM `produto` WHERE `categoria` = '$categoria'";

        //Executando a SQL e armazenando o resultado em uma variavel
        $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

        //Obtendo o numero de linhas retornadas na pesquisa
        $numero_resultado = mysqli_num_rows($resultado_prod);

        if ($numero_resultado != 0) {
            //Existe categorias cadastradas!
            for ($i = 1; $i <= $numero_resultado; $i++) {
                $vetor_prod = mysqli_fetch_array($resultado_prod);

                $col += 1;

                if ($col == 1) {
                    echo '
            <section id="col" style="margin-bottom: 50px;">
                <div class="container-fluid text-center">
                    <div class="text-success"></div>
                    <div class="row">';
                }

                if ($col == 1) {
                    echo '
                        <div class="col-1 offset-sm-1">';
                }
                if ($col == 2) {
                    echo '
                        <div class="col-2 offset-md-3">';
                }

                if ($col == 3) {
                    echo '
                        <div class="col-3 offset-sm-2">';
                }
                echo '
                            <div class="card" style="width: 18rem;">
                                <img src="' . $vetor_prod[4] . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">' . $vetor_prod[1] . '</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">' . $vetor_prod[3] . '</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">R$' . $vetor_prod[6] . '</p>
                                </div>
                                <button type="button" class="btn btn-outline-success">
                                    <a href="../carrinho/carrinho.php?id_prod=' . $vetor_prod[0] . '" class="color-hover">Adicionar ao carrinho</a>
                                </button>
                            </div>
                        </div>';
                if ($col == 3) {
                    echo '
                    </div>
                </div>
            </section>
                      ';
                    $col = 0;
                }
            }
        }
    }
    ?>
    <!-- Bootstrap - JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
<?php mysqli_close($conexao); ?>