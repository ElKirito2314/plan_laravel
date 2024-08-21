@extends('app.layouts.basic')

@section('titulo', $titulo)

@section('bloco_conteudo')
<div class="fundo-claro">
    <div class="titulo-pagina">
        <h1>PROGRESSÃO</h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>SERVIÇOS</th>
                        <th>COZINHA</th>
                        <th>SALA</th>
                        <th>SERVIÇO</th>
                        <th>QUARTO</th>
                        <th>ESCRITÓRIO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" style="background-color: white; color:black;">Massa Corrida</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped bg-primary progress-bar-animated" style="width: 66%;">66%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped bg-primary progress-bar-animated" style="width: 30%;">30%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped bg-primary progress-bar-animated" style="width: 75%;">75%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped bg-primary progress-bar-animated" style="width: 100%;">100%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped bg-primary progress-bar-animated" style="width: 93%;">93%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" style="background-color: white; color:black;">Pintura</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped bg-primary progress-bar-animated" style="width: 26%;">26%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped bg-primary progress-bar-animated" style="width: 64%;">64%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped bg-primary progress-bar-animated" style="width: 21%;">21%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped bg-primary progress-bar-animated" style="width: 100%;">100%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped bg-primary progress-bar-animated" style="width: 50%;">50%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" style="background-color: white; color:black;">Elétrica</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped bg-primary progress-bar-animated" style="width: 12%;">12%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped bg-primary progress-bar-animated" style="width: 32%;">32%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped bg-primary progress-bar-animated" style="width: 54%;">54%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped bg-primary progress-bar-animated" style="width: 75%;">75%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped bg-primary progress-bar-animated" style="width: 0%;">0%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" style="background-color: white; color:black;">Luminárias</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped bg-primary progress-bar-animated" style="width: 65%;">65%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped bg-primary progress-bar-animated" style="width: 72%;">72%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped bg-primary progress-bar-animated" style="width: 12%;">12%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped bg-primary progress-bar-animated" style="width: 80%;">80%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped bg-primary progress-bar-animated" style="width: 22%;">22%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" style="background-color: white; color:black;">Marmoraria</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped bg-primary progress-bar-animated" style="width: 100%;">100%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped bg-primary progress-bar-animated" style="width: 24%;">24%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped bg-primary progress-bar-animated" style="width: 54%;">54%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped bg-primary progress-bar-animated" style="width: 10%;">10%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped bg-primary progress-bar-animated" style="width: 80%;">80%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" style="background-color: white; color:black;">Cerâmicas</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped bg-primary progress-bar-animated" style="width: 0%;">0%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped bg-primary progress-bar-animated" style="width: 0%;">0%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped bg-primary progress-bar-animated" style="width: 0%;">0%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped bg-primary progress-bar-animated" style="width: 0%;">0%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped bg-primary progress-bar-animated" style="width: 0%;">0%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" style="background-color: white; color:black;">Rejunte</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped bg-primary progress-bar-animated" style="width: 20%;">20%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped bg-primary progress-bar-animated" style="width: 1%;">1%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped bg-primary progress-bar-animated" style="width: 30%;">30%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped bg-primary progress-bar-animated" style="width: 100%;">100%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped bg-primary progress-bar-animated" style="width: 93%;">93%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" style="background-color: white; color:black;">Hidráulica</th>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped bg-primary progress-bar-animated" style="width: 22%;">2%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-danger progress-bar-striped bg-primary progress-bar-animated" style="width: 44%;">44%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-success progress-bar-striped bg-primary progress-bar-animated" style="width: 66%;">66%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-warning progress-bar-striped bg-primary progress-bar-animated" style="width: 88%;">88%</div>
                            </div>
                        </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar bg-info progress-bar-striped bg-primary progress-bar-animated" style="width: 99%;">99%</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
