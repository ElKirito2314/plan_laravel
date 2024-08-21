@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Disponibilidade dos Materiais</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Retirada</th>
                        <th>Quantidade</th>
                        <th>Destino</th>
                        <th>Responsável</th>
                        <th>Material</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empregadoMaterial as $empMat)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($empMat->data_retirada)->format('d/m/Y') }}</td>
                            <td>{{ $empMat->quantidade }}</td>
                            <td>{{ $empMat->plan_enderecos->bairro ?? '' }}, {{ $empMat->plan_enderecos->rua ?? '' }} Nº {{ $empMat->plan_enderecos->numero ?? 'Endereço removido' }}</td>
                            <td>{{ $empMat->plan_empregados->nome ?? 'Empregado removido' }}</td>
                            <td>{{ $empMat->plan_materiais->nome ?? 'Material removido' }}</td>
                            <td>
                                <form id="form_{{$empMat->id}}" method="post" action="{{ route('empregado-material.destroy', $empMat->id) }}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$empMat->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('empregado-material.edit', $empMat->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginacao">
                <br>
                <div class="pagination justify-content-center"> {{ $empregadoMaterial->appends($request)->links() }}</div>
                    Exibindo {{ $empregadoMaterial->count() }} materiais de {{ $empregadoMaterial->total() }} (de {{ $empregadoMaterial->firstItem() }} a {{ $empregadoMaterial->lastItem() }})
            </div>
        </div>
@endsection