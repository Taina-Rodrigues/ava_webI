<?php
declare(strict_types=1);

require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Turma.php';

// Monta uma turma de exemplo usando composição (Turma contém vários Aluno)
$turma = new Turma('Web I - Turma A');
$turma->adicionarAluno(new Aluno('Ana', 8.5));
$turma->adicionarAluno(new Aluno('Bruno', 5.5));
$turma->adicionarAluno(new Aluno('Carla', 3.0));
$turma->adicionarAluno(new Aluno('Diego', 9.2));

// Se o usuário enviar o formulário, adiciona mais um aluno "na hora"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $nota = $_POST['nota'] ?? '';

    if ($nome !== '' && is_numeric($nota)) {
        $turma->adicionarAluno(new Aluno($nome, (float) $nota));
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 2 - Gerenciador de Turma</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 650px; margin: 40px auto; padding: 0 20px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; }
        table { border-collapse: collapse; margin-top: 20px; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 6px 10px; text-align: left; }
        th { background: #eee; }
        .media { margin-top: 15px; padding: 12px; border-radius: 6px; background: #d1ecf1; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Turma: <?= htmlspecialchars($turma->getNomeTurma()) ?></h1>
    <p>Total de alunos: <?= $turma->totalAlunos() ?></p>

    <table>
        <tr><th>Nome</th><th>Nota</th><th>Situação</th></tr>
        <?php foreach ($turma->listarAlunos() as $aluno): ?>
            <tr>
                <td><?= htmlspecialchars($aluno->getNome()) ?></td>
                <td><?= $aluno->getNota() ?></td>
                <td><?= $aluno->calcularSituacao() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="media">Média da turma: <?= $turma->calcularMediaTurma() ?></div>

    <h2>Adicionar aluno</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <label for="nota">Nota:</label>
        <input type="text" name="nota" id="nota">

        <button type="submit">Adicionar</button>
    </form>
    <p><small>(O aluno adicionado aparece só nesta requisição, pois não há banco de dados nesta atividade.)</small></p>
</body>
</html>
