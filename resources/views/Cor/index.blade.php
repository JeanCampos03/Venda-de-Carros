@extends('dashboard-config')

@section('configs_cores')

</style>
<nav class="nav-menu">
    <ul class="nav-list">

        <li class="nav-item"><a href="{{route('index.cor')}}" class="nav-link nav-link--active">Cores</a></li>
        <li class="nav-item"> <a href="{{route('cor.cadastro')}}" class="nav-link">Cadastrar</a></li>
        
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
                    <th>Cor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cores as $cor)
                <tr>
                    <td>{{ $cor->nome }}</td>
                    <td>
                        <a href="{{ route ('cor.buscar', $cor->id )}}" class="btn btn--primary btn-sm">Editar</a>
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