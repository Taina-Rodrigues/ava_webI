<?php
declare(strict_types=1);

require_once __DIR__ . '/Avaliavel.php';

class Professor implements Avaliavel
{
    public function __construct(
        private string $nome,
        private float $mediaAvaliacaoAlunos // ex: nota que os alunos deram ao professor, de 0 a 10
    ) {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Mesma assinatura de método que a classe Aluno, mas com uma
     * regra de negócio diferente -> isso é polimorfismo.
     */
    public function calcularSituacao(): string
    {
        return match (true) {
            $this->mediaAvaliacaoAlunos >= 8 => 'Desempenho Excelente',
            $this->mediaAvaliacaoAlunos >= 6 => 'Desempenho Satisfatório',
            default => 'Necessita Melhoria',
        };
    }
}
