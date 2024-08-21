@extends('site.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div class="informacao-pagina">
                <div class="contato-principal">
                    @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivo_contatos' => $motivo_contatos])
                    <b>A nossa equipe retornará dentro de 72 horas</b>
                    @endcomponent
                </div>
            </div>  
        </div>
@endsection