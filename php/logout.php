<?php
session_start();

// Limpar a sessão e destruí-la
if (isset($_SESSION)) {
    $_SESSION = [];
    session_destroy();
}

// Configurar os cabeçalhos de cache para evitar o carregamento da página do cache
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

header("Location: ../login.html");
exit;
?>
