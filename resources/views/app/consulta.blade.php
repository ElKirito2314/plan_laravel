@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="direita-design"></div>
        <div class="titulo-app">
                <b><ins>CONSULTAS</ins></b>
                PLANEJAR É SER 
                <b>PLAN</b>
        </div>

            <div class="midia">
                <img src="{{ asset('img/reforma3.jpg')}}" alt="">
            </div>

            <div class="cadastro-quadro">
                <div class="cadastro">
                <a href="{{ route('empregado.index') }}"><h4> <i class="bi bi-journal-text"></i> EMPREGADOS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('ferramenta.index') }}"><h4> <i class="bi bi-journal-text"></i> FERRAMENTAS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('material.index') }}"><h4> <i class="bi bi-journal-text"></i> MATERIAIS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('veiculo.index') }}"><h4> <i class="bi bi-journal-text"></i> VEÍCULOS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('endereco.index') }}"><h4> <i class="bi bi-journal-text"></i> ENDEREÇOS</h4></a>
                </div>
                <div class="cadastro">
                    <a href="{{ route('app.list.obra') }}"><h4> <i class="bi bi-journal-text"></i> OBRAS</h4></a>         
                </div>
                
                <div class="cadastro">
                    <a href="{{ route('servico.index') }}"><h4> <i class="bi bi-journal-text"></i> SERVIÇOS</h4></a>         
                </div>
                <div class="cadastro">
                    <a href="{{ route('app.disponibilidade') }}"><h4> <i class="bi bi-journal-text"></i> DISPONIBILIDADE</h4></a>      
                </div>
            </div>    
    </div>
@endsection