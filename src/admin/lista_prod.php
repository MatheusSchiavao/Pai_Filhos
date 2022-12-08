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
    <meta http-equiv="X-UA-Compatible" content="opera-gx">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/Logo_P&F.png" type="image/x-icon">
    <!-- Link do CSS-->
    <link rel="stylesheet" href="../css/style_coll.css">
    <!-- Frameworks/libs do CSS -->
    <!-- Bootstrap - CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <!-- Cloudflare -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <title>Alterar Produtos (admin)</title>
</head>

<body>
    <!-- Nav da parte administrativa -->
    <div id="header_1">
        <div class="logo_1">
            <a href="./index.php">Comercial Pai & Filhos</a>
        </div>
        <nav style="width: 891px; padding-top: 5px;">
            <ul style="float: right; margin-right: 25px">
                <li>
                    <!-- Link para a pagina de cadastrar produtos -->
                    <a href="cad_prod.php">Cadastrar produtos</a>
                </li>
                <li class="drop_1">
                    <!-- Link para pagina principal -->
                    <a href="../prod/index.php">Ver produtos</a>
                </li>
                <li class="drop_2">
                    <!-- Mostrando o nome do usuário no <header> com $_SESSION. -->
                    <a href="../user/index.php">Olá, <?php echo $_SESSION['nome']; ?> </a>
                    <ul class="drop" style="width: 40%; margin-left: 430px;">
                        <li class="scroll">
                            <ul class="mega-col">
                                <li><a href="../index/index.php">Voltar ao site</a></li>
                                <li><a href="../assets/bd/exit.php">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <h1 style="margin: 40px; text-align: center;">Produtos na loja</h1>
    <?php
    //Conexão com o banco
    require("../assets/bd/connect.php");

    /* Pesquisando produtos para inseri-los no site. Caso o número seja 0, ele levará o usuário para a página de cadastro. */
    $pesquisar_prod = "SELECT * FROM `produto`";
    $resultado_prod = mysqli_query($conexao, $pesquisar_prod);
    $numero_resultado = mysqli_num_rows($resultado_prod);

    /* Caso o número seja diferente de 0, ele fará um laço de repetição para inserir produtos numa estrutura estilizada. */
    if($numero_resultado == 0)
    {
        ?>
            <script>
                alert("Não existem produtos cadastrados...");
                window.location.replace("cad_prod.php");
            </script>
        <?php
    }
    /* Caso o número seja diferente de 0, ele fará um laço de repetição para inserir produtos numa estrutura estilizada. */
    else{
        $col = 0;
        /* O programa irá usar as informações dos produtos e vai inserí-los automatizadamente na página. */
        for($i = 1; $i <= $numero_resultado; $i++){
            $vetor_prod = mysqli_fetch_array($resultado_prod);

            $col += 1;

            if($col == 1){
                echo '
    <section id="col" style="margin-bottom: 50px;">
        <div class="container-fluid text-center">
            <div class="text-success"></div>
            <div class="row">';
            }

            if($col == 1){
                echo '
                <div class="col-1 offset-sm-1">';
            }
            if($col == 2){
                echo '
                <div class="col-2 offset-md-3">';
            }

            if($col == 3){
                echo '
                <div class="col-3 offset-sm-2">';
            }
            echo '
                    <div class="card" style="width: 18rem;">
                        <img src="'.$vetor_prod[4].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">'.$vetor_prod[1].'</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">'.$vetor_prod[3].'</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">R$'.$vetor_prod[6].'</p>
                        </div>
                        <button type="button" class="btn btn-success">
                            <a href="edit_prod.php?id_prod='.$vetor_prod[0].'" class="color-hover">Editar produto</a>
                        </button>
                    </div>
                </div>';
            if($col == 3){
                echo '
            </div>
        </div>
    </section>
                ';
                $col = 0;
            }
        }
    }
    ?>

    <!-- Bootstrap - JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>
</html>