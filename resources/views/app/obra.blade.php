@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="container-fluid">
            <div class="row">
                @foreach ($obras as $obr)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/' . $obr->imagem) }}" class="card-img-top" alt="Imagem da obra">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $obr->nome }}
                            </h5>
                            <p class="card-text">{{ $obr->plan_enderecos->bairro }}, {{ $obr->plan_enderecos->rua}} Nº {{ $obr->plan_enderecos->numero }}</p>
                            <p class="card-text">{{ \Carbon\Carbon::parse($obr->data_inicio)->format('d/m/Y') }}</p>
                            <a href="{{ $obr->plan_enderecos->maps }}" class="btn btn-primary" target="_blank" >Abrir Maps</a>
                            <a href="{{ route('servico.index', ['obra_id' => $obr->id]) }}" class="btn btn-info">Serviços</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="paginacao">
            <div class="pagination justify-content-center">  {{ $obras->appends($request)->links() }}</div>
             Exibindo {{ $obras->count() }} obra(s) de {{ $obras->total() }} (de {{ $obras->firstItem() }} a {{ $obras->lastItem() }})
         </div>
    </div>
@endsection