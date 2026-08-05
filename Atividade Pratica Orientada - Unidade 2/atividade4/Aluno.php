<?php
declare(strict_types=1);

require_once __DIR__ . '/Pessoa.php';
require_once __DIR__ . '/ContatoTrait.php';

class Aluno extends Pessoa
{
    use ContatoTrait; // reutiliza setEmail()/getEmail() sem reescrever o código

    public function __construct(
        string $nome,
        private float $nota
    ) {
        parent::__construct($nome);
    }

    public function getNota(): float
    {
        return $this->nota;
    }

    public function calcularSituacao(): string
    {
        return match (true) {
            $this->nota >= 7 => 'Aprovado',
            $this->nota >= 5 => 'Recuperação',
            default => 'Reprovado',
        };
    }

    // Implementação obrigatória do método abstrato da classe Pessoa
    public function apresentar(): string
    {
        return "Aluno(a) {$this->getNome()} - situação: {$this->calcularSituacao()}";
    }
}
