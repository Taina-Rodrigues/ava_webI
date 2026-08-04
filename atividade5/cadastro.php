<?php
/**
 * Atividade 5 - Formulário de cadastro, protegido por sessão.
 * Os dados válidos são enviados para processar_cadastro.php
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
    <title>Atividade 5 - Cadastro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; }
        a { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Novo Cadastro</h1>
    <p>Logado como: <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong></p>

    <form method="POST" action="processar_cadastro.php">
        <label for="nome">Nome completo:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email" required>

        <label for="idade">Idade:</label>
        <input type="text" name="idade" id="idade" required>

        <button type="submit">Cadastrar</button>
    </form>

    <a href="area_restrita.php">&larr; Voltar à área restrita</a>
</body>
</html>
