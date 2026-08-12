<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nova Nota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('notes.store') }}">
                    @csrf

                    <label class="block font-medium mb-1" for="titulo">Título</label>
                    <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"
                           class="w-full border rounded p-2 mb-4">

                    <label class="block font-medium mb-1" for="conteudo">Conteúdo</label>
                    <textarea name="conteudo" id="conteudo" rows="8"
                              class="w-full border rounded p-2 mb-4">{{ old('conteudo') }}</textarea>

                    <p class="text-sm text-gray-500 mb-4">
                        O conteúdo será criptografado (Crypt::encryptString) antes de ser salvo no banco de dados.
                    </p>

                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        Salvar
                    </button>
                    <a href="{{ route('notes.index') }}" class="ml-2 text-gray-600">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
