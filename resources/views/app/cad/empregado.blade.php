@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        @if (isset($empregado->id))
            <form action="{{ route('empregado.update', $empregado->id) }}" method="POST">
                @method('PUT')
                @csrf
        @else
            <form action="{{ route('empregado.store') }}" method="POST">
                @csrf
        @endif
        
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $empregado->id ?? '' }}">

                <div class="input-wrapper">
                    <input name="nome" class="custom-input @error('nome') is-invalid @enderror" value="{{ $empregado->nome ?? old('nome') }}" type="text" placeholder="Nome">
                    @error('nome')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                </span>
                 
                <div class="input-wrapper">
                <input name="cpf" class="custom-input @error('cpf') is-invalid @enderror" value="{{ $empregado->cpf ?? old('cpf') }}" type="text" placeholder="CPF" 
                onkeypress="if (!isNaN (String.fromCharCode (window.event.keyCode))) return true; 
                else return false;" maxlength="11">
                    @error('cpf')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('cpf') ? $errors->first('cpf') : '' }}
                </span>
                
                <div class="input-wrapper">
                <input name="telefone" id="telefone" class="custom-input @error('telefone') is-invalid @enderror" value="{{ $empregado->telefone ?? old('telefone') }}" type="text" placeholder="Telefone" maxlength="13">
                    @error('telefone')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback">
                    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
                </span>
                    <script>
                        function mascaraTelefone(telefone) {
                        telefone = telefone.replace(/\D/g,"");
                        telefone = telefone.replace(/^(\d{2})(\d)/g,"($1)$2");
                        
                        return telefone;
                        }
                    
                        var inputTelefone = document.getElementById("telefone");
                        inputTelefone.addEventListener("input", function(event) {
                        event.target.value = mascaraTelefone(event.target.value);
                        });
                    </script>

                <div>
                <label for="nascimento">Nascimento</label>
                </div>
                <div class="input-wrapper">
                <input type="date" class="custom-input @error('nascimento') is-invalid @enderror" value="{{ $empregado->nascimento ?? old('nascimento') }}" name="nascimento">
                </div>
                <span class="custom-invalid-feedback">
                    {{ $errors->has('nascimento') ? $errors->first('nascimento') : '' }}
                </span>

                <div>
                <label for="data_de_ingresso">Ingresso</label>
                </div>
                <div class="input-wrapper">
                <input type="date" class="custom-input @error('data_de_ingresso') is-invalid @enderror" value="{{ $empregado->data_de_ingresso ?? old('data_de_ingresso') }}" name="data_de_ingresso">
                </div>
                <span class="custom-invalid-feedback">
                    {{ $errors->has('data_de_ingresso') ? $errors->first('data_de_ingresso') : '' }}
                </span>

                <div class="input-wrapper">
                <input name="funcao" class="custom-input @error('funcao') is-invalid @enderror" value="{{ $empregado->funcao ?? old('funcao') }}" type="text" placeholder="Função">
                    @error('funcao')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback">
                    {{ $errors->has('funcao') ? $errors->first('funcao') : '' }}
                </span>

                <div class="input-wrapper">
                <select class="custom-input @error('setor_id') is-invalid @enderror" name="setor_id">
                    <option  value="">Setor</option>
                    @foreach ($setores as $set)
                        <option value="{{ $set->id }}" {{ old('setor_id') == $set->id || $empregado->setor_id == $set->id ? 'selected' : '' }}>{{ $set->nome }}</option>
                    @endforeach
                </select>
                </div>
                <span class="custom-invalid-feedback">
                    {{ $errors->has('setor_id') ? $errors->first('setor_id') : '' }}
                </span>   

                <div>
                <button class="btn btn-info" type="submit">ENVIAR</button>
                </div>
            </div>
        </form>
    </div>
@endsection