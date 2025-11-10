@extends('profile.index')

@section('form_change_user')

<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">

            <a href="{{ route('perfil.edit') }}" class="nav-link nav-link--active">Perfil</a>
        </li>
        <li class="nav-item">

            <a href="{{ route('password.confirm') }}" class="nav-link">Alterar Senha</a>
        </li>
        <li class="nav-item">

            <a href="{{ route('delete.password') }}" class="nav-link">Deletar Conta</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">
    <h2 class="content-title">Dados do Perfil</h2>

    <form class="profile-form" action="{{ route('perfil.update') }}" method="POST">
        @csrf
        @method('patch')

        <div class="form-grid">

            <div class="form-group form-group--inline">
                <label for="full-name-prefix" class="form-label">Nome Completo</label>
                <div class="input-inline-group">
                    <input name='name'type="text" id="full-name" class="input-field" value="{{ Auth::user()->name }}">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" id="email" class="input-field" value="{{ Auth::user()->email }}">
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