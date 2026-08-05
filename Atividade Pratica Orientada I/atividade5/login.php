<?php
/**
 * Atividade 5 - Desafio Integrador
 * Login com sessão + cadastro via formulário + validação + exibição de dados.
 * Usuário de teste: admin / Senha de teste: 1234
 */
session_start();

$erro = null;

if (isset($_SESSION['usuario'])) {
    header("Location: area_restrita.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha   = trim($_POST['senha'] ?? '');

    if ($usuario === 'admin' && $senha === '1234') {
        $_SESSION['usuario'] = $usuario;
        header("Location: area_restrita.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 5 - Login</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 60px auto; padding: 0 20px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; }
        .erro { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 6px; margin-top: 15px; }
        .dica { color: #7f8c8d; font-size: 13px; margin-top: 15px; }
        a { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Desafio Integrador - Login</h1>

    <form method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <button type="submit">Entrar</button>
    </form>

    <?php if ($erro): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <p class="dica">Use: usuário <strong>admin</strong> / senha <strong>1234</strong></p>

    <a href="../index.php">&larr; Voltar ao menu</a>
</body>
</html>
