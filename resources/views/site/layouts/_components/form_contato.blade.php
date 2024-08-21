<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input name="nome" value="{{  old('nome')  }}" type="text" placeholder="Nome" class={{ $classe }}>
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" value="{{  old('telefone')  }}" type="text" id="telefone" maxlength="13" placeholder="Telefone" class={{ $classe }}>
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
        {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{  old('email')  }}" type="text" placeholder="E-mail" class={{ $classe }}>
        {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contato" class={{ $classe }}>
        <option value="">Motivo do contato</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$key}}" {{ old('motivo_contato') == $key ? 'selected' : '' }}> {{ $motivo_contato }} </option>
        @endforeach
    </select>
        {{ $errors->has('motivo_contato') ? $errors->first('motivo_contato') : '' }}
    <br>
    @if (old('mensagem') !== '')
        @php $mensagem=old('mensagem'); @endphp
    @endif
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui sua mensagem">{{ $mensagem }}</textarea>
        {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class={{ $classe }}>ENVIAR</button>
</form>
