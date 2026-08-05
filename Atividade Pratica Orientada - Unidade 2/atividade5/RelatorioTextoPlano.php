<?php
declare(strict_types=1);

require_once __DIR__ . '/GeradorRelatorioInterface.php';

class RelatorioTextoPlano implements GeradorRelatorioInterface
{
    public function gerar(array $dadosAlunos): string
    {
        $linhas = ["=== Relatório da Turma (texto) ==="];

        foreach ($dadosAlunos as $aluno) {
            $linhas[] = sprintf('%s - nota %.1f', $aluno['nome'], $aluno['nota']);
        }

        return implode("\n", $linhas);
    }
}
