@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Listagem de Empregados</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Nascimento</th>
                        <th>Ingresso</th>
                        <th>Função</th>
                        <th>Setor</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empregado as $emp)
                        <tr>
                            <td>{{ $emp->nome }}</td>
                            <td>{{ $emp->cpf }}</td>
                            <td>{{ $emp->telefone }}</td>
                            <td>{{ \Carbon\Carbon::parse($emp->nascimento)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($emp->data_de_ingresso)->format('d/m/Y') }}</td>
                            <td>{{ $emp->funcao }}</td>
                            <td>{{ $emp->plan_setores->nome ?? ''}}</td>
                            <td>
                                <form id="form_{{$emp->id}}" method="post" action="{{ route('empregado.destroy', $emp->id) }}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$emp->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('empregado.edit', $emp->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <br>
                <div class="paginacao">
                   <div class="pagination justify-content-center">  {{ $empregado->appends($request)->links() }}</div>
                    Exibindo {{ $empregado->count() }} empregado(s) de {{ $empregado->total() }} (de {{ $empregado->firstItem() }} a {{ $empregado->lastItem() }})
                </div>
        </div>
@endsection