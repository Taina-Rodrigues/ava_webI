<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();

            // Chave estrangeira - uma nota pertence a um usuário
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('titulo');

            // Armazena o texto JÁ CRIPTOGRAFADO (Crypt::encryptString()),
            // por isso precisa ser TEXT: o texto cifrado é bem maior que o original.
            $table->text('conteudo');

            // created_at e updated_at (auditoria de criação/atualização)
            $table->timestamps();

            // deleted_at (auditoria de exclusão - Soft Delete obrigatório)
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};