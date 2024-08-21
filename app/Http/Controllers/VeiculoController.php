<?php

namespace App\Http\Controllers;
use App\Models\plan_veiculos;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $veiculo = plan_veiculos::paginate(2);
        return view('app.list.veiculo', ['titulo' => 'Listagem de Veículos', 'veiculo' => $veiculo, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cad.veiculo', ['titulo' => 'Cadastro de Veículos', 'cadTitulo' => 'Cadastro de Veículos',]);
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
                'modelo' => 'required',
                'fabricante' => 'required',
                'placa' => 'required|min:8|max:8|unique:plan_veiculos'
            ];
    
            $feedback = [
                'required' => 'Preencha o :attribute do veículo',
                'placa.required' => 'Informe a placa do veículo',
                'placa.min' => 'A placa deve ser preenchida deste modo EX:(AAA-1111)',
                'placa.max' => 'A placa deve ser preenchida deste modo EX:(AAA-1111)',
                'placa.unique' => 'Esta placa já está cadastrada no sistema'
            ];
    
            $request->validate($regras, $feedback);
    
            $veiculo = new plan_veiculos();
            $veiculo->fill($request->all());
    
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $veiculo->save();
            }

        return redirect()->route('veiculo.index');
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
        $veiculo = plan_veiculos::find($id);
        return view('app.cad.veiculo', ['titulo' => 'Edição de Veículos', 'cadTitulo' => 'Edição de Veículos', 'veiculo' => $veiculo]);
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
            'modelo' => 'required',
            'fabricante' => 'required',
            'placa' => 'required|min:8|max:8|'
        ];

        $feedback = [
            'required' => 'Preencha o :attribute do veículo',
            'placa.required' => 'Informe a placa do veículo',
            'placa.min' => 'A placa deve ser preenchida deste modo EX:(AAA-1111)',
            'placa.max' => 'A placa deve ser preenchida deste modo EX:(AAA-1111)',
            'placa.unique' => 'Esta placa já está cadastrada no sistema'
        ];

        $request->validate($regras, $feedback);

        $veiculo = plan_veiculos::find($request->input('id'));
        $veiculo = $veiculo->update($request->all());

        return redirect()->route('veiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_veiculos::find($id)->delete();
        return redirect()->route('veiculo.index');
    }
}
