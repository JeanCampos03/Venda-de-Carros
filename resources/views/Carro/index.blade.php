@extends('dashboard-config')

@section('configs_marcas')

</style>
<nav class="nav-menu">
    <ul class="nav-list">

        <li class="nav-item"><a href="{{route('index.veiculo')}}" class="nav-link nav-link--active">Veiculos</a></li>
        <li class="nav-item"> <a href="{{route('veiculo.cadastro')}}" class="nav-link">Cadastrar</a></li>
    </ul>
</nav>
</aside>

<!-- Conteúdo principal -->
<main class="content-main">
    <h1 class="content-title">Lista de Marcas Cadastradas</h1>

    <!-- Tabela estilizada -->
    <div class="table-container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cor</th>
                    <th>Ano Fabricação</th>
                    <th>KM </th>
                    <th>Valor</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carros as $carro)
                <tr>
                    <td>{{ $carro->marca->nome}}</td>
                    <td>{{ $carro->modelo->nome}}</td>
                    <td>{{ $carro->cor->nome }}</td>
                    <td>{{ $carro->ano_fabricacao}}</td>
                    <td>{{ $carro->quilometragem}}</td>
                    <td>{{ $carro->valor_total}}</td>
                    <td>
                        <a href="{{route ('veiculo.buscar', $carro->id)}}" class="btn btn--primary btn-sm">Editar</a>
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn--upload btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
</div>
@endsection