<?php
/**
 * Atividade 4 - Controle de Acesso com Cookies
 * Armazena o nome do usuário em um cookie por 7 dias e
 * exibe mensagem personalizada nos próximos acessos.
 */

$mensagem = null;

// Se o usuário enviou o formulário, cria o cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');

    if ($nome !== '') {
        // Cookie válido por 7 dias (7 * 24 horas * 60 min * 60 seg)
        setcookie('nome_usuario', $nome, time() + (7 * 24 * 60 * 60), "/");
        // Deixa disponível já nesta mesma requisição
        $_COOKIE['nome_usuario'] = $nome;
    }
}

// Verifica se já existe cookie salvo de uma visita anterior
if (isset($_COOKIE['nome_usuario']) && $_COOKIE['nome_usuario'] !== '') {
    $mensagem = "Bem-vindo(a) de volta, " . htmlspecialchars($_COOKIE['nome_usuario']) . "! Seu acesso foi lembrado por cookie.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 4 - Cookies</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 60px auto; padding: 0 20px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; }
        .mensagem { background: #d1ecf1; color: #0c5460; padding: 12px; border-radius: 6px; margin-top: 20px; }
        a { display: inline-block; margin-top: 20px; margin-right: 15px; }
    </style>
</head>
<body>
    <h1>Controle de Acesso com Cookies</h1>

    <?php if ($mensagem): ?>
        <div class="mensagem"><?= $mensagem ?></div>
    <?php else: ?>
        <p>Ainda não conhecemos você. Informe seu nome para que ele seja lembrado nos próximos acessos (por 7 dias):</p>
    <?php endif; ?>

    <form method="POST">
        <label for="nome">Seu nome:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Salvar</button>
    </form>

    <a href="limpar.php">Esquecer meu nome (apagar cookie)</a><br>
    <a href="../index.php">Voltar ao menu</a>
</body>
</html>
