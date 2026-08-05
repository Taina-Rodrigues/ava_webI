<?php
/**
 * Atividade 2 - Recebe os dados do formulário via POST,
 * valida os campos e exibe os dados organizadamente.
 */

$erros = [];

// Recupera os dados enviados
$nome   = trim($_POST['nome'] ?? '');
$email  = trim($_POST['email'] ?? '');
$idade  = trim($_POST['idade'] ?? '');
$cidade = trim($_POST['cidade'] ?? '');

// Validações
if ($nome === '') {
    $erros[] = "O campo Nome é obrigatório.";
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "Informe um e-mail válido.";
}

if ($idade === '' || !ctype_digit($idade) || (int)$idade <= 0 || (int)$idade > 120) {
    $erros[] = "Informe uma idade válida (número entre 1 e 120).";
}

if ($cidade === '') {
    $erros[] = "O campo Cidade é obrigatório.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 2 - Resultado do Cadastro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        .erro { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 6px; margin-bottom: 8px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background: #eee; width: 30%; }
        a { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Resultado do Cadastro</h1>

    <?php if (!empty($erros)): ?>
        <h2>Corrija os seguintes erros:</h2>
        <?php foreach ($erros as $e): ?>
            <div class="erro"><?= htmlspecialchars($e) ?></div>
        <?php endforeach; ?>
        <a href="cadastro.php">&larr; Voltar ao formulário</a>
    <?php else: ?>
        <h2>Cadastro realizado com sucesso!</h2>
        <table>
            <tr><th>Nome</th><td><?= htmlspecialchars($nome) ?></td></tr>
            <tr><th>E-mail</th><td><?= htmlspecialchars($email) ?></td></tr>
            <tr><th>Idade</th><td><?= htmlspecialchars($idade) ?></td></tr>
            <tr><th>Cidade</th><td><?= htmlspecialchars($cidade) ?></td></tr>
        </table>
        <a href="cadastro.php">&larr; Cadastrar outro</a>
    <?php endif; ?>

    <br>
    <a href="../index.php">Voltar ao menu principal</a>
</body>
</html>
