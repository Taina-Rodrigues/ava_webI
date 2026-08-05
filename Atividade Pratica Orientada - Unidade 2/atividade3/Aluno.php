<?php
declare(strict_types=1);

require_once __DIR__ . '/Avaliavel.php';

class Aluno implements Avaliavel
{
    public function __construct(
        private string $nome,
        private float $nota
    ) {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function calcularSituacao(): string
    {
        return match (true) {
            $this->nota >= 7 => 'Aprovado',
            $this->nota >= 5 => 'Recuperação',
            default => 'Reprovado',
        };
    }
}
