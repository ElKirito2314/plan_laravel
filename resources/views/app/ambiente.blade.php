@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
<div class="fundo-claro">
    <div class="esquerda-quadro-branco">
        <h1 class="titulo">SALA</h1>
        <h2 class="subtitulo">Progressão</h2>
        <p class="paragrafo" >Acompanhe conosco o progresso da sua sala</p>
    </div>
    <div class="direita-quadro-azul">
            <div class="carousel-container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('/img/reforma3.jpg') }}" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('/img/reforma2.jpg') }}" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('/img/reforma5.jpg') }}" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
    </div>
</div>
@endsection
