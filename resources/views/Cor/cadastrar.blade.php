@extends('dashboard-config')

@section('configs_marcas')
<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="{{ route('marca.cadastro') }}" class="nav-link">Marca</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('modelo.cadastro') }}" class="nav-link">Modelo</a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link nav-link--active">Cor</a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">Veiculo</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">
    <div class="botao-container">
        <a href="{{ route ('index.cor')}}" class="btn btn-voltar">Cores Cadastradas</a>
    </div>
    <h2 class="content-title">Cadastrar Cor</h2>

    <form class="profile-form" action="{{ route('cadastrar.cor') }}" method="POST">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-grid">

            <div class="form-group form-group--inline">
                <label for="full-name-prefix" class="form-label">Nome Cor</label>

                <div class="input-inline-group">
                    <input type="text" id="full-name" class="input-field" name="nome">
                </div>
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-success">Cadastrar</button>

            </div>

        </div>
    </form>

</main>
</div>
@endsection