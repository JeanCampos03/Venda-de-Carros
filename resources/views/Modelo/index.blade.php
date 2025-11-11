@extends('dashboard-config')

@section('configs_modelos')

</style>
    <nav class="nav-menu">
        <ul class="nav-list">

            <li class="nav-item"><a href="{{route('index.modelo')}}" class="nav-link nav-link--active">Modelos</a></li>
            <li class="nav-item"> <a href="{{route('modelo.cadastro')}}" class="nav-link">Cadastrar</a></li>
            </ul>
    </nav>
</aside>

    <!-- Conteúdo principal -->
    <main class="content-main">
        <h1 class="content-title">Lista de Modelos Cadastradas</h1>

        <!-- Tabela estilizada -->
        <div class="table-container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modelos as $modelo)
                    <tr>
                        <td>{{ $modelo->nome }}</td>
                        <td>{{ $modelo->marca->nome }}</td>
                        <td>
                            <a href="{{ route ('modelo.buscar', $modelo->id)}}" class="btn btn--primary btn-sm">Editar</a>
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