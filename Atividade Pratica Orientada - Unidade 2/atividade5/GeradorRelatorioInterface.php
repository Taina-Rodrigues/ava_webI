<?php
declare(strict_types=1);

/**
 * Atividade 5 - Injeção de Dependência
 *
 * Contrato comum para qualquer forma de gerar relatório.
 * O SistemaAcademico vai depender apenas desta interface,
 * nunca de uma implementação específica.
 */
interface GeradorRelatorioInterface
{
    /**
     * @param array<int, array{nome: string, nota: float}> $dadosAlunos
     */
    public function gerar(array $dadosAlunos): string;
}
