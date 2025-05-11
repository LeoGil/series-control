<form action="{{ $action }}" method="POST">
    <div class="mb-3">
        @csrf
        @isset($method) @method($method) @endisset
        <label for="name" class="form-label">Nome</label>
        <input 
            type="text"
            name="name"
            id="name"
            placeholder="Nome da série"
            class="form-control"
            @isset($series->name) value="{{ $series->name }}" @endisset
            required
        />
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>