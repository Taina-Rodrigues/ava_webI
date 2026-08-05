<?php
declare(strict_types=1);

require_once __DIR__ . '/Aluno.php';

/**
 * Atividade 2 - Gerenciador de Turma
 *
 * A classe Turma armazena vários objetos Aluno (composição: a Turma
 * "é composta por" Alunos e é responsável pelo ciclo de vida dessa lista).
 */
class Turma
{
    /** @var Aluno[] */
    private array $alunos = [];

    public function __construct(
        private string $nomeTurma
    ) {
    }

    public function adicionarAluno(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    /** @return Aluno[] */
    public function listarAlunos(): array
    {
        return $this->alunos;
    }

    public function getNomeTurma(): string
    {
        return $this->nomeTurma;
    }

    public function totalAlunos(): int
    {
        return count($this->alunos);
    }

    public function calcularMediaTurma(): float
    {
        if (empty($this->alunos)) {
            return 0.0;
        }

        $soma = array_sum(array_map(
            fn (Aluno $aluno): float => $aluno->getNota(),
            $this->alunos
        ));

        return round($soma / count($this->alunos), 2);
    }
}
