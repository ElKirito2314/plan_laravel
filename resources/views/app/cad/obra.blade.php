@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        <form>
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
            @csrf
            <br>
            <a class="btn btn-info" href="{{ route('obra.create') }}" >Possuo</a>
            <a class="btn btn-info" href="{{ route('endereco.create') }}">Não possuo</a>
            <br>
            <br>
        </form> 
    </div>
@endsection