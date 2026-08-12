<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minhas Notas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('notes.create') }}"
                   class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    + Nova nota
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($notas->isEmpty())
                    <p class="p-6 text-gray-500">Você ainda não tem nenhuma nota.</p>
                @else
                    <table class="w-full text-left">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">Título</th>
                                <th class="px-6 py-3">Prévia do conteúdo</th>
                                <th class="px-6 py-3">Criada em</th>
                                <th class="px-6 py-3">Última edição</th>
                                <th class="px-6 py-3">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notas as $nota)
                                <tr class="border-t">
                                    <td class="px-6 py-4">{{ $nota->titulo }}</td>
                                    <td class="px-6 py-4 text-gray-500">
                                        {{ \Illuminate\Support\Str::limit($nota->conteudo_descriptografado, 40) }}
                                    </td>
                                    <td class="px-6 py-4">{{ $nota->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4">{{ $nota->updated_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('notes.show', $nota) }}" class="text-gray-700 hover:underline">Ver</a>
                                        <a href="{{ route('notes.edit', $nota) }}" class="text-indigo-600 hover:underline">Editar</a>
                                        <form action="{{ route('notes.destroy', $nota) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Excluir esta nota?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
