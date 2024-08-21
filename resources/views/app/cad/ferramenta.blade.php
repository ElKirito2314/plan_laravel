@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($ferramenta->id))
            <form action={{ route('ferramenta.update', $ferramenta->id) }} method="POST">
                @method('PUT')
                @csrf
        @else
            <form action={{ route('ferramenta.store') }} method="POST">
                @csrf
        @endif
        
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $ferramenta->id ?? '' }}">

                <div class="input-wrapper">
                    <input name="nome" class="custom-input @error('nome') is-invalid @enderror" value="{{ $ferramenta->nome ?? old('nome') }}" type="text" placeholder="Nome">
                    @error('nome')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <input name="cor" class="custom-input @error('cor') is-invalid @enderror" value="{{ $ferramenta->cor ?? old('cor') }}" type="text" placeholder="Cor">
                    @error('cor')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('cor') ? $errors->first('cor') : '' }}
                </span>
                
                <div class="input-wrapper">
                    <input name="marca" class="custom-input @error('marca') is-invalid @enderror" value="{{ $ferramenta->marca ?? old('marca') }}" type="text" placeholder="Marca">
                    @error('marca')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('marca') ? $errors->first('marca') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <select class="custom-input @error('condicao') is-invalid @enderror" name="condicao">
                        <option value="">Condição</option>
                        <option value="Bom" {{ $ferramenta->condicao ?? old('condicao') == 'Bom' ? 'selected' : '' }}>Bom</option>
                        <option value="Razoavel" {{ $ferramenta->condicao ?? old('condicao') == 'Razoavel' ? 'selected' : '' }}>Razoavel</option>
                        <option value="Ruim" {{ $ferramenta->condicao ?? old('condicao') == 'Ruim' ? 'selected' : '' }}>Ruim</option>
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('condicao') ? $errors->first('condicao') : '' }}
                </span>
                
                <div class="input-wrapper">
                    <select class="custom-input @error('setor_id') is-invalid @enderror" name="setor_id">
                        <option value="">Setor</option>
                        @foreach ($setores as $set)
                            <option value="{{ $set->id }}" {{ old('setor_id') == $set->id || $ferramenta->setor_id == $set->id ? 'selected' : '' }}>{{ $set->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                        {{ $errors->has('setor_id') ? $errors->first('setor_id') : '' }}
                </span>
                    
                <div>
                    <button class="btn btn-info" type="submit">ENVIAR</button>
                </div>
        </form> 
    </div>
@endsection