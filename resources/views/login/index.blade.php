<x-layout>
    <x-form title="Acesso ao sistema">
        <form method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Entrar</button>
                <a href="{{ route('users.create') }}" class="btn btn-success">Cadastrar-se</a>
            </div>
        </form>
    </x-form>
</x-layout>
