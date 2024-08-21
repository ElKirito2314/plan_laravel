@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        <form>
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
            @csrf
            <br>
            <a class="btn btn-info" href="{{ route('empregado-ferramenta.create') }}" >Ferramentas</a>
            <a class="btn btn-info" href="{{ route('empregado-material.create') }}">Materiais</a>
            <a class="btn btn-info" href="{{ route('empregado-veiculo.create') }}">Veículos</a>
            <br>
            <br>
        </form> 
    </div>
@endsection