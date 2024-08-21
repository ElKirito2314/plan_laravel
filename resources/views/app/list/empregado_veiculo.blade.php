@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')

    <div class="titulo-pagina">
        <h1>Disponibilidade dos Veículos</h1>
    </div>
        <div class="informacao-pagina">
            <table>
                <thead>
                    <tr>
                        <th>Retirada</th>
                        <th>Responsável</th>
                        <th>Veículo</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empregadoVeiculo as $empVeic)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($empVeic->data_retirada)->format('d/m/Y') }}</td>
                            <td>{{ $empVeic->plan_empregados->nome ?? 'Empregado removido' }}</td>
                            <td>{{ $empVeic->plan_veiculos->fabricante ?? 'Veículo removido' }} - {{ $empVeic->plan_veiculos->modelo }} - {{ $empVeic->plan_veiculos->placa }}</td>
                            <td>
                                <form id="form_{{$empVeic->id}}" method="post" action="{{ route('empregado-veiculo.destroy', $empVeic->id) }}">
                                    @method('DELETE')
                                    @csrf
                                <a href="#" onclick="document.getElementById('form_{{$empVeic->id}}').submit()"><i class="bi bi-x-square-fill" style="color: #042d62"></i></a>
                                </form>
                            </td>
                            <td><a href="{{ route('empregado-veiculo.edit', $empVeic->id) }}"><i class="bi bi-pencil-square" style="color: #042d62"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginacao">
                <br>
                <div class="pagination justify-content-center"> {{ $empregadoVeiculo->appends($request)->links() }}</div>
                    Exibindo {{ $empregadoVeiculo->count() }} veículos de {{ $empregadoVeiculo->total() }} (de {{ $empregadoVeiculo->firstItem() }} a {{ $empregadoVeiculo->lastItem() }})
            </div>
        </div>
@endsection