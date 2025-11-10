@extends('index')

@section('conteudo')
@auth
<section class="admin-welcome-section py-5 text-center">
    <div class="container">
        <h1 class="admin-title">Bem-vindo à Área Administrativa</h1>
        <p class="admin-subtitle">
            Gerencie cadastros de veículos, marcas, modelos, cores e configurações do usuário com facilidade.
        </p>
        <div class="admin-divider my-3"></div>
    </div>
</section>
@else
<section class="hero-wrap hero-wrap-2 js-fullheight">
    <div id="carrosCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">

            @foreach ($destaques as $index => $destaque)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="hero-slide position-relative" 
                     style="background-image: url('{{ $destaque->url_foto2 }}'); background-size: cover; background-position: center; min-height: 60vh;">

                    <!-- Overlay escura -->
                    <div class="overlay" style="position:absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.4); z-index:1;"></div>

                    <!-- Conteúdo fixo na parte inferior -->
                    <div class="container position-absolute bottom-0 start-0 p-4" style="z-index:2;">
                        <h1 class="display-4 text-white text-shadow mb-2">
                            Recém chegados na loja!
                        </h1>
                        <p class="breadcrumbs text-white text-shadow mb-0">
                            <span>Home <i class="ion-ios-arrow-forward"></i></span>
                            <span> <a href="{{ route('veiculo.detalhes', $destaque->id) }}" style="color: #01D28E;">Venha Conferir</a></span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Setas de navegação -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carrosCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrosCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
</section>
@endauth

<section class="ftco-section bg-light py-5">
    <div class="container">
        <div class="row">
            @forelse ($carros as $carro)
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url('{{ $carro->url_foto1 ?? asset('images/default-car.jpg') }}'); min-height: 200px; background-size: cover; background-position: center;"></div>
                    <div class="text p-3">
                        <h2 class="mb-2">
                            <a href="#">{{ $carro->modelo->nome ?? 'Modelo desconhecido' }}</a>
                        </h2>
                        <div class="d-flex mb-2 justify-content-between">
                            <span class="cat">{{ $carro->marca->nome ?? 'Marca desconhecida' }}</span>
                            <p class="price mb-0">R$ {{ number_format($carro->valor_total, 2, ',', '.') }}</p>
                        </div>
                        <p class="mb-1">Ano: {{ $carro->ano_fabricacao }}</p>
                        <p class="mb-1">Cor: {{ $carro->cor->nome ?? 'Indefinida' }}</p>
                        <p class="mb-1">Quilometragem: {{ number_format($carro->quilometragem, 0, ',', '.') }} km</p>
                        <p class="d-flex justify-content-end mb-0">
                            <a href="detalhes/{{$carro->id}}" class="btn btn-secondary py-2">Detalhes</a>
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

<style>
/* Sombra de texto intensa */
.text-shadow {
    text-shadow: 4px 4px 10px rgba(0,0,0,0.9);
}

/* Ajustes responsivos do título do carrossel */
@media (max-width: 767px) {
    .hero-slide h1 {
        font-size: 2rem !important;
    }
    .hero-slide .breadcrumbs {
        font-size: 0.9rem;
    }
}
</style>
@endsection
