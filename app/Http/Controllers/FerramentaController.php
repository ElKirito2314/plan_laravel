<?php

namespace App\Http\Controllers;
use App\Models\plan_ferramentas;
use \App\Models\plan_setores;
use Illuminate\Http\Request;

class FerramentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ferramenta =  plan_ferramentas::paginate(3);
        return view('app.list.ferramenta', ['titulo' => 'Listagem de ferramentas', 'ferramenta' => $ferramenta, 'request' => $request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ferramenta = new plan_ferramentas();
        $setores = plan_setores::all();
        return view('app.cad.ferramenta', ['titulo' => 'Cadastro de Ferramentas', 'cadTitulo' => 'Cadastro de Ferramentas', 'setores' => $setores, 'ferramenta' => $ferramenta]);
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
                'condicao' => 'required',
                'setor_id' => 'required'
            ];
    
            $feedback = [
                'required' => 'Informe a :attribute da ferramenta',
                'condicao.required' => 'Informe a condição da ferramenta',
                'nome.required' => 'Preencha o :attribute da ferramenta',
                'setor_id.required' => 'Informe o setor responsável pela ferramenta'
            ];
    
            $request->validate($regras, $feedback);
    
            $ferramenta = new plan_ferramentas();
            $ferramenta->fill($request->all());
    
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $ferramenta->save();
            }

        return redirect()->route('ferramenta.index');
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
        $ferramenta = plan_ferramentas::find($id);
        $setores = plan_setores::all();

        return view('app.cad.ferramenta', ['titulo' => 'Edição de Ferramentas', 'cadTitulo' => 'Edição de Ferramentas', 'setores' => $setores, 'ferramenta' => $ferramenta]);
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
            'condicao' => 'required',
            'setor_id' => 'required'
        ];

        $feedback = [
            'required' => 'Informe a :attribute da ferramenta',
            'condicao.required' => 'Informe a condição da ferramenta',
            'nome.required' => 'Preencha o :attribute da ferramenta',
            'setor_id.required' => 'Informe o setor responsável pela ferramenta'
        ];

        $request->validate($regras, $feedback);

        $ferramenta = plan_ferramentas::find($request->input('id'));
        $ferramenta = $ferramenta->update($request->all());

        return redirect()->route('ferramenta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_ferramentas::find($id)->delete();
        return redirect()->route('ferramenta.index');
    }
}
