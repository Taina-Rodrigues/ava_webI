<?php
declare(strict_types=1);

require_once __DIR__ . '/GeradorRelatorioInterface.php';
require_once __DIR__ . '/RelatorioTextoPlano.php';
require_once __DIR__ . '/RelatorioHtml.php';
require_once __DIR__ . '/SistemaAcademico.php';

$alunos = [
    ['nome' => 'Ana', 'nota' => 8.5],
    ['nome' => 'Bruno', 'nota' => 5.5],
    ['nome' => 'Carla', 'nota' => 3.0],
];

// Escolhe o formato do relatório com base no que o usuário selecionar
$formato = $_GET['formato'] ?? 'html';

// Aqui acontece a injeção: escolhemos QUAL implementação passar para o SistemaAcademico,
// mas a classe SistemaAcademico continua exatamente a mesma nos dois casos.
$gerador = $formato === 'texto' ? new RelatorioTextoPlano() : new RelatorioHtml();
$sistema = new SistemaAcademico($gerador);

$relatorio = $sistema->gerarRelatorio($alunos);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 5 - Injeção de Dependência</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 650px; margin: 40px auto; padding: 0 20px; }
        a.btn { display: inline-block; margin-right: 10px; padding: 8px 16px; background: #3498db; color: #fff; text-decoration: none; border-radius: 6px; }
        a.ativo { background: #2c3e50; }
        pre { background: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 6px; white-space: pre-wrap; }
    </style>
</head>
<body>
    <h1>Sistema Acadêmico - Relatórios (Injeção de Dependência)</h1>
    <p><code>SistemaAcademico</code> recebe um <code>GeradorRelatorioInterface</code> no construtor.
       Trocamos a implementação sem alterar a classe do sistema:</p>

    <a class="btn <?= $formato === 'html' ? 'ativo' : '' ?>" href="?formato=html">Relatório em HTML</a>
    <a class="btn <?= $formato === 'texto' ? 'ativo' : '' ?>" href="?formato=texto">Relatório em Texto</a>

    <h2>Resultado (formato: <?= htmlspecialchars($formato) ?>)</h2>

    <?php if ($formato === 'texto'): ?>
        <pre><?= htmlspecialchars($relatorio) ?></pre>
    <?php else: ?>
        <?= $relatorio /* já vem com htmlspecialchars aplicado internamente na classe */ ?>
    <?php endif; ?>
</body>
</html>
