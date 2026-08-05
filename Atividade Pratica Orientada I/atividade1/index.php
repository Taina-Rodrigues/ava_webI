<?php
/**
 * Atividade 1 - Sistema de Classificação Acadêmica
 * Recebe uma nota e informa a situação do aluno.
 * Usa: estrutura condicional, repetição (loop) e função.
 */

// Função que classifica a nota do aluno
function classificarAluno($nota)
{
    if ($nota >= 7) {
        return "Aprovado";
    } elseif ($nota >= 5) {
        return "Recuperação";
    } else {
        return "Reprovado";
    }
}

$resultado = null;
$notaInformada = null;
$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notaInformada = $_POST['nota'] ?? '';

    if ($notaInformada === '' || !is_numeric($notaInformada)) {
        $erro = "Por favor, informe uma nota válida (número entre 0 e 10).";
    } else {
        $notaInformada = (float) $notaInformada;

        if ($notaInformada < 0 || $notaInformada > 10) {
            $erro = "A nota deve estar entre 0 e 10.";
        } else {
            $resultado = classificarAluno($notaInformada);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 1 - Classificação Acadêmica</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        input, button { padding: 8px; font-size: 15px; }
        .resultado { margin-top: 15px; padding: 12px; border-radius: 6px; font-weight: bold; }
        .Aprovado { background: #d4edda; color: #155724; }
        .Recuperação { background: #fff3cd; color: #856404; }
        .Reprovado { background: #f8d7da; color: #721c24; }
        .erro { color: #c0392b; margin-top: 10px; }
        table { border-collapse: collapse; margin-top: 25px; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 6px 10px; text-align: center; }
        th { background: #eee; }
        a { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Sistema de Classificação Acadêmica</h1>

    <form method="POST">
        <label for="nota">Digite a nota do aluno (0 a 10):</label><br>
        <input type="text" name="nota" id="nota" value="<?= htmlspecialchars($notaInformada ?? '') ?>">
        <button type="submit">Verificar</button>
    </form>

    <?php if ($erro): ?>
        <p class="erro"><?= $erro ?></p>
    <?php endif; ?>

    <?php if ($resultado): ?>
        <div class="resultado <?= $resultado ?>">
            Nota <?= $notaInformada ?> -> Situação: <?= $resultado ?>
        </div>
    <?php endif; ?>

    <h2>Tabela de referência (gerada com laço de repetição)</h2>
    <table>
        <tr><th>Nota</th><th>Situação</th></tr>
        <?php
        // Estrutura de repetição percorrendo notas de 0 a 10
        for ($i = 0; $i <= 10; $i++) {
            echo "<tr><td>{$i}</td><td>" . classificarAluno($i) . "</td></tr>";
        }
        ?>
    </table>

    <a href="../index.php">&larr; Voltar ao menu</a>
</body>
</html>
