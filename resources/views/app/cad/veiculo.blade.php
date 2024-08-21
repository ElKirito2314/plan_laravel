@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($veiculo->id))
            <form action={{ route('veiculo.update', $veiculo->id) }} method="POST">
                @method('PUT')
                @csrf
        @else
            <form action={{ route('veiculo.store') }} method="POST">
                @csrf
        @endif

            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $veiculo->id ?? '' }}">

                <div class="input-wrapper">
                    <input name="modelo" class="custom-input @error('modelo') is-invalid @enderror" value="{{ $veiculo->modelo ?? old('modelo') }}" type="text" placeholder="Modelo">
                    @error('modelo')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('modelo') ? $errors->first('modelo') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <input name="fabricante" class="custom-input @error('fabricante') is-invalid @enderror" value="{{ $veiculo->fabricante ?? old('fabricante') }}" type="text" placeholder="Fabricante">
                    @error('fabricante')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('fabricante') ? $errors->first('fabricante') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <input name="placa" class="custom-input @error('placa') is-invalid @enderror" value="{{ $veiculo->placa ?? old('placa') }}" type="text" placeholder="Placa (AAA-1111)">
                    @error('placa')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('placa') ? $errors->first('placa') : '' }}
                </span>
                    
                <div>
                    <button class="btn btn-info" type="submit">ENVIAR</button>
                </div>
        </form> 
    </div>
@endsection