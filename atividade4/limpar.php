<?php
/**
 * Atividade 4 - Apaga o cookie do usuário (define expiração no passado)
 */
setcookie('nome_usuario', '', time() - 3600, "/");
header("Location: cookie.php");
exit;
