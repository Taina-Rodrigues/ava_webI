<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class NoteController extends Controller
{
    /**
     * Lista apenas as notas do usuário autenticado.
     * O conteúdo é descriptografado aqui para exibir um resumo na listagem.
     */
    public function index(): View
    {
        $notas = Nota::where('user_id', auth()->id())
            ->latest('updated_at')
            ->get()
            ->map(function (Nota $nota) {
                $nota->conteudo_descriptografado = $this->descriptografar($nota->conteudo);
                return $nota;
            });

        return view('notes.index', ['notas' => $notas]);
    }

    public function create(): View
    {
        return view('notes.create');
    }

    /**
     * Cria a nota já associada ao usuário logado.
     * O conteúdo é criptografado ANTES de ser salvo no banco.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'titulo'   => ['required', 'string', 'max:255'],
            'conteudo' => ['required', 'string'],
        ]);

        auth()->user()->notas()->create([
            'titulo'   => $validated['titulo'],
            // Criptografia manual, conforme exigido no enunciado
            'conteudo' => Crypt::encryptString($validated['conteudo']),
        ]);

        return redirect()
            ->route('notes.index')
            ->with('status', 'Nota criada com sucesso.');
    }

    /**
     * Visualização individual da nota, com o conteúdo já descriptografado.
     */
    public function show(Nota $nota): View
    {
        $this->authorize('view', $nota);

        $conteudo = $this->descriptografar($nota->conteudo);

        return view('notes.show', compact('nota', 'conteudo'));
    }

    public function edit(Nota $nota): View
    {
        $this->authorize('update', $nota);

        $conteudo = $this->descriptografar($nota->conteudo);

        return view('notes.edit', compact('nota', 'conteudo'));
    }

    public function update(Request $request, Nota $nota): RedirectResponse
    {
        $this->authorize('update', $nota);

        $validated = $request->validate([
            'titulo'   => ['required', 'string', 'max:255'],
            'conteudo' => ['required', 'string'],
        ]);

        // updated_at é atualizado automaticamente pelo Eloquent
        $nota->update([
            'titulo'   => $validated['titulo'],
            'conteudo' => Crypt::encryptString($validated['conteudo']),
        ]);

        return redirect()
            ->route('notes.index')
            ->with('status', 'Nota atualizada com sucesso.');
    }

    public function destroy(Nota $nota): RedirectResponse
    {
        $this->authorize('delete', $nota);

        // Soft delete: define deleted_at em vez de apagar a linha do banco
        $nota->delete();

        return redirect()
            ->route('notes.index')
            ->with('status', 'Nota excluída com sucesso.');
    }

    /**
     * Descriptografa o conteúdo com segurança, tratando o caso de
     * dados corrompidos ou chave incorreta (Crypt::decryptString()
     * lança DecryptException nesses casos).
     */
    private function descriptografar(string $conteudoCriptografado): string
    {
        try {
            return Crypt::decryptString($conteudoCriptografado);
        } catch (DecryptException $e) {
            return '[Não foi possível descriptografar este conteúdo]';
        }
    }
}