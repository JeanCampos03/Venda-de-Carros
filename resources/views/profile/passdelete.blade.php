@extends('profile.index')

@section('form_change_passwd')

<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">

            <a href="{{ route('perfil.edit') }}" class="nav-link">Perfil</a>
        </li>
        <li class="nav-item">

            <a href="{{ route('password.confirm') }}" class="nav-link">Alterar Senha</a>
        </li>
        <li class="nav-item">

            <a href="{{ route('delete.password') }}" class="nav-link nav-link--active">Deletar Conta</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">
    <h2 class="content-title">Configurações do Perfil</h2>

    <form class="profile-form" action="{{ route('perfil.destroy') }}" method="POST">
        @csrf
        @method('delete')

        <div class="form-grid">

            <div class="form-group form-group--inline">
                <label for="full-name-prefix" class="form-label">Digite sua senha para confirmar a exclusão da
                    conta:</label>
                <div class="input-inline-group">
                    <input type="password" id="full-name" class="input-field" placeholder="Digite sua senha..."
                        name="password">
                </div>
            </div>

            <label for="password" class="form-label fw-semibold">

            </label>

            <div class="form-group"></div>

            <div class="form-group">
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não poderá ser desfeita.')">Excluir
                    Conta</button>
            </div>
        </div>
    </form>
</main>
</div>
@endsection