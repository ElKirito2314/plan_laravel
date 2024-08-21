@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($obras->id))
            <form action="{{ route('obra.update', $obras->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
        @else
            <form action="{{ route('obra.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        @endif
        
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $obras->id ?? '' }}">

                <div class="input-wrapper">
                    <input name="nome" class="custom-input @error('nome') is-invalid @enderror" value="{{ $obras->nome ?? old('nome') }}" type="text" placeholder="Nome">
                    @error('nome')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </span>
                    
                <div>
                    <label for="data_inicio">Data de Início</label>
                </div>
                <div class="input-wrapper">
                    <input type="date" class="custom-input @error('data_inicio') is-invalid @enderror" value="{{ $obras->data_inicio ?? old('data_inicio') }}" name="data_inicio">
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('data_inicio') ? $errors->first('data_inicio') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <input name="imagem" class="custom-input @error('imagem') is-invalid @enderror" value="{{ $obras->imagem ?? old('imagem') }}" type="file">
                    @error('imagem')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('imagem') ? $errors->first('imagem') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <select class="custom-input @error('endereco_id') is-invalid @enderror" name="endereco_id">
                        <option value="">Selecione o endereço do serviço</option>
                        @foreach ($endereco as $end)
                            <option value="{{ $end->id }}" {{ old('endereco_id') == $end->id || (isset($obras->endereco_id) && $obras->endereco_id == $end->id) ? 'selected' : '' }}>{{ $end->proprietario }} - {{ $end->rua }} - {{ $end->bairro }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('endereco_id') ? $errors->first('endereco_id') : '' }}
                </span>
                    
                <div>
                    <button class="btn btn-info" type="submit">ENVIAR</button>
                </div>
        </form> 
    </div>
@endsection
