@extends("index")

@section("conteudo_carro")

<h2 class="mt-4 mb-4">Cadastrar Novo Carro</h2>

<div class="container">
    <form action="" method="post" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" placeholder="Ex: Toyota">
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Ex: Corolla">
        </div>

        <div class="mb-3">
            <label for="cor" class="form-label">Cor</label>
            <input type="text" name="cor" id="cor" class="form-control" placeholder="Ex: Prata">
        </div>

        <div class="mb-3">
            <label for="ano_fabricacao" class="form-label">Ano de Fabricação</label>
            <input type="text" name="ano_fabricacao" id="ano_fabricacao" class="form-control" placeholder="Ex: 2020">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </div>
    </form>
</div>

@endsection
