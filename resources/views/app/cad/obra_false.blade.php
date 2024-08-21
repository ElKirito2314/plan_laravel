@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="fundo-claro">
        <form action={{ route('app.cad.obra_false') }} method="POST">
            
            <div class="conteudo-pagina">
                <div class="titulo-form">{{ $cadTitulo }}</div>
                    <input type="hidden" name="id" value="{{ $endereco->id ?? '' }}">
                
                <div class="input-wrapper">
                    <input name="proprietario" class="custom-input @error('proprietario') is-invalid @enderror" value="{{ $endereco->proprietario ?? old('proprietario') }}" type="text" placeholder="Proprietário">
                    @error('proprietario')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('proprietario') ? $errors->first('proprietario') : '' }}
                </span>

                <div class="input-wrapper">
                    <input name="bairro" class="custom-input @error('bairro') is-invalid @enderror" value="{{ $endereco->bairro ?? old('bairro') }}" type="text" placeholder="Bairro">
                    @error('bairro')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('bairro') ? $errors->first('bairro') : '' }}
                </span>

                <div class="input-wrapper">
                    <input name="cep" class="custom-input @error('cep') is-invalid @enderror" value="{{ $endereco->cep ?? old('cep') }}" id="cep" type="text" placeholder="CEP">
                    @error('cep')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('cep') ? $errors->first('cep') : '' }}
                </span>
                <script> 
                    function mascaraCep(cep) { 
                        cep = cep.replace(/\D/g,""); 
                        cep = cep.replace(/^(\d{5})(\d)/,"$1-$2"); 
                
                        return cep; 
                    } 
                        var inputCep = document.getElementById("cep"); 
                        inputCep.addEventListener("input", function(event) { 
                            event.target.value = mascaraCep(event.target.value); 
                    }); 
                    </script> 

                <div class="input-wrapper">
                    <input name="rua" class="custom-input @error('rua') is-invalid @enderror" value="{{ $endereco->rua ?? old('rua') }}" type="text" placeholder="Rua">
                    @error('rua')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('rua') ? $errors->first('rua') : '' }}
                </span>

                <div class="input-wrapper">
                    <input name="numero" class="custom-input @error('rua') is-invalid @enderror" value="{{ $endereco->numero ?? old('numero') }}" type="text" placeholder="Número"
                    onkeypress="if (!isNaN (String.fromCharCode (window.event.keyCode))) return true; 
                    else return false;">
                    @error('rua')
                        <i class="bi bi-exclamation-circle position-absolute error-icon"></i>
                    @enderror
                </div>
                <span class="custom-invalid-feedback" role="alert">
                    {{ $errors->has('numero') ? $errors->first('numero') : '' }}
                </span>

                <div>
                    <button class="btn btn-info" type="submit">ENVIAR</button>
                </div>
        </form> 
    </div>
@endsection