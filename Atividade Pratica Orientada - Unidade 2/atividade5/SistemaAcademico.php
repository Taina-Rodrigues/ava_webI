<?php
declare(strict_types=1);

require_once __DIR__ . '/GeradorRelatorioInterface.php';

/**
 * Atividade 5 - Injeção de Dependência
 *
 * O SistemaAcademico NÃO decide qual gerador de relatório usar.
 * Ele recebe (via construtor) qualquer objeto que implemente
 * GeradorRelatorioInterface. Isso separa responsabilidades:
 * - SistemaAcademico: sabe organizar os dados dos alunos
 * - GeradorRelatorioInterface (implementações): sabe formatar a saída
 *
 * Vantagem: podemos trocar o formato do relatório (texto, HTML, PDF, etc.)
 * sem alterar uma linha sequer desta classe.
 */
class SistemaAcademico
{
    public function __construct(
        private GeradorRelatorioInterface $gerador // dependência injetada
    ) {
    }

    /**
     * @param array<int, array{nome: string, nota: float}> $alunos
     */
    public function gerarRelatorio(array $alunos): string
    {
        return $this->gerador->gerar($alunos);
    }
}
