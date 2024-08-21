@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($material->id))
            <form action={{ route('material.update', $material->id) }} method="POST">
                @method('PUT')
                @csrf
        @else
            <form action={{ route('material.store') }} method="POST">
                @csrf
        @endif

            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $material->id ?? ''}}">
                    
                <div class="input-wrapper">
                    <input name="nome" class="custom-input @error('nome') is-invalid @enderror" value="{{ $material->nome ?? old('nome') }}" type="text" placeholder="Nome">
                    @error('nome')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </span>

                <div class="input-wrapper">
                    <input name="cor" class="custom-input @error('cor') is-invalid @enderror" value="{{ $material->cor ?? old('cor') }}" type="text" placeholder="Cor">
                    @error('cor')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('cor') ? $errors->first('cor') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <input name="marca" class="custom-input @error('marca') is-invalid @enderror" value="{{ $material->marca ?? old('marca') }}" type="text" placeholder="Marca">
                    @error('marca')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('marca') ? $errors->first('marca') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <input name="quantidade" class="custom-input @error('quantidade') is-invalid @enderror" value="{{ $material->quantidade ?? old('quantidade') }}" type="number" placeholder="Quantidade">
                    @error('quantidade')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('marca') ? $errors->first('quantidade') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <select class="custom-input @error('setor_id') is-invalid @enderror" name="setor_id">
                        <option value="">Setor</option>
                        @foreach ($setores as $set)
                            <option value="{{ $set->id }}" {{ old('setor_id') == $set->id || $material->setor_id == $set->id ? 'selected' : '' }}>{{ $set->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback">
                    {{ $errors->has('setor_id') ? $errors->first('setor_id') : '' }}
                </span>
            
            <div>
                <button class="btn btn-info" type="submit">ENVIAR</button>
            </div>
        </form>
    </div>
@endsection