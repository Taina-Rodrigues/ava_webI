<?php
declare(strict_types=1);

require_once __DIR__ . '/GeradorRelatorioInterface.php';

class RelatorioHtml implements GeradorRelatorioInterface
{
    public function gerar(array $dadosAlunos): string
    {
        $html = '<table border="1" cellpadding="6" style="border-collapse:collapse;">';
        $html .= '<tr><th>Nome</th><th>Nota</th></tr>';

        foreach ($dadosAlunos as $aluno) {
            $nome = htmlspecialchars($aluno['nome']);
            $nota = number_format($aluno['nota'], 1);
            $html .= "<tr><td>{$nome}</td><td>{$nota}</td></tr>";
        }

        $html .= '</table>';

        return $html;
    }
}
