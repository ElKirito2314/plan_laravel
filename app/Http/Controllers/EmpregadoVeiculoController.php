<?php

namespace App\Http\Controllers;

use App\Models\plan_empregados;
use App\Models\plan_empregados_veiculos;
use App\Models\plan_veiculos;
use Illuminate\Http\Request;

class EmpregadoVeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empregadoVeiculo = plan_empregados_veiculos::paginate(5);
        return view('app.list.empregado_veiculo', ['titulo' => 'Disponibilidade de Veículos', 'empregadoVeiculo' => $empregadoVeiculo, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empregadoVeiculo = new plan_empregados_veiculos();
        $veiculos = plan_veiculos::all();
        $empregados = plan_empregados::all();
        return view('app.cad.empregado_veiculo', ['titulo' => 'Utilização de Veículos', 'cadTitulo' => 'Utilização de Veículos', 'empregadoVeiculo' => $empregadoVeiculo, 'veiculos' => $veiculos, 'empregados' => $empregados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'data_retirada' => 'required',
            'empregado_id' => 'required',
            'veiculo_id' => 'required|unique:plan_empregados_veiculos'
        ];

        $feedback = [
            'data_retirada.required' => 'Informe a data de retirada do veículo',
            'empregado_id.required' => 'Selecione o responsável pelo veículo',
            'veiculo_id.required' => 'Selecione o veículo utilizado',
            'veiculo_id.unique' => 'Este veículo já está em uso'
        ];

        $request->validate($regras, $feedback);

        $empregadoVeiculo = new plan_empregados_veiculos();
        $empregadoVeiculo->fill($request->all());

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $empregadoVeiculo->save();
            echo "Veículo retirado com sucesso";
        }

        return redirect()->route('empregado-veiculo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empregadoVeiculo = plan_empregados_veiculos::find($id);
        $veiculos = plan_veiculos::all();
        $empregados = plan_empregados::all();
        return view('app.cad.empregado_veiculo', ['titulo' => 'Utilização de Veículos', 'cadTitulo' => 'Utilização de Veículos', 'empregadoVeiculo' => $empregadoVeiculo, 'empregados' => $empregados, 'veiculos' => $veiculos ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $regras = [
            'data_retirada' => 'required',
            'empregado_id' => 'required',
            'veiculo_id' => 'required|unique:plan_empregados_veiculos'
        ];

        $feedback = [
            'data_retirada.required' => 'Informe a data de retirada do veículo',
            'empregado_id.required' => 'Selecione o responsável pelo veículo',
            'veiculo_id.required' => 'Selecione o veículo utilizado',
            'veiculo_id.unique' => 'Este veículo já está em uso'
        ];

        $request->validate($regras, $feedback);

        $empregadoVeiculo = plan_empregados_veiculos::find($request->input('id'));
        $empregadoVeiculo->update($request->all());

        return redirect()->route('empregado-veiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_empregados_veiculos::find($id)->delete();
        return redirect()->route('empregado-veiculo.index');
    }
}
