@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($empregadoFerramenta->id))
            <form action="{{ route('empregado-ferramenta.update', $empregadoFerramenta->id)}}" method="POST">
                @method('PUT')
                @csrf
        @else
            <form action="{{ route('empregado-ferramenta.store')}}" method="POST">
                @csrf
        @endif

            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $empregadoFerramenta->id ?? '' }}">

                <div>
                    <label for="data_retirada">Retirada</label>
                </div>
                <div class="input-wrapper">
                    <input type="date" name="data_retirada" class="custom-input @error('data_retirada') is-invalid @enderror" value="{{ $empregadoFerramenta->data_retirada ?? old('data_retirada') }}">
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('data_retirada') ? $errors->first('data_retirada') : '' }}
                </span>

                <div class="input-wrapper">
                    <select class="custom-input @error('endereco_id') is-invalid @enderror" name="endereco_id">
                        <option value="">Endereço de destino</option>
                        @foreach ($enderecos as $end)
                            <option value="{{ $end->id }}" {{ old('endereco_id') == $end->id || $empregadoFerramenta->endereco_id == $end->id ? 'selected' : '' }}>{{ $end->proprietario }} - {{ $end->rua }} - {{ $end->bairro }}</option>
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
                            <option value="{{ $emp->id }}" {{ old('empregado_id') == $emp->id || $empregadoFerramenta->empregado_id == $emp->id ? 'selected' : '' }} > {{ $emp->nome }} - {{ $emp->funcao }} </option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('empregado_id') ? $errors->first('empregado_id') : '' }}
                </span>

                <div class="input-wrapper">
                    <select class="custom-input @error('ferramenta_id') is-invalid @enderror" name="ferramenta_id">
                        <option value="">Ferramenta utilizada</option>
                        @foreach ($ferramentas as $ferr)
                            <option value="{{ $ferr->id }}" {{ old('ferramenta_id') == $ferr->id || $empregadoFerramenta->ferramenta_id == $ferr->id ? 'selected' : ''}}> {{ $ferr->nome }} - {{ $ferr->cor }} - {{ $ferr->condicao }} </option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('ferramenta_id') ? $errors->first('ferramenta_id') : '' }}
                </span>

                <div>
                    <button class="btn btn-info" type="submit">ENVIAR</button>
                </div>
            </div>
        </form>
    </div>

@endsection