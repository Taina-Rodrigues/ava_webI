<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Nota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h1 class="text-2xl font-bold mb-2">{{ $nota->titulo }}</h1>

                <p class="text-sm text-gray-500 mb-6">
                    Criada em {{ $nota->created_at->format('d/m/Y H:i') }} ·
                    última edição em {{ $nota->updated_at->format('d/m/Y H:i') }}
                </p>

                <div class="prose max-w-none whitespace-pre-line border rounded p-4 bg-gray-50 mb-6">
                    {{ $conteudo }}
                </div>

                <p class="text-xs text-gray-400 mb-6">
                    Este conteúdo foi descriptografado com Crypt::decryptString() apenas para exibição;
                    no banco de dados ele está salvo de forma cifrada.
                </p>

                <a href="{{ route('notes.edit', $nota) }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Editar
                </a>
                <a href="{{ route('notes.index') }}" class="ml-2 text-gray-600">Voltar</a>
            </div>
        </div>
    </div>
</x-app-layout>
