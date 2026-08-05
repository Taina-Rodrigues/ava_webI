<?php
declare(strict_types=1);

require_once __DIR__ . '/Aluno.php';

$erro = null;
$aluno = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeInformado = trim($_POST['nome'] ?? '');
    $notaInformada = $_POST['nota'] ?? '';

    if ($nomeInformado === '' || $notaInformada === '' || !is_numeric($notaInformada)) {
        $erro = "Informe um nome e uma nota válida (0 a 10).";
    } else {
        $aluno = new Aluno($nomeInformado, (float) $notaInformada);
    }
}

// Lista de exemplo para demonstrar a classe funcionando com vários objetos
$exemplos = [
    new Aluno('Ana', 8.5),
    new Aluno('Bruno', 5.5),
    new Aluno('Carla', 3.0),
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 1 - Classe Aluno</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; }
        .resultado { margin-top: 15px; padding: 12px; border-radius: 6px; font-weight: bold; background: #d1ecf1; }
        .erro { color: #c0392b; margin-top: 10px; }
        table { border-collapse: collapse; margin-top: 20px; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 6px 10px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>POO - Classe Aluno</h1>

    <form method="POST">
        <label for="nome">Nome do aluno:</label>
        <input type="text" name="nome" id="nome">

        <label for="nota">Nota (0 a 10):</label>
        <input type="text" name="nota" id="nota">

        <button type="submit">Calcular situação</button>
    </form>

    <?php if ($erro): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <?php if ($aluno): ?>
        <div class="resultado">
            <?= htmlspecialchars($aluno->getNome()) ?> (nota <?= $aluno->getNota() ?>) -> <?= $aluno->calcularSituacao() ?>
        </div>
    <?php endif; ?>

    <h2>Exemplos (objetos criados no código)</h2>
    <table>
        <tr><th>Nome</th><th>Nota</th><th>Situação</th></tr>
        <?php foreach ($exemplos as $ex): ?>
            <tr>
                <td><?= htmlspecialchars($ex->getNome()) ?></td>
                <td><?= $ex->getNota() ?></td>
                <td><?= $ex->calcularSituacao() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
