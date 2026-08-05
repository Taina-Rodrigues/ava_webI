<?php
declare(strict_types=1);

require_once __DIR__ . '/Pessoa.php';
require_once __DIR__ . '/ContatoTrait.php';
require_once __DIR__ . '/Aluno.php';
require_once __DIR__ . '/Professor.php';

$aluno = new Aluno('Ana', 8.5);
$aluno->setEmail('ana@exemplo.com');

$professor = new Professor('José', 'Programação Web');
// Professor "José" não recebeu e-mail de propósito, para mostrar o valor padrão da trait

/** @var Pessoa[] $pessoas */
$pessoas = [$aluno, $professor];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atividade 4 - Classe Abstrata e Trait</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 650px; margin: 40px auto; padding: 0 20px; }
        table { border-collapse: collapse; margin-top: 20px; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 6px 10px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Herança (Pessoa) + Trait (ContatoTrait)</h1>
    <p><code>Aluno</code> e <code>Professor</code> herdam de <code>Pessoa</code> (classe abstrata)
       e ambos usam a mesma <code>ContatoTrait</code> para gerenciar e-mail, sem duplicar código.</p>

    <table>
        <tr><th>Apresentação (método abstrato implementado)</th><th>E-mail (via trait)</th></tr>
        <?php foreach ($pessoas as $pessoa): ?>
            <tr>
                <td><?= htmlspecialchars($pessoa->apresentar()) ?></td>
                <td><?= htmlspecialchars($pessoa->getEmail()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><small>Tente instanciar <code>new Pessoa(...)</code> diretamente: o PHP vai lançar um erro,
       pois classes abstratas não podem ser instanciadas.</small></p>
</body>
</html>
