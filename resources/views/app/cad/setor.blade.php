@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-azul">
        <form action={{ route('app.cad.setor') }} method="POST">
            @csrf
            <div class="conteudo-pagina">

                <div class="titulo-form">{{ $cadTitulo }}</div>
            
            <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            <br>
            <button class="btn btn-info" type="submit">ENVIAR</button>
            <pre>
                <a href="{{ route('app.cadastro') }}">Voltar</a>
            </pre>
        </form> 
    </div>
@endsection