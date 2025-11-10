@extends('index')

@section('conteudo_detalhes')

<!-- Detalhes do Carro -->
<section class="car-detail-section layout_padding py-5 mt-5" style="padding-top: 120px;">
    <div class="container">
        <div class="row g-4 align-items-center">

            <!-- Galeria de Imagens -->
            <div class="col-md-6">
                <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded shadow">
                        @foreach (['url_foto1', 'url_foto2', 'url_foto3'] as $index => $foto)
                        @if(!empty($carros->$foto))
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ $carros->$foto }}" class="d-block w-100" alt="Imagem do carro {{ $index+1 }}">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

            <!-- Informações do Carro -->
            <div class="col-md-6">
                <div class="about_taital_box">
                    <h1 class="about_taital mb-4">
                        <span style="color: #000000ff;">{{ $carros->marca->nome ?? 'Marca desconhecida' }}</span>
                        <span style="color: #01D28E;">{{ $carros->modelo->nome ?? 'Marca desconhecida' }}</span>
                    </h1>

                    <ul class="list-unstyled fs-5">
                        <li><strong style="color: #000000ff;"> Cor: <span
                                    style="color: #808080;">{{ $carros->cor->nome }}</span></strong> </li>
                        <li><strong style="color: #000000ff;">Ano de Fabricação: <span
                                    style="color: #808080;">{{ $carros->ano_fabricacao }}</span></strong> </li>
                        <li><strong style="color: #000000ff;">Quilometragem: <span
                                    style="color: #808080;">{{ number_format($carros->quilometragem, 0, ',', '.') }}
                                    km</span></strong>
                        </li>
                        <li><strong style="color: #000000ff;">Valor Total: </strong>
                            <span class="fw-bold" style="color: #01D28E;">R$
                                {{ number_format($carros->valor_total, 2, ',', '.') }}
                            </span>
                        </li>
                    </ul>


                    <div class="mt-4">
                        <h4>Detalhes</h4>
                        {{$carros->detalhes ?? 'Não há detalhes para mostrar.'}}
                        <p class="text-muted"></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection