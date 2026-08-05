<?php
declare(strict_types=1);

require_once __DIR__ . '/Pessoa.php';
require_once __DIR__ . '/ContatoTrait.php';

class Professor extends Pessoa
{
    use ContatoTrait; // mesma trait reaproveitada aqui, sem duplicar código

    public function __construct(
        string $nome,
        private string $disciplina
    ) {
        parent::__construct($nome);
    }

    public function getDisciplina(): string
    {
        return $this->disciplina;
    }

    // Implementação obrigatória do método abstrato da classe Pessoa
    public function apresentar(): string
    {
        return "Professor(a) {$this->getNome()} - leciona {$this->disciplina}";
    }
}
