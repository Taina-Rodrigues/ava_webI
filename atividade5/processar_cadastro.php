<?php
/**
 * Atividade 5 - Valida os dados do formulário e guarda na sessão,
 * integrando login + cadastro + validação + exibição.
 */
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$erros = [];

$nome  = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$idade = trim($_POST['idade'] ?? '');

if ($nome === '') {
    $erros[] = "O campo Nome é obrigatório.";
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "Informe um e-mail válido.";
}

if ($idade === '' || !ctype_digit($idade) || (int)$idade <= 0 || (int)$idade > 120) {
    $erros[] = "Informe uma idade válida (número entre 1 e 120).";
}

if (empty($erros)) {
    // Garante que o array de cadastros existe na sessão
    if (!isset($_SESSION['cadastros'])) {
        $_SESSION['cadastros'] = [];
    }

    // Armazena o novo cadastro
    $_SESSION['cadastros'][] = [
        'nome'  => $nome,
        'email' => $email,
        'idade' => (int) $idade,
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 5 - Resultado do Cadastro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        .erro { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 6px; margin-bottom: 8px; }
        .sucesso { background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; }
        a { display: inline-block; margin-top: 20px; margin-right: 15px; }
    </style>
</head>
<body>
    <h1>Resultado do Cadastro</h1>

    <?php if (!empty($erros)): ?>
        <?php foreach ($erros as $e): ?>
            <div class="erro"><?= htmlspecialchars($e) ?></div>
        <?php endforeach; ?>
        <a href="cadastro.php">&larr; Voltar ao formulário</a>
    <?php else: ?>
        <div class="sucesso">Cadastro de <strong><?= htmlspecialchars($nome) ?></strong> realizado com sucesso!</div>
        <a href="dados.php">Ver todos os dados cadastrados</a>
        <a href="cadastro.php">Cadastrar outro</a>
    <?php endif; ?>

    <br>
    <a href="area_restrita.php">Voltar à área restrita</a>
</body>
</html>
