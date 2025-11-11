@extends('dashboard-config')

@section('configs_marcas')
<nav class="nav-menu">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="{{ route('index.veiculo') }}" class="nav-link">Veiculos</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('veiculo.cadastro') }}" class="nav-link">Cadastrar</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link nav-link--active">Editando...</a>
        </li>
    </ul>
</nav>
</aside>

<main class="content-main">
    <h2 class="content-title">Editar Veículo</h2>

    <div class="form-grid-wrapper">
        <form class="profile-form" action="{{ route('veiculo.atualizar', $carro->id) }}" method="POST">
            @csrf



            <input type="hidden" name="id" value="{{$carro->id}}">


            <div class="form-grid-3">
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <select name="marca_id" id="marca" class="input-field" disabled>
                        <option value="">Selecione uma marca</option>
                        @foreach($marcas as $marcaItem)
                        <option value="{{ $marcaItem->id }}" {{ $carro->marca_id == $marcaItem->id ? 'selected' : '' }}>
                            {{ $marcaItem->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="modelo">Modelo</label>
                    <select name="modelo_id" id="modelo" class="input-field">
                        <option value="">Selecione um modelo</option>
                        @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id }}" {{ $carro->modelo_id == $modelo->id ? 'selected' : '' }}>
                            {{ $modelo->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cor">Cor</label>
                    <select name="cor_id" id="cor" class="input-field">
                        <option value="">Selecione uma cor</option>
                        @foreach($cores as $cor)
                        <option value="{{ $cor->id }}" {{ $carro->cor_id == $cor->id ? 'selected' : '' }}>
                            {{ $cor->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group form-group--inline">
                    <label for="ano_fabricacao" class="form-label">Ano Fabricação</label>
                    <div class="input-inline-group">
                        <input type="text" id="ano_fabricacao" class="input-field" name="ano_fabricacao"
                            value="{{ $carro->ano_fabricacao }}" maxlength="4" placeholder="Ex. 2022">
                    </div>
                </div>

                <div class="form-group form-group--inline">
                    <label for="quilometragem" class="form-label">Quilometragem Atual</label>
                    <div class="input-inline-group">
                        <input type="text" id="quilometragem" class="input-field" name="quilometragem"
                            value="{{ $carro->quilometragem }}" placeholder="Ex. 45.000">
                    </div>
                </div>

                <div class="form-group form-group--inline">
                    <label for="valor_total" class="form-label">Valor Total</label>
                    <div class="input-inline-group">
                        <input type="text" id="valor_total" class="input-field" name="valor_total"
                            value="{{ $carro->valor_total }}" placeholder="Ex. 85900.00">
                    </div>
                </div>
            </div>

            <div class="form-group form-group--inline">
                <label for="detalhes" class="form-label">Detalhes</label>
                <div class="input-inline-group">
                    <textarea id="detalhes" name="detalhes" class="input-field" rows="4"
                        placeholder="Adicione informações extras...">{{ $carro->detalhes }}</textarea>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group form-group--inline">
                    <label for="url_foto1" class="form-label">Imagem 1</label>
                    <div class="input-inline-group">
                        <input type="text" id="url_foto1" class="input-field" name="url_foto1"
                            value="{{ $carro->url_foto1 }}" placeholder="Coloque o link aqui">
                    </div>
                </div>

                <div class="form-group form-group--inline">
                    <label for="url_foto2" class="form-label">Imagem 2</label>
                    <div class="input-inline-group">
                        <input type="text" id="url_foto2" class="input-field" name="url_foto2"
                            value="{{ $carro->url_foto2 }}" placeholder="Coloque o link aqui">
                    </div>
                </div>

                <div class="form-group form-group--inline">
                    <label for="url_foto3" class="form-label">Imagem 3</label>
                    <div class="input-inline-group">
                        <input type="text" id="url_foto3" class="input-field" name="url_foto3"
                            value="{{ $carro->url_foto3 }}" placeholder="Coloque o link aqui">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Atualizar</button>
            </div>
        </form>
</main>
</div>
@endsection