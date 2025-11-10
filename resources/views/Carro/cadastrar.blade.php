@extends('dashboard-config')

@section('configs_marcas')
<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="{{ route('index.veiculo') }}" class="nav-link">Veiculos</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('veiculo.cadastro') }}" class="nav-link nav-link--active">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">Editar</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">
    <h2 class="content-title">Cadastrar Veiculo</h2>
    @if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-grid-wrapper">
        <form method="GET" action="{{ route('veiculo.cadastro') }}">
            <div class="form-group">
                <label for="marca">Marca</label>
                <select name="marca_id" id="marca" class="input-field" onchange="this.form.submit()">
                    <option value="">Selecione uma marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ request('marca_id') == $marca->id ? 'selected' : '' }}>
                        {{ $marca->nome }}
                    </option>
                    @endforeach
                </select>
            </div>
        </form>
        <form class="profile-form" action="{{ route('cadastrar.veiculo') }}" method="POST">
            @csrf

            <input type="hidden" name="marca_id" value="{{ request('marca_id') }}">

            <div class="form-grid-3">
                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <select name="modelo_id" id="modelo" class="input-field"
                        {{ $modelos->isEmpty() ? 'disabled' : '' }}>
                        <option value="">Selecione um modelo</option>
                        @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id }}">{{ $modelo->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cor">Cor</label>
                    <select name="cor_id" id="cor" class="input-field">
                        <option value="">Selecione uma cor</option>
                        @foreach($cores as $cor)
                        <option value="{{ $cor->id }}">{{ $cor->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    </div>

    <div class="form-grid">
        <div class="form-group form-group--inline">
            <label for="full-name-prefix" class="form-label">Ano Fabricação</label>

            <div class="input-inline-group">
                <input type="text" id="full-name" class="input-field" name="ano_fabricacao" maxlength="4"
                    placeholder="Ex. 2022">
            </div>
        </div>

        <div class="form-group form-group--inline">
            <label for="full-name-prefix" class="form-label">Quilometragem Atual</label>

            <div class="input-inline-group">
                <input type="text" id="full-name" class="input-field" name="quilometragem" placeholder="Ex. 45.000">
            </div>
        </div>

        <div class="form-group form-group--inline">
            <label for="full-name-prefix" class="form-label">Valor Total</label>

            <div class="input-inline-group">
                <input type="text" id="full-name" class="input-field" name="valor_total" placeholder="Ex. 85900.00">
            </div>
        </div>
    </div>

    <div class="form-group form-group--inline">
        <label for="detalhes" class="form-label">Detalhes</label>

        <div class="input-inline-group">
            <textarea id="detalhes" name="detalhes" class="input-field" rows="4"
                placeholder="Adicione informações extras..."></textarea>
        </div>
    </div>


    <div class="form-grid">
        <div class="form-group form-group--inline">
            <label for="full-name-prefix" class="form-label">Imagem 1</label>

            <div class="input-inline-group">
                <input type="text" id="full-name" class="input-field" name="url_foto1"
                    placeholder="Coloque o link aqui">
            </div>
        </div>

        <div class="form-group form-group--inline">
            <label for="full-name-prefix" class="form-label">Imagem 2</label>

            <div class="input-inline-group">
                <input type="text" id="full-name" class="input-field" name="url_foto2"
                    placeholder="Coloque o link aqui">
            </div>
        </div>

        <div class="form-group form-group--inline">
            <label for="full-name-prefix" class="form-label">Imagem 3</label>

            <div class="input-inline-group">
                <input type="text" id="full-name" class="input-field" name="url_foto3"
                    placeholder="Coloque o link aqui">
            </div>
        </div>
    </div>

    <div class="form-group">
    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-success">Cadastrar</button>

    </div>



    </form>

</main>
</div>
@endsection