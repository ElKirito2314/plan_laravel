@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="fundo-claro">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Acesso negado</div>
        
                        <div class="card-body">
                            Desculpe. Você não possui acesso a este recurso.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection