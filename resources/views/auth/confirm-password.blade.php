@extends('profile.index')

@section('form_delete_user')

<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">

            <a href="{{ route('perfil.edit') }}" class="nav-link">Perfil</a>
        </li>
        <li class="nav-item">

            <a href="{{ route('password.confirm') }}" class="nav-link nav-link--active">Alterar Senha</a>
        </li>
        <li class="nav-item">

            <a href="{{ route('delete.password') }}" class="nav-link">Deletar Conta</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">
    <h2 class="content-title">Alteraçao de Senha</h2>

    <form class="profile-form" action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('put')
        @if (session('status') === 'password-updated')
        <div class="alert alert-success">
            Senha atualizada com sucesso!
        </div>
        @endif

        <div class="form-grid">

            <div class="form-group form-group--inline">
                <label class="form-label">Senha Atual</label>
                <div class="input-inline-group">
                    <input type="password" name="current_password" id="current-passwd" class="input-field"
                        placeholder="********">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Nova Senha</label>
                <input type="password" id="new-passwd" class="input-field" name="password" placeholder="********">
            </div>

            <div class="form-group">
                <label class="form-label">Confirme a Nova Senha</label>
                <input type="password" id="new-passwd-confirmation" class="input-field" name="password_confirmation"
                    placeholder="********">
            </div>

            <div class="form-group">
            </div>

            <div class="form-group">

                <button type="submit" class="btn btn-success">Salvar Mudanças</button>
            </div>
        </div>
    </form>
</main>
</div>
@endsection