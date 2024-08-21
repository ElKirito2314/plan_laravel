@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($empregadoMaterial->id))
            <form action="{{ route('empregado-material.update', $empregadoMaterial->id)}}" method="POST">
                @method('PUT')
                @csrf
        @else
            <form action="{{ route('empregado-material.store')}}" method="POST">
                @csrf
        @endif
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $empregadoMaterial->id ?? '' }}">

                <div>
                    <label for="data_retirada">Retirada</label>
                </div>
                <div class="input-wrapper">
                    <input type="date" name="data_retirada" class="custom-input @error('data_retirada') is-invalid @enderror" value="{{ $empregadoMaterial->data_retirada ?? old('data_retirada') }}">
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('data_retirada') ? $errors->first('data_retirada') : '' }}
                </span>

                <div class="input-wrapper">
                    <input type="number" name="quantidade" class="custom-input @error('quantidade') is-invalid @enderror" value="{{ $empregadoMaterial->quantidade ?? old('quantidade') }}" placeholder="Quantidade">
                        @error('quantidade')
                            <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                        @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
                </span>

                <div class="input-wrapper">
                    <select class="custom-input @error('endereco_id') is-invalid @enderror" name="endereco_id">
                        <option value="">Endereço de destino</option>
                        @foreach ($enderecos as $end)
                            <option value="{{ $end->id }}" {{ old('endereco_id') == $end->id || $empregadoMaterial->endereco_id == $end->id ? 'selected' : '' }}> {{ $end->proprietario }} - {{ $end->rua }} - {{ $end->bairro }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('endereco_id') ? $errors->first('endereco_id') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <select class="custom-input @error('empregado_id') is-invalid @enderror" name="empregado_id">
                        <option value="">Empregado que irá utilizar</option>
                        @foreach ($empregados as $emp)
                            <option value="{{ $emp->id }}" {{ old('empregado_id') == $emp->id || $empregadoMaterial->empregado_id == $emp->id ? 'selected' : '' }} > {{ $emp->nome }} - {{ $emp->funcao }} </option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('empregado_id') ? $errors->first('empregado_id') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <select class="custom-input @error('material_id') is-invalid @enderror" name="material_id">
                        <option value="">Material utilizado</option>
                        @foreach ($materiais as $mat)
                            <option value="{{ $mat->id }}" {{ old('material_id') == $mat->id || $empregadoMaterial->material_id == $mat->id ? 'selected' : ''}}> {{ $mat->nome }} - {{ $mat->cor }} - {{ $mat->quantidade }} - {{ $mat->marca }} </option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('material_id') ? $errors->first('material_id') : '' }}
                </span>
                    
                <div>
                    <button class="btn btn-info" type="submit">ENVIAR</button>
                </div>
            </div>
        </form>
    </div>

@endsection