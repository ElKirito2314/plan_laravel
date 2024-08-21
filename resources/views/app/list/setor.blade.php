@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Listagem de Setores</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Setor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($setor as $set)
                    <tr>
                        <td>{{ $set->nome }}</td>
                        <td>X E</td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection