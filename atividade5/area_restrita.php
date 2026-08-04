<?php
/**
 * Atividade 5 - Área restrita do desafio integrador.
 * Exibe menu com acesso ao cadastro e aos dados já cadastrados na sessão.
 */
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$totalCadastros = isset($_SESSION['cadastros']) ? count($_SESSION['cadastros']) : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 5 - Área Restrita</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 60px auto; padding: 0 20px; }
        .box { background: #d4edda; color: #155724; padding: 20px; border-radius: 8px; }
        ul { padding-left: 20px; }
        a { display: block; margin-top: 12px; padding: 10px 15px; background: #3498db; color: #fff; text-decoration: none; border-radius: 6px; width: fit-content; }
        a:hover { background: #2980b9; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Bem-vindo(a), <?= htmlspecialchars($_SESSION['usuario']) ?>!</h1>
        <p>Você tem <strong><?= $totalCadastros ?></strong> cadastro(s) registrado(s) nesta sessão.</p>
    </div>

    <a href="cadastro.php">Fazer novo cadastro</a>
    <a href="dados.php">Ver dados cadastrados</a>
    <a href="logout.php">Sair (logout)</a>
    <a href="../index.php">Voltar ao menu principal</a>
</body>
</html>
