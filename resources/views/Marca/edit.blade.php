@extends('dashboard-config')

@section('configs_marcas')
<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="{{ route('index.marca') }}" class="nav-link">Marcas</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('marca.cadastro') }}" class="nav-link">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link nav-link--active">Editando...</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">

    <h2 class="content-title">Editar Marca</h2>


    <form class="profile-form" action="{{ route('marca.atualizar', $marca->id) }}" method="POST">
        @csrf


        <div class="form-grid">
            <input type="hidden" name="id" value="{{$marca->id}}">

            <div class="form-group form-group--inline">
                <label for="url_foto3" class="form-label">Editando marca {{$marca->nome}} (id: {{$marca->id}})</label>
                <div class="input-inline-group">
                    <input type="text" id="url_foto3" class="input-field" name="nome" value="{{ $marca->nome }}"
                        placeholder="Coloque o link aqui">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </div>
    </form>

</main>
</div>
@endsection