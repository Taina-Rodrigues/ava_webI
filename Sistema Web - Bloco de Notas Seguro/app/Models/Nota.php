<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nota extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * O Laravel usaria "notas" automaticamente pelo nome da classe,
     * mas deixamos explícito por clareza.
     */
    protected $table = 'notas';

    protected $fillable = [
        'titulo',
        'conteudo',
        'user_id',
    ];

    /**
     * IMPORTANTE: propositalmente NÃO usamos o cast 'encrypted' aqui.
     * A criptografia é feita de forma explícita no NoteController, usando
     * Crypt::encryptString() antes de salvar e Crypt::decryptString() ao
     * exibir. Assim o fluxo de criptografia fica visível no controller.
     */

    /**
     * Uma nota pertence a um usuário.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}