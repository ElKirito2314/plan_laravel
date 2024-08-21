<?php

namespace App\Http\Controllers;
use App\Models\plan_empregados;
use App\Models\plan_empregados_ferramentas;
use App\Models\plan_ferramentas;
use App\Models\plan_enderecos;
use Illuminate\Http\Request;

class EmpregadoFerramentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empregadoFerramenta = plan_empregados_ferramentas::paginate(5);
        return view('app.list.empregado_ferramenta', ['titulo' => 'Disponibilidade de Ferramentas', 'empregadoFerramenta' => $empregadoFerramenta, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empregadoFerramenta = new plan_empregados_ferramentas();
        $enderecos = plan_enderecos::all();
        $empregados = plan_empregados::all();
        $ferramentas = plan_ferramentas::all();
        return view('app.cad.empregado_ferramenta', ['titulo' => 'Utilização de Ferramentas', 'cadTitulo' => 'Utilização de Ferramentas', 'empregadoFerramenta' => $empregadoFerramenta, 'enderecos' => $enderecos, 'empregados' => $empregados, 'ferramentas' => $ferramentas]);
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
            'endereco_id' => 'required',
            'empregado_id' => 'required',
            'ferramenta_id' => 'required|unique:plan_empregados_ferramentas'
        ];

        $feedback = [
            'data_retirada.required' => 'Informe a data de retirada da ferramenta',
            'endereco_id.required' => 'Selecione o local de destino da ferramenta',
            'empregado_id.required' => 'Selecione o responsável pela ferramenta',
            'ferramenta_id.required' => 'Selecione a ferramenta utilizada',
            'ferramenta_id.unique' => 'Esta ferramenta já está em uso'
        ];

        $request->validate($regras, $feedback);

        $empregadoFerramenta = new plan_empregados_ferramentas();
        $empregadoFerramenta->fill($request->all());

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $empregadoFerramenta->save();
            echo "Ferramenta retirada com sucesso";
        }

        return redirect()->route('empregado-ferramenta.create');
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
        $empregadoFerramenta = plan_empregados_ferramentas::find($id);
        $enderecos = plan_enderecos::all();
        $empregados = plan_empregados::all();
        $ferramentas = plan_ferramentas::all();
        return view('app.cad.empregado_ferramenta', ['titulo' => 'Utilização de Ferramentas', 'cadTitulo' => 'Utilização de Ferramentas', 'empregadoFerramenta' => $empregadoFerramenta, 'enderecos' => $enderecos, 'empregados' => $empregados, 'ferramentas' => $ferramentas]);
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
            'ferramenta_id' => 'required|unique:plan_empregados_ferramentas'
        ];

        $feedback = [
            'data_retirada.required' => 'Informe a data de retirada da ferramenta',
            'endereco_id.required' => 'Selecione o local de destino da ferramenta',
            'empregado_id.required' => 'Selecione o responsável pela ferramenta',
            'ferramenta_id.required' => 'Selecione a ferramenta a ser substituida',
            'ferramenta_id.unique' => 'Esta ferramenta já está em uso'
        ];

        $request->validate($regras, $feedback);

        $empregadoFerramenta = plan_empregados_ferramentas::find($request->input('id'));
        $empregadoFerramenta->update($request->all());
            
        return redirect()->route('empregado-ferramenta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_empregados_ferramentas::find($id)->delete();
        return redirect()->route('empregado-ferramenta.index');
    }
}
