<?php
declare(strict_types=1);

/**
 * Atividade 4 - Trait
 *
 * Trait: bloco de código reutilizável que pode ser "misturado" (use)
 * em várias classes sem precisar de herança. Aqui, tanto Aluno quanto
 * Professor precisam guardar um e-mail de contato - em vez de repetir
 * o código nas duas classes, colocamos numa trait.
 */
trait ContatoTrait
{
    private string $email = '';

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email !== '' ? $this->email : '(sem e-mail cadastrado)';
    }
}
