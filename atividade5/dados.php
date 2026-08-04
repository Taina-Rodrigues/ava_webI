<?php
/**
 * Atividade 5 - Exibe, de forma organizada, todos os cadastros
 * armazenados na sessão do usuário logado.
 */
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$cadastros = $_SESSION['cadastros'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 5 - Dados Cadastrados</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 650px; margin: 40px auto; padding: 0 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background: #eee; }
        a { display: inline-block; margin-top: 20px; margin-right: 15px; }
        p.vazio { color: #7f8c8d; }
    </style>
</head>
<body>
    <h1>Dados Cadastrados</h1>

    <?php if (empty($cadastros)): ?>
        <p class="vazio">Nenhum cadastro realizado ainda nesta sessão.</p>
    <?php else: ?>
        <table>
            <tr><th>#</th><th>Nome</th><th>E-mail</th><th>Idade</th></tr>
            <?php foreach ($cadastros as $i => $c): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($c['nome']) ?></td>
                    <td><?= htmlspecialchars($c['email']) ?></td>
                    <td><?= htmlspecialchars($c['idade']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <a href="cadastro.php">Novo cadastro</a>
    <a href="area_restrita.php">Voltar à área restrita</a>
</body>
</html>
