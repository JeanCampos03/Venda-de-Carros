@extends('dashboard-config')

@section('configs_marcas')

</style>
    <nav class="nav-menu">
        <ul class="nav-list">

            <li class="nav-item"><a href="{{route('index.marca')}}" class="nav-link">Marcas</a></li>
            <li class="nav-item"> <a href="{{route('index.modelo')}}" class="nav-link">Modelos</a></li>
            <li class="nav-item"><a href="{{route('index.cor')}}" class="nav-link">Cores</a></li>
            <li class="nav-item"><a href="{{route('index.veiculo')}}" class="nav-link nav-link--active">Veiculos</a></li>
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
                        <th>Modelo</th>
                        <th>Modelo</th>
                        <th>Cor</th>
                        <th>Ano Fabricação</th>
                        <th>KM</th>
                        <th>Valor</th>
                        <th>Imagens Salvas</th>
                        <th>Detalhes</th>
                        <th>Opções</th>
                       <!-- url_foto	marca_id	modelo_id	cor_id	ano_fabricacao	quilometragem	valor_total	detalhes -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($carros as $carro)
                    <tr>
                        <td>{{ $carro->nome }}</td>
                        <td>
                            <a href="" class="btn btn--primary btn-sm">Editar</a>
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