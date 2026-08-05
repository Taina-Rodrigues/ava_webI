<?php
declare(strict_types=1);

require_once __DIR__ . '/Avaliavel.php';
require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Professor.php';

// Array com objetos de classes DIFERENTES, mas que compartilham a mesma interface
/** @var Avaliavel[] $itens */
$itens = [
    new Aluno('Ana', 8.5),
    new Professor('José', 9.0),
    new Aluno('Bruno', 4.0),
    new Professor('Marina', 6.5),
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 3 - Interfaces e Polimorfismo</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 650px; margin: 40px auto; padding: 0 20px; }
        table { border-collapse: collapse; margin-top: 20px; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 6px 10px; text-align: left; }
        th { background: #eee; }
        .tipo { font-size: 12px; color: #7f8c8d; }
    </style>
</head>
<body>
    <h1>Polimorfismo com a interface <code>Avaliavel</code></h1>
    <p>O mesmo método <code>calcularSituacao()</code> é chamado para objetos de classes diferentes
       (<code>Aluno</code> e <code>Professor</code>), e cada um responde com sua própria regra.</p>

    <table>
        <tr><th>Nome</th><th>Tipo</th><th>Resultado de calcularSituacao()</th></tr>
        <?php foreach ($itens as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item->getNome()) ?></td>
                <td class="tipo"><?= get_class($item) ?></td>
                <td><?= $item->calcularSituacao() ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
