@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($empregadoVeiculo->id))
            <form action="{{ route('empregado-veiculo.update', $empregadoVeiculo->id)}}" method="POST">
                @method('PUT')
                @csrf 
        @else
            <form action="{{ route('empregado-veiculo.store')}}" method="POST">
                @csrf 
        @endif

            <div class="conteudo-pagina">

                <div class="titulo-form">{{ $cadTitulo }}</div>
                
                    <input type="hidden" name="id" value="{{ $empregadoVeiculo->id ?? '' }}">

                <div>
                    <label for="data_retirada">Retirada</label>
                </div>
                <div class="input-wrapper">
                    <input type="date" name="data_retirada" class="custom-input @error('data_retirada') is-invalid @enderror" value="{{ $empregadoVeiculo->data_retirada ?? old('data_retirada') }}" placeholder="Retirada">
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('data_retirada') ? $errors->first('data_retirada') : '' }}
                </span>

                <div class="input-wrapper">
                    <select class="custom-input @error('empregado_id') is-invalid @enderror" name="empregado_id">
                        <option value="">Empregado que irá utilizar</option>
                        @foreach ($empregados as $emp)
                            <option value="{{ $emp->id }}" {{ old('empregado_id') == $emp->id || $empregadoVeiculo->empregado_id == $emp->id ? 'selected' : '' }} > {{ $emp->nome }} - {{ $emp->funcao }} </option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('empregado_id') ? $errors->first('empregado_id') : '' }}
                </span>

                <div class="input-wrapper">
                    <select class="custom-input @error('veiculo_id') is-invalid @enderror" name="veiculo_id">
                        <option value="">Veículo utilizado</option>
                        @foreach ($veiculos as $veic)
                            <option value="{{ $veic->id }}" {{ old('veiculo_id') == $veic->id || $empregadoVeiculo->veiculo_id == $veic->id ? 'selected' : '' }}> {{ $veic->modelo }} - {{ $veic->placa }} - {{ $veic->fabricante }} </option>
                        @endforeach
                    </select>
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('veiculo_id') ? $errors->first('veiculo_id') : '' }}
                </span>

                <div>
                    <button class="btn btn-info" type="submit">ENVIAR</button>
                </div>
            </div>
        </form>
    </div>

@endsection