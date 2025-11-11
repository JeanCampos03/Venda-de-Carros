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
                    <th>Ano</th>
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
                        <a href="{{ route('veiculo.buscar', $carro->id) }}" class="btn btn-sm edit-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg>

                            <a href="{{ route('veiculo.excluir', $carro->id) }}" class="btn btn-sm delete-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg>

                            </a>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
</div>
@endsection