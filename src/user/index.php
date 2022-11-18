<?php
session_start(); 

/* Irá verificar se há uma sessão em funcionamento e irá decidir se é um admin ou não, redirecionando
 para a página de admin ou para o carrinho. */
if (isset($_SESSION['nome'])) {
  if ($_SESSION['verif_admin'] == 1) {
?>
    <script>
      alert("Redirecionando para a página de admin!");
      window.location.replace("../admin/index.php");
    </script>
  <?php
  } else {
  ?>
    <script>
      window.location.replace("../carrinho/carrinho.php");
    </script>
<?php
  }
} else {
  ?>
  <script>
    window.location.replace("../index/index.php");
  </script> 
  <?php 
}
?>