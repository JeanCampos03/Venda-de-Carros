@extends('index')

@section('conteudo')
@auth

<section class="admin-welcome-section">
    <div class="admin-welcome-container">
        <h1 class="admin-title">Bem-vindo à Área Administrativa</h1>
        <p class="admin-subtitle">Gerencie cadastros de veiculos, marcas, modelos, cores e configurações do usuário com
            facilidade.</p>
        <div class="admin-divider"></div>
    </div>
</section>


@else

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/escalade.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        </div>
    </div>
</section>
@endauth

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">

            @forelse ($carros as $carro)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end"
                        style="background-image: url('{{ $carro->url_foto1 ?? asset('images/default-car.jpg') }}');">
                    </div>
                    <div class="text">
                        <h2 class="mb-0">
                            <a href="#">{{ $carro->modelo->nome ?? 'Modelo desconhecido' }}</a>
                        </h2>
                        <div class="d-flex mb-3">
                            <span class="cat">{{ $carro->marca->nome ?? 'Marca desconhecida' }}</span>
                            <p class="price ml-auto">
                                R$ {{ number_format($carro->valor_total, 2, ',', '.') }}
                            </p>
                        </div>
                        <p class="mb-1">Ano: {{ $carro->ano_fabricacao }}</p>
                        <p class="mb-1">Cor: {{ $carro->cor->nome ?? 'Indefinida' }}</p>
                        <p class="mb-1">Km: {{ number_format($carro->quilometragem, 0, ',', '.') }} km</p>
                        <p class="mb-1">{{ Str::limit($carro->detalhes, 80) }}</p>
                        <p class="d-flex justify-content-end mb-0">
                            <a href="#" class="btn btn-secondary py-2 mr-1">Ver mais</a>
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center">Nenhum veículo disponível no momento.</p>
            @endforelse

        </div>
    </div>
</section>
@endsection