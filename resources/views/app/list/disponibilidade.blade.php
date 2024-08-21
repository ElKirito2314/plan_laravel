@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        <form>
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
            @csrf
            <br>
            <a class="btn btn-info" href="{{ route('empregado-ferramenta.index') }}">Ferramentas</a>
            <a class="btn btn-info" href="{{ route('empregado-material.index') }}">Materiais</a>
            <a class="btn btn-info" href="{{ route('empregado-veiculo.index') }}">Veículos</a>
            <br>
            <br>
        </form>
       
    </div>
@endsection