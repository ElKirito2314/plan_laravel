@extends('site.layouts.basic')

@section('titulo', $titulo)
    
@section('bloco_conteudo')

        <div class="conteudo-destaque">
        
            <div class="esquerda">
                <div class="informacoes1">
                    <h1>Plan Reformas</h1>
                    <div class="chamada">
                        <span class="texto-branco">Gestão completa e descomplicada</span>
                    </div>
                    <div class="chamada">
                        <span class="texto-branco">Sua empresa na nuvem</span>
                    </div>
                </div>

                <div class="video">
                    <div class="carousel" id="carousel">
                    <img src="{{ asset('/img/reforma2.jpg') }}">
                    <img src="{{ asset('/img/reforma3.jpg') }}">
                    <img src="{{ asset('/img/reforma4.jpg') }}">
                    <img src="{{ asset('/img/reforma5.jpg') }}">
                </div>
                    </div>
                </div>

            <div class="direita1">
            </div>
            <div class="direita2">
            </div>
        </div>
@endsection