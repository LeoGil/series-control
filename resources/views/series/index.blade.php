<x-layout title="Séries" :mensagemSucesso="$mensagemSucesso">
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}">{{ $serie->name }}</a>
                <div class="float-end d-flex gap-2">
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>