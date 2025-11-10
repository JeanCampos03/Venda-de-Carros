@extends('index')

@section('conteudo')
@auth
<section class="admin-welcome-section">
    <div class="admin-welcome-container">
        <h1 class="admin-title">Bem-vindo à Área Administrativa</h1>
        <p class="admin-subtitle">
            Gerencie cadastros de veículos, marcas, modelos, cores e configurações do usuário com facilidade.
        </p>
        <div class="admin-divider"></div>
    </div>
</section>
@else
<section class="hero-wrap hero-wrap-2 js-fullheight" data-stellar-background-ratio="0.5">
    <div id="carrosCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">

            @foreach ($destaques as $index => $destaque)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="hero-slide position-relative" style="background-image: url('{{ $destaque->url_foto2 }}'); 
                            background-size: cover; 
                            background-position: center; 
                            height: 100vh;">

                    <!-- Overlay escura -->
                    <div class="overlay"
                        style="position:absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.4); z-index:1;">
                    </div>

                    <!-- Conteúdo acima da overlay -->
                    <div class="container h-100 d-flex flex-column justify-content-end align-items-start text-white pb-5 position-relative"
                        style="z-index:2;">
                        <!-- Título grande -->
                        <h1 class="mb-3 display-3" style="color: #fff; text-shadow: 4px 4px 5px rgba(0,0,0,0.9);">
                            Recém chegados na loja!
                        </h1>

                        <!-- Breadcrumbs -->
                        <p class="mb-5 breadcrumbs">
                            <span>
                                <span style="4px 4px 5px rgba(0,0,0,0.9);">
                                    Home <i class="ion-ios-arrow-forward" ></i>
                                </span>
                            </span>
                            <span > 
                                <a href="{{ route('veiculo.detalhes', $destaque->id) }}" style="color: #01D28E; text-shadow: 4px 4px 5px rgba(0,0,0,0.9);">Venha Conferir</a>
                            </span>
                        </p>

                        <p class="mb-5">
                            <span>
                                <a class="mb-5" href="">
                                     <i></i>
                                </a>
                            </span>
                            <span> <i class="mb-5"></i></span>
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
                        <p class="mb-1">Quilometragem: {{ number_format($carro->quilometragem, 0, ',', '.') }} km</p>
                        <p class="d-flex justify-content-end mb-0">
                            <a href="detalhes/{{$carro->id}}" class="btn btn-secondary py-2 mr-1">Detalhes</a>
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