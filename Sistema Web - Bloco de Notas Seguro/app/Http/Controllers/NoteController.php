<?php

namespace App\Policies;

use App\Models\Nota;
use App\Models\User;

class NotaPolicy
{
    /**
     * Usado ao visualizar (show) uma nota individual.
     */
    public function view(User $user, Nota $nota): bool
    {
        return $user->id === $nota->user_id;
    }

    /**
     * Usado ao abrir o formulário de edição e ao salvar a atualização.
     */
    public function update(User $user, Nota $nota): bool
    {
        return $user->id === $nota->user_id;
    }

    /**
     * Usado ao excluir (soft delete) a nota.
     */
    public function delete(User $user, Nota $nota): bool
    {
        return $user->id === $nota->user_id;
    }
}