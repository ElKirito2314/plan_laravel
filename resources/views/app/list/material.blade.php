@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Listagem de Materiais</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Marca ou Medida</th>
                        <th>Quantidade</th>
                        <th>Setor</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($material as $mat)
                    <tr>
                        <td>{{ $mat->nome }}</td>
                        <td>{{ $mat->cor }}</td>
                        <td>{{ $mat->marca }}</td>
                        <td>{{ $mat->quantidade }}</td>
                        <td>{{ $mat->plan_setores->nome }}</td>
                        <td>
                            <form id="form_{{$mat->id}}" action="{{ route('material.destroy', $mat->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                            <a href="#" onclick="document.getElementById('form_{{$mat->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                            </form>
                        </td>
                        <td><a href="{{ route('material.edit', $mat->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                <br>
                <div class="paginacao">
                <div class="pagination justify-content-center"> {{ $material->appends($request)->links() }}</div>
                    Exibindo {{ $material->count() }} materiais de {{ $material->total() }} (de {{ $material->firstItem() }} a {{ $material->lastItem() }})
                </div>
        </div>
    
@endsection