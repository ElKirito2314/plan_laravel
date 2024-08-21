@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
    <div class="titulo-pagina">
        <h1>Listagem de Serviços</h1>
    </div>
    <div class="informacao-pagina">
        <table>
            <thead>
                <tr>
                    <th>Início</th>
                    <th>Responsável</th>
                    <th>Atividade</th>
                    <th>Obra</th>
                    <th>Setor</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servico as $serv)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($serv->data_inicio)->format('d/m/Y') }}</td>
                    <td>{{ $serv->plan_empregados->nome ?? 'Empregado removido' }}</td>
                    <td>{{ $serv->atividade }}</td>
                    <td>{{ $serv->plan_obras->nome ?? 'Obra removida' }}</td>
                    <td>{{ $serv->plan_setores->nome ?? 'Setor removido' }}</td>
                    <td>
                        <form id="form_{{$serv->id}}" method="POST" action="{{ route('servico.destroy', $serv->id) }}">
                            @method('DELETE')
                            @csrf
                        <a href="#" onclick="document.getElementById('form_{{$serv->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                        </form>
                    </td>
                    <td><a href="{{ route('servico.edit', $serv->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div class="paginacao">
            <div class="pagination justify-content-center"> {{ $servico->appends($request)->links() }}</div>
            Exibindo {{ $servico->count() }} serviços de {{ $servico->total() }} (de {{ $servico->firstItem() }} a {{ $servico->lastItem() }})
        </div>
    </div>
@endsection
