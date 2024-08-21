<?php

namespace App\Http\Controllers;
use App\Models\plan_materiais;
use App\Models\plan_setores;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $material = plan_materiais::paginate(3);
        return view('app.list.material', ['titulo' => 'Listagem de Materiais', 'material' => $material, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $material = new plan_materiais();
        $setores = plan_setores::all();
        return view('app.cad.material', ['titulo' => 'Cadastro de Materiais', 'cadTitulo' => 'Cadastro de Materiais', 'setores' => $setores, 'material' => $material]);
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
                'nome' => 'required',
                'cor' => 'required',
                'marca' => 'required',
                'quantidade' => 'required',
                'setor_id' => 'required'
            ];
    
            $feedback = [
                'required' => 'Informe a :attribute do material',
                'nome.required' => 'Preencha o :attribute do material',
                'setor_id.required' => 'Informe o setor responsável pelo material'
            ];
    
            $request->validate($regras, $feedback);
    
            $material = new plan_materiais();
            $material->fill($request->all());
    
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $material->save();
            }
        
        return redirect()->route('material.index');
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
        $material = plan_materiais::find($id);
        $setores = plan_setores::all();

        return view('app.cad.material', ['titulo' => 'Edição de Materiais', 'cadTitulo' => 'Edição de Materiais', 'setores' => $setores, 'material' => $material]);
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
            'nome' => 'required',
            'cor' => 'required',
            'marca' => 'required',
            'quantidade' => 'required',
            'setor_id' => 'required'
        ];

        $feedback = [
            'required' => 'Informe a :attribute do material',
            'nome.required' => 'Preencha o :attribute do material',
            'setor_id.required' => 'Informe o setor responsável pelo material'
        ];

        $request->validate($regras, $feedback);

        $material = plan_materiais::find($request->input('id'));
        $material = $material->update($request->all());
    
        return redirect()->route('material.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_materiais::find($id)->delete();
        return redirect()->route('material.index');
    }
}
