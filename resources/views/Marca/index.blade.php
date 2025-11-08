@extends('dashboard-config')

@section('configs_marcas')

</style>
    <nav class="nav-menu">
        <ul class="nav-list">

            <li class="nav-item"><a href="{{route('index.marca')}}" class="nav-link nav-link--active">Marcas</a></li>
            <li class="nav-item"> <a href="{{route('index.modelo')}}" class="nav-link">Modelos</a></li>
            <li class="nav-item"><a href="{{route('index.cor')}}" class="nav-link">Cores</a></li>
            <li class="nav-item"><a href="" class="nav-link">Veiculos</a></li>
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
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id }}</td>
                        <td>{{ $marca->nome }}</td>
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