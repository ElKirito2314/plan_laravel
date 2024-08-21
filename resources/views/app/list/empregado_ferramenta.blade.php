@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Disponibilidade das Ferramentas</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Retirada</th>
                        <th>Quantidade</th>
                        <th>Destino</th>
                        <th>Responsável</th>
                        <th>Função</th>
                        <th>Ferramenta</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empregadoFerramenta as $empFerr)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($empFerr->data_retirada)->format('d/m/Y') }}</td>
                            <td>{{ $empFerr->quantidade }}</td>
                            <td>{{ $empFerr->plan_enderecos->bairro ?? '' }}, {{ $empFerr->plan_enderecos->rua ?? '' }} Nº {{ $empFerr->plan_enderecos->numero ?? 'Endereço removido' }}</td>
                            <td>{{ $empFerr->plan_empregados->nome ?? 'Empregado removido' }}</td>
                            <td>{{ $empFerr->plan_empregados->funcao ?? '' }}</td>
                            <td>{{ $empFerr->plan_ferramentas->nome ?? 'Ferramenta removida' }}</td>
                            <td>
                                <form id="form_{{$empFerr->id}}" method="post" action="{{ route('empregado-ferramenta.destroy', $empFerr->id) }}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$empFerr->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('empregado-ferramenta.edit', $empFerr->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginacao">
                <br>
                <div class="pagination justify-content-center"> {{ $empregadoFerramenta->appends($request)->links() }}</div> 
                    Exibindo {{ $empregadoFerramenta->count() }} ferramenta(s) de {{ $empregadoFerramenta->total() }} (de {{ $empregadoFerramenta->firstItem() }} a {{ $empregadoFerramenta->lastItem() }})
            </div>
        </div>
@endsection