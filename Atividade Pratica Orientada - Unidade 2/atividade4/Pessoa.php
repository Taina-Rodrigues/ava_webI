<?php
declare(strict_types=1);

/**
 * Atividade 4 - Classe Abstrata e Trait
 *
 * Classe abstrata: não pode ser instanciada diretamente, serve como
 * base comum para Aluno e Professor (herança).
 */
abstract class Pessoa
{
    public function __construct(
        protected string $nome
    ) {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Método abstrato: cada subclasse é obrigada a implementar
     * sua própria versão de apresentar().
     */
    abstract public function apresentar(): string;
}
