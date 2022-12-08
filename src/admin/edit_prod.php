<?php
session_start();

//Conexão com o banco
require("../assets/bd/connect.php");

if(isset($_SESSION['nome'])){
    if ($_SESSION['verif_admin'] == 0) {
        ?>
        <script>
        alert("Você não deveria estar aqui...");
        window.location.replace("../index/index.php");
        </script>
        <?php
    }
}
if(isset($_GET['id_prod'])){
    //Conexão com o banco
    $id = $_GET['id_prod'];

    //Gerando a SQL de PESQUISA das categorias existentes no BD
    $pesquisar_prod = "SELECT * FROM `produto` WHERE `cod_prod` = '$id'";

    //Executando a SQL e armazenando o resultado em uma variavel
    $resultado_prod = mysqli_query($conexao, $pesquisar_prod);

    //Obtendo o numero de linhas retornadas na pesquisa
    $numero_resultado = mysqli_num_rows($resultado_prod);

    if($numero_resultado == 0)
    {
        ?>
            <script>
                alert("Este produto não foi encontrado...");
                javascript:history.back;
            </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/Logo_P&F.png" type="image/x-icon">
    <!-- Link do CSS-->
    <link rel="stylesheet" href="style_cad.css">
    <title>Editar produto (Admin)</title>
</head>
<body>
    <?php
    for($i = 0; $i < $numero_resultado; $i++){
        //Gerando um vetor com as categorias
        $vetor_prod = mysqli_fetch_array($resultado_prod);
    ?>
    <!-- Título do container esquerdo -->
    <h2>Comercial Pai & Filhos - Alterar atributos</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
        </div>
        <div class="form-container sign-in-container">
            <br>
            <form enctype="multipart/form-data" method="POST" action="upload_alt_prod.php">
                <!-- Formularios das descrições dos produtos -->
                <input name="id_prod" type="hidden" value="<?php echo $vetor_prod[0]; ?>"> 
                <!-- Nome do produto -->
                Nome: <input name="a_nome_prod" type=text size=140 maxlength=120 value="<?php echo $vetor_prod[1]; ?>" required>
                <!-- Marca do produto -->
                Marca: <input name="a_marca" type=text size=100 maxlength=100 value="<?php echo $vetor_prod[3] ?>" required>
                <!-- Descrição do produto -->
                Descrição: <br><textarea name="a_desc_prod" type=text size=460 maxlength=450 rows=6 cols=40><?php echo $vetor_prod[2] ?></textarea>
                <!-- Categoria do produto -->
                Categoria: <select name="a_categoria">
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
                <!-- Preço do produto -->
                Preço: <input name="a_preco" type=text 
                onkeypress="return event.charCode >= 46 && event.charCode <= 57" 
                size=20 maxlength=11 value="<?php echo $vetor_prod[6]; ?>" required>
                <!--Imagem do produto -->
                Imagem: <input type="file" name="a_img">
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
                    <a href="excluir_prod.php?id_prod=<?php echo $vetor_prod[0];} ?>">
                    <button style="background-color: red; font-size: 15px;">Excluir</button></a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- JS Link -->
    <script src="./js/index.js"></script>
</body>
</html>