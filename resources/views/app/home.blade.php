@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="home-quadro">
            <div class="esquerda"><a href="{{ route('app.cadastro') }}"><img src="{{ asset('img/reforma3.jpg')}}" alt=""><h2>CADASTROS</h2><h3>Adicione dados</h3><p>Um bom planejamento é a base, planejar é ser plan</p></a></div>
            <div class="centro"><a href="{{ route('obra.index') }}"><img src="{{ asset('img/colaborador.jpg')}}" alt=""><h2>OBRAS</h2><h3>Acesso as obras</h3><p>Endereços, visualização e projetos</p></a></div>
            <div class="direita"><a href="{{ route('app.consulta') }}"><img src="{{ asset('img/reforma4.jpg')}}" alt=""><h2>CONSULTAS</h2><h3>Acesso aos cadastros </h3><p>Listagem de empregados, obras, ferramentas, serviços e mais</p></a></div>
        </div>
    </div>
@endsection