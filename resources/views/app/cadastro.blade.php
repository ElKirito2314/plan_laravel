@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="direita-design"></div>
        <div class="titulo-app">
                <b><ins>CADASTROS</ins></b>
                PLANEJAR É SER 
                <b>PLAN</b>
        </div>

            <div class="midia">
                <img src="{{ asset('img/reforma4.jpg')}}" alt="">
            </div>

            <div class="cadastro-quadro">
                <div class="cadastro">
                <a href="{{ route('empregado.create') }}"><h4> <i class="bi bi-journal-plus"></i> EMPREGADOS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('ferramenta.create') }}"><h4> <i class="bi bi-journal-plus"></i> FERRAMENTAS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('material.create') }}"><h4> <i class="bi bi-journal-plus"></i> MATERIAIS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('veiculo.create') }}"><h4> <i class="bi bi-journal-plus"></i> VEÍCULOS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('endereco.create') }}"><h4> <i class="bi bi-journal-plus"></i> ENDEREÇOS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('app.obra') }}"><h4> <i class="bi bi-journal-plus"></i> OBRAS</h4></a>         
                </div>
                <div class="cadastro">
                    <a href="{{ route('servico.create') }}"><h4> <i class="bi bi-journal-plus"></i> SERVIÇOS</h4></a>         
                </div>
                <div class="cadastro">
                    <a href="{{ route('app.retirada') }}"><h4> <i class="bi bi-journal-plus"></i> RETIRADAS</h4></a>         
                </div>
            </div>
    </div>
@endsection