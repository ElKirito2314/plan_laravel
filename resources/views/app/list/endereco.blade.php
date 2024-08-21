@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Listagem de Endereços</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Proprietário</th>
                        <th>Bairro</th>
                        <th>CEP</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($endereco as $end)
                        <tr>
                            <td>{{ $end->proprietario }}</td>
                            <td>{{ $end->bairro }}</td>
                            <td>{{ $end->cep }}</td>
                            <td>{{ $end->rua }}</td>
                            <td>{{ $end->numero }}</td>
                            <td>
                                <form id="form_{{$end->id}}" method="POST" action="{{ route('endereco.destroy', $end->id) }}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$end->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('endereco.edit', $end->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginacao">
                <br>
                <div class="pagination justify-content-center"> {{ $endereco->appends($request)->links() }}</div>
                    Exibindo {{ $endereco->count() }} endereços de {{ $endereco->total() }} (de {{ $endereco->firstItem() }} a {{ $endereco->lastItem() }})
                </div>
        </div>
    
@endsection