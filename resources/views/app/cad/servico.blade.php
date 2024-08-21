@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($servico->id))
            <form action={{ route('servico.update', $servico->id) }} method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
        @else
            <form action={{ route('servico.store') }} method="POST" enctype="multipart/form-data">
                @csrf
        @endif
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $servico->id ?? '' }}">
                    
                <div>
                    <label for="data_inicio">Data de Início</label>
                </div>
                <div class="input-wrapper">
                    <input type="date" class="custom-input @error('data_inicio') is-invalid @enderror" value="{{ $servico->data_inicio ?? old('data_inicio') }}" name="data_inicio">
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('data_inicio') ? $errors->first('data_inicio') : '' }}
                </span>
                    
                <div class="input-wrapper">
                    <input name="atividade" class="custom-input @error('atividade') is-invalid @enderror" value="{{ $servico->atividade ?? old('atividade') }}" type="text" placeholder="Atividade">
                    @error('atividade')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('atividade') ? $errors->first('atividade') : '' }}
                </span>

                <div class="input-wrapper">    
                    <select class="custom-input @error('responsavel_id') is-invalid @enderror" name="responsavel_id">
                        <option value="">Selecione o responsável pelo serviço</option>
                        @foreach ($responsavel as $resp)
                            <option value="{{ $resp->id }}" {{ old('responsavel_id') == $resp->id || $servico->responsavel_id == $resp->id ? 'selected' : '' }}>{{ $resp->nome }} - {{ $resp->funcao }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('responsavel_id') ? $errors->first('responsavel_id') : '' }}
                </span>

                <div class="input-wrapper">
                    <select class="custom-input @error('obra_id') is-invalid @enderror" name="obra_id">
                        <option value="">Obra</option>
                        @foreach ($obras as $obr)
                            <option value="{{ $obr->id }}" {{ old('obra_id') == $obr->id || $servico->obra_id == $obr->id ? 'selected' : '' }}>{{ $obr->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('obra_id') ? $errors->first('obra_id') : '' }}
                </span>

                <div class="input-wrapper">
                    <select class="custom-input @error('setor_id') is-invalid @enderror" name="setor_id">
                        <option value="">Setor</option>
                        @foreach ($setores as $set)
                            <option value="{{ $set->id }}" {{ old('setor_id') == $set->id || $servico->setor_id == $set->id ? 'selected' : '' }}>{{ $set->nome }}</option>
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