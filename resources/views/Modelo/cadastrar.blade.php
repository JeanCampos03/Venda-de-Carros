@extends('dashboard-config')

@section('configs_marcas')
<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="{{ route('marca.cadastro') }}" class="nav-link">Marca</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('modelo.cadastro') }}" class="nav-link nav-link--active">Modelo</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('cor.cadastro') }}" class="nav-link">Cor</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('delete.password') }}" class="nav-link">Veiculo</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">
    <div class="botao-container">
        <a href="{{ route ('index.modelo')}}" class="btn btn-voltar">Modelos Cadastrados</a>
    </div>
    <h2 class="content-title">Cadastrar Modelo</h2>

    <form class="profile-form" action="{{ route('cadastrar.modelo') }}" method="POST">
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
                <label for="full-name-prefix" class="form-label">Nome Modelo</label>
                <div class="input-inline-group">
                    <input type="text" id="full-name" class="input-field" name="nome">
                </div>

            </div>

            <div class="form-group form-group--inline">
                <label for="full-name-prefix" class="form-label">Nome Marca</label>
                <select id="marca" name="marca_id" class="input-field">
                    <option value="">Selecione uma marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
        </div>
    </form>
</main>
</div>
@endsection