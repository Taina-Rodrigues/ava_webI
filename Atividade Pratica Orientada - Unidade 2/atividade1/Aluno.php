<?php
declare(strict_types=1);

/**
 * Atividade 1 - Refatoração para Classe
 *
 * Transforma o sistema procedural de classificação acadêmica em uma
 * classe Aluno, aplicando tipagem forte, encapsulamento (propriedades
 * privadas + getters) e um método para cálculo da situação final.
 */
class Aluno
{
    // Constructor property promotion (recurso do PHP 8) + tipagem forte
    public function __construct(
        private string $nome,
        private float $nota
    ) {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getNota(): float
    {
        return $this->nota;
    }

    /**
     * Calcula a situação do aluno com base na nota.
     * Usa match (PHP 8) no lugar de if/elseif encadeado.
     */
    public function calcularSituacao(): string
    {
        return match (true) {
            $this->nota >= 7 => 'Aprovado',
            $this->nota >= 5 => 'Recuperação',
            default => 'Reprovado',
        };
    }
}
