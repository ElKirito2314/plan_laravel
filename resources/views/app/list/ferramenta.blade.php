@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Listagem de Ferramentas</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Marca</th>
                        <th>Condição</th>
                        <th>Setor</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ferramenta as $ferr)
                    <tr>
                        <td>{{ $ferr->nome }}</td>
                        <td>{{ $ferr->cor }}</td>
                        <td>{{ $ferr->marca }}</td>
                        <td>{{ $ferr->condicao }}</td>
                        <td>{{ $ferr->plan_setores->nome }}</td>
                        <td>
                            <form id="form_{{$ferr->id}}" method="POST" action="{{ route('ferramenta.destroy', $ferr->id) }}">
                                @method('DELETE')
                                @csrf
                            <a href="#" onclick="document.getElementById('form_{{$ferr->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                            </form>
                        </td>
                        <td><a href="{{ route('ferramenta.edit', $ferr->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginacao">
            <br>
                <div class="pagination justify-content-center"> {{ $ferramenta->appends($request)->links() }}</div>
                    Exibindo {{ $ferramenta->count() }} ferramentas de {{ $ferramenta->total() }} (de {{ $ferramenta->firstItem() }} a {{ $ferramenta->lastItem() }})
                </div>
        </div>
@endsection