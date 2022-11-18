<!-- Upload do produto alterado/atualizado no edit_prod.php -->

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
}

if($_POST['a_categoria'] == "Selecione..."){
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
if(isset($_POST['id_prod'])){
    require("../assets/bd/connect.php");

    $id = $_POST['id_prod'];
    $nome_prod = $_POST['a_nome_prod'];
    $desc_prod = $_POST['a_desc_prod'];
    $marca = $_POST['a_marca'];
    $categoria = $_POST['a_categoria'];
    $preco = $_POST['a_preco'];

    $pesquisar_a_prod = "UPDATE `produto` SET `nome_prod` = '$nome_prod',`desc_prod` = '$desc_prod',
    `marca` = '$marca',`categoria` = '$categoria',`preco` = '$preco' WHERE `cod_prod` = '$id'";
    mysqli_query($conexao, $pesquisar_a_prod);

    if(isset($_FILES['a_img'])){
        /* Declaração da variável da imagem */
        $img_prod = $_FILES['a_img'];
        $id = $_POST['id_prod'];

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

        /* O programa irá requisitar o caminho da imagem no banco de dados, e então irá apagar ela do servidor. */
        $pesquisar_v_img = "SELECT `path_img` FROM `produto` WHERE `cod_prod` = '$id'";
        $resultado_v_img = mysqli_query($conexao, $pesquisar_v_img);
        $img = mysqli_fetch_array($resultado_v_img);
        unlink($img[0]);

        /* O programa irá setar o novo caminho e irá mover a imagem dos arquivos temporários ao servidor, 
        depois irá enviar o novo caminho do arquivo para o registro no banco de dados. */
        $path_img = $pasta . $novoNomeImg . "." . $extensaoImg;
        move_uploaded_file($img_prod['tmp_name'], $path_img);
        $sql_atualizar_img = "UPDATE `produto` SET `path_img` = '$path_img' WHERE `cod_prod` = '$id'";
        mysqli_query($conexao, $sql_atualizar_img);
    }
    ?>
    <script>
        alert("Produto atualizado!");
        window.location.replace("lista_prod.php");
    </script>
    <?php
    /* Fechando a conexão com o banco de dados. */
    mysqli_close($conexao);
}
?>