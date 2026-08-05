<?php
/**
 * Atividade 3 - Encerra a sessão do usuário (logout)
 */
session_start();
session_unset();
session_destroy();

header("Location: login.php");
exit;
