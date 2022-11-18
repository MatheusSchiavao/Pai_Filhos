<!-- Upload do produto cadastrado no cad_prod.php -->

<?php
session_start();

/* A sequência irá verificar se há uma sessão ativa no dispositivo, 
logo após irá verificar se a conta da sessão possui privilégios de administrador. */
    if(isset($_SESSION['nome'])){
    if($_SESSION['verif_admin'] == 0){
    ?>
    <script>
    alert("Você não deveria estar aqui...");
    window.location.replace("../index/index.php");
    </script>
    <?php
    die();
    }
}else{
    ?>
    <script>
        window.location.replace("../login/index.php");
    </script>
    <?php
    die();
}

if($_POST['c_categoria'] == "Selecione..."){
    ?>
    <script>
        alert("Selecione uma categoria...");
        javascript:history.back();
    </script>
    <?php
    die();
}

require("../assets/bd/connect.php");

/* O upload só será efetuado caso o arquivo da imagem exista no $_POST do formulário, 
caso contrário a página levará a tela inicial do administrador. */
if(isset($_FILES['c_img'])){

    $nome_prod = $_POST['c_nome_prod'];
    $desc_prod = $_POST['c_desc_prod'];
    $marca = $_POST['c_marca'];
    $categoria = $_POST['c_categoria'];
    $preco = $_POST['c_preco'];

    /* Pesquisando produtos iguais com os fornecidos pelo usuário. */
    $pesquisar_prod = "SELECT * FROM `produto` WHERE nome_prod = '$nome_prod'";
    $resultado_prod = mysqli_query($conexao, $pesquisar_prod);
    $numero_retorno = mysqli_num_rows($resultado_prod);

    /* Se não houver nenhum produto com o mesmo nome do fornecido no formulário, a declaração das informações no SQL será feita.
    Caso contrário, o usuário retornará ao formulário. */
    if($numero_retorno == 0){
        /* Declaração da variável da imagem */
        $img_prod = $_FILES['c_img'];

        /* Declaração do novo caminho da imagem e criação do uniqid() para mudar o local da imagem, 
        do local temporário ao source do servidor */
        $pasta = "../assets/img_prod/";
        $novoNomeImg = uniqid();
        $extensaoImg = strtolower(pathinfo($img_prod['name'], PATHINFO_EXTENSION));

        /* Condições caso o upload sofra um erro, caso a extensão seja a errada, ou, caso a imagem seja muito pesada */
        if($img_prod['error']){

            ?>
            <script>
                alert("Falha ao enviar o arquivo...");
                javascript:history.back();
            </script>
            <?php
            die();
        }

        if($extensaoImg != 'jpg' && $extensaoImg != 'png'){
            ?>
            <script>
                alert("Extensão não permitida...(Somente .jpg ou .png)");
                javascript:history.back();
            </script>
            <?php
            die();
        }

        if($img_prod['size'] > 4194304){
            ?>
            <script>
                alert("Arquivo maior que 4MB...");
                javascript:history.back();
            </script>
            <?php
            die();
        }

        /* Concatenando o novo caminho da imagem. */
        $path_img = $pasta . $novoNomeImg . "." . $extensaoImg;    
        move_uploaded_file($img_prod['tmp_name'], $path_img);

        /* Criando o comando para SQL e executando-o no banco de dados com as informações processadas. */
        $sql_cadastrar = "INSERT INTO `produto`(`nome_prod`,`desc_prod`,`marca`,`path_img`,`categoria`,`preco`) 
        VALUES ('$nome_prod','$desc_prod','$marca','$path_img','$categoria','$preco')";
        mysqli_query($conexao, $sql_cadastrar);
    
    ?>
        <script>
            alert("Produto cadastrado!");
            window.location.replace("lista_prod.php");
        </script>
    <?php
    }else{
        ?>
            <script>
                alert("Produto já existe...");
                javascript:history.back();
            </script>
        <?php
    }
}else{
    ?>
    <script>window.location.replace("index.php")</script>
    <?php
}
/* Fechando a conexão com o banco de dados. */
mysqli_close($conexao);
?>