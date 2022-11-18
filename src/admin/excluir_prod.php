<?php
session_start();

//Conexão com o banco
require("../assets/bd/connect.php");

/* Se uma sessão estiver ativa, o programa verificará se o usuário é admin.
Caso contrário o usuário será levado de volta à tela inicial ou levará o usuário para a tela de login caso ele não esteja logado. */
if(isset($_SESSION['nome'])){
    if ($_SESSION['verif_admin'] == 0) {
        ?>
        <script>
        alert("Você não deveria estar aqui...");
        window.location.replace("../index/index.php");
        </script>
        <?php
        die();
    }
}

/* Caso haja uma informação de qual produto excluir, o programa executará a exclusão. */
if(isset($_GET['id_prod'])){

    $id = $_GET['id_prod'];

    /* Procurando registros com o código de produto fornecido. */
    $pesquisar_prod = "SELECT * FROM `produto` WHERE `cod_prod` = '$id'";
    $resultado_prod = mysqli_query($conexao, $pesquisar_prod);
    $numero_resultado = mysqli_num_rows($resultado_prod);

    /* Se não houver produtos com o código, o programa será finalizado. Caso contrário a exclusão será continuada. */
    if($numero_resultado == 0)
    {
        ?>
        <script>
            alert("Este produto não foi encontrado...");
            javascript:history.back;
        </script>
        <?php
    }else{
        /* Criando o comando e executando-o no banco de dados. */
        $excluir_prod = "DELETE FROM `produto` WHERE `cod_prod` = '$id'";
        mysqli_query($conexao, $excluir_prod);
        
        ?>
        <script>
            alert("Produto excluído!");
            window.location.replace("lista_prod.php");
        </script>
        <?php
    }
    mysqli_close($conexao);
}
?>