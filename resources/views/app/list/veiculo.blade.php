@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Listagem de Veículos</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Fabricante</th>
                        <th>Placa</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veiculo as $veic)
                    <tr>
                        <td>{{ $veic->modelo }}</td>
                        <td>{{ $veic->fabricante }}</td>
                        <td>{{ $veic->placa }}</td>
                        <td>
                            <form id="form_{{$veic->id}}" method="POST" action="{{ route('veiculo.destroy', $veic->id) }}">
                                @method('DELETE')
                                @csrf
                            <a href="#" onclick="document.getElementById('form_{{$veic->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                            </form>
                        </td>
                        <td><a href="{{ route('veiculo.edit', $veic->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
                <br>
                    <div class="paginacao">
                    <div class="pagination justify-content-center"> {{ $veiculo->appends($request)->links() }}</div>
                    Exibindo {{ $veiculo->count() }} veículos de {{ $veiculo->total() }} (de {{ $veiculo->firstItem() }} a {{ $veiculo->lastItem() }})</div>
        </div>

@endsection