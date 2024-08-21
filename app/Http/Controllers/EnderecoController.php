<?php

namespace App\Http\Controllers;
use App\Models\plan_enderecos;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $endereco = plan_enderecos::paginate(3);

        return view('app.list.endereco', ['titulo' => 'Listagem de Endereços', 'endereco' => $endereco, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $endereco = new plan_enderecos();
        return view('app.cad.endereco', ['titulo' => 'Cadastro de Endereços', 'cadTitulo' => 'Cadastro de Endereços', 'endereco' => $endereco]);
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
                'proprietario' => 'required',
                'bairro' => 'required',
                'cep' => 'required|min:9|max:9',
                'rua' => 'required',
                'numero' => 'required',
                'maps' => 'required'
            ];
            $feedback = [
                'proprietario.required' => 'Informe o :attribute do imóvel',
                'bairro.required' => 'Informe o :attribute, por favor!',
                'rua.required' => 'Informe a :attribute, por favor!',
                'numero.required' => 'Informe o número do imóvel',
                'cep.required' => 'Informe o CEP do endereço',
                'cep.min' => 'O :attribute deve ser preenchido desta forma EX:(43210-123)',
                'cep.max' => 'O :attribute deve ser preenchido desta forma EX:(43210-123)',
                'maps.required' => 'Insira o link do MAPS, por favor!'
            ];
    
            $request->validate($regras, $feedback);
    
            $endereco = new plan_enderecos();
            $endereco->fill($request->all());
    
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $endereco->save();
            }
        
        return redirect()->route('endereco.index');
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
        $endereco = plan_enderecos::find($id);
        return view('app.cad.endereco', ['titulo' => 'Edição de Endereços', 'cadTitulo' => 'Edição de Endereços', 'endereco' => $endereco]);
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
            'proprietario' => 'required',
            'bairro' => 'required',
            'cep' => 'required|min:9|max:9',
            'rua' => 'required',
            'numero' => 'required',
            'maps' => 'required'
        ];

        $feedback = [
            'proprietario.required' => 'Informe o :attribute do imóvel',
            'bairro.required' => 'Informe o :attribute, por favor!',
            'rua.required' => 'Informe a :attribute, por favor!',
            'numero.required' => 'Informe o número do imóvel',
            'cep.required' => 'Informe o CEP do endereço',
            'cep.min' => 'O :attribute deve ser preenchido desta forma EX:(43210-123)',
            'cep.max' => 'O :attribute deve ser preenchido desta forma EX:(43210-123)',
            'maps.required' => 'Insira o link do MAPS, por favor!'
        ];

        $request->validate($regras, $feedback);
        
        $endereco = plan_enderecos::find($request->input('id'));
        $endereco->update($request->all());
    
        return redirect()->route('endereco.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_enderecos::find($id)->delete();
        return redirect()->route('endereco.index');
    }
}
