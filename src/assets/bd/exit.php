<?php
/* O programa irá iniciar e destruir a sessão logo em seguida, encerrando o login atual do usuário. */
session_start();

session_destroy();
?>
<script>
    history.back();
</script>