@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Listagem de Obras</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Início</th>
                        <th>Endereço</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obras as $obr)
                    <tr>
                        <td>{{ $obr->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($obr->data_inicio)->format('d/m/Y') }}</td>
                        <td>{{ $obr->plan_enderecos->bairro }}, {{ $obr->plan_enderecos->rua}} Nº {{ $obr->plan_enderecos->numero }}</td>
                        <td>
                            <form id="form_{{$obr->id}}" method="POST" action="{{ route('obra.destroy', $obr->id) }}">
                                @method('DELETE')
                                @csrf
                            <a href="#" onclick="document.getElementById('form_{{$obr->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                            </form>
                        </td>
                        <td><a href="{{ route('obra.edit', $obr->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                <br>
                <div class="paginacao">
                <div class="pagination justify-content-center"> {{ $obras->appends($request)->links() }}</div>
                    Exibindo {{ $obras->count() }} serviços de {{ $obras->total() }} (de {{ $obras->firstItem() }} a {{ $obras->lastItem() }})</div>
        </div>
@endsection