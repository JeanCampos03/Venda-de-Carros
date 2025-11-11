@extends('dashboard-config')

@section('configs_marcas')
<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="{{ route('index.modelo') }}" class="nav-link">Modelos</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('modelo.cadastro') }}" class="nav-link">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link nav-link--active">Editando...</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">

    <h2 class="content-title">Editar Modelo</h2>


    <form class="profile-form" action="{{ route('modelo.atualizar', $modelo->id) }}" method="POST">
        @csrf


        <div class="form-grid">
            <input type="hidden" name="id" value="{{$modelo->id}}">

            <div class="form-group form-group--inline">
                <label for="url_foto3" class="form-label">Editando Modelo {{$modelo->nome}} (id: {{$modelo->id}})</label>
                <div class="input-inline-group">
                    <input type="text" id="url_foto3" class="input-field" name="nome" value="{{ $modelo->nome }}"
                        placeholder="Coloque o link aqui">
                </div>
            </div>


            <div class="form-group form-group--inline">
                <label for="cor">Nome da Marca</label>
                <select name="marca_id" id="cor" class="input-field">
                    <option value="">Selecione uma Marca</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>
    </form>

</main>
</div>
@endsection