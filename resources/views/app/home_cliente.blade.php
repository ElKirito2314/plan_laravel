@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="home-quadro">
            <div class="esquerda"><a href="{{ route('app.progressao') }}"><img src="{{ asset('img/reforma2.jpg')}}" alt=""><h2>PROGRESSÃO</h2><p>Veja aqui a progressão de sua obra</p></a></div>
            <div class="centro"><a href="{{ route('app.ambiente') }}"><img src="{{ asset('img/reforma1.jpg')}}" alt=""><h2>AMBIENTES</h2><p>Veja aqui os ambientes da sua obra</p></a></div>
            <div class="direita"><a href="{{ route('app.projeto') }}"><img src="{{ asset('img/reforma5.jpg')}}" alt=""><h2>PROJETOS</h2><p>Veja aqui os projetos das suas obras</p></a></div>
        </div>
    </div>
@endsection