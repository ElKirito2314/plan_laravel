<?php

namespace App\Http\Controllers;

use App\Models\plan_empregados;
use App\Models\plan_enderecos;
use App\models\plan_materiais;
use App\Models\plan_empregados_materiais;
use Illuminate\Http\Request;

class EmpregadoMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empregadoMaterial = plan_empregados_materiais::paginate(5);
        return view('app.list.empregado_material', ['titulo' => 'Disponibilidade de Materiais', 'empregadoMaterial' => $empregadoMaterial, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empregadoMaterial = new plan_empregados_materiais();
        $enderecos = plan_enderecos::all();
        $empregados = plan_empregados::all();
        $materiais = plan_materiais::all();
        return view('app.cad.empregado_material', ['titulo' => 'Utilização de Materiais', 'cadTitulo' => 'Utilização de Materiais', 'empregadoMaterial' => $empregadoMaterial, 'enderecos' => $enderecos, 'empregados' => $empregados, 'materiais' => $materiais]);

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
            'quantidade' => 'required',
            'endereco_id' => 'required',
            'empregado_id' => 'required',
            'material_id' => 'required'
        ];

        $feedback = [
            'data_retirada.required' => 'Informe a data de retirada do material',
            'quantidade.required' => 'Informe a quantidade do material a ser retirado',
            'endereco_id.required' => 'Selecione o local de destino do material',
            'empregado_id.required' => 'Selecione o responsável pelo material',
            'material_id.required' => 'Selecione o material utilizado'
            
        ];

        $request->validate($regras, $feedback);

        $empregadoMaterial = new plan_empregados_materiais();
        $empregadoMaterial->fill($request->all());

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $empregadoMaterial->save();
            echo "Material retirado com sucesso";
        }
        
        $material = plan_materiais::find($request->material_id);
        if ($material) {
            $material->quantidade -= $request->quantidade;
            $material->save();
        }

        return redirect()->route('empregado-material.index');
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
        $empregadoMaterial = plan_empregados_materiais::find($id);
        $enderecos = plan_enderecos::all();
        $empregados = plan_empregados::all();
        $materiais = plan_materiais::all();
        return view('app.cad.empregado_material', ['titulo' => 'Utilização de Materiais', 'cadTitulo' => 'Utilização de Materiais', 'empregadoMaterial' => $empregadoMaterial, 'enderecos' => $enderecos, 'empregados' => $empregados, 'materiais' => $materiais]);
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
            'endereco_id' => 'required',
            'empregado_id' => 'required',
            'material_id' => 'required|unique:plan_empregados_materiais'
        ];

        $feedback = [
            'data_retirada.required' => 'Informe a data de retirada do material',
            'endereco_id.required' => 'Selecione o local de destino do material',
            'empregado_id.required' => 'Selecione o responsável pelo material',
            'material_id.required' => 'Selecione o material utilizado'
        ];

        $request->validate($regras, $feedback);

        $empregadoMaterial = plan_empregados_materiais::find($request->input('id'));
        $empregadoMaterial->update($request->all());
        
        return redirect()->route('empregado-material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_empregados_materiais::find($id)->delete();
        return redirect()->route('empregado-material.index');
    }
}
