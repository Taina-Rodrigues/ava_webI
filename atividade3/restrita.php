<?php
/**
 * Atividade 3 - Área restrita.
 * Só pode ser acessada se houver uma sessão de usuário ativa.
 */
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 3 - Área Restrita</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 60px auto; padding: 0 20px; }
        .box { background: #d4edda; color: #155724; padding: 20px; border-radius: 8px; }
        a { display: inline-block; margin-top: 20px; margin-right: 15px; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Área Restrita</h1>
        <p>Bem-vindo(a), <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>!</p>
        <p>Você está vendo esta página porque fez login com sucesso.</p>
    </div>

    <a href="logout.php">Sair (logout)</a>
    <a href="../index.php">Voltar ao menu</a>
</body>
</html>
