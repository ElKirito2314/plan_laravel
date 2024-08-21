<?php

namespace App\Http\Controllers;
use \App\Models\plan_empregados;
use \App\Models\plan_setores;

use Illuminate\Http\Request;

class EmpregadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empregado = plan_empregados::paginate(5);
        return view('app.list.empregado', ['titulo' => 'Lista de Empregados', 'empregado' => $empregado, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $empregado = new plan_empregados();
        $setores = plan_setores::all();
        return view('app.cad.empregado', ['titulo' => 'Cadastro de Empregados', 'cadTitulo' => 'Cadastro de Empregados', 'setores' => $setores, 'empregado' => $empregado]);
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
                'cpf' => 'required|min:11|max:11|unique:plan_empregados',
                'telefone' => 'required|min:12|max:13',
                'nascimento' => 'required',
                'data_de_ingresso' => 'required',
                'funcao' => 'required',
                'setor_id' => 'required'
            ];
    
            $feedback = [
                'required' => 'Preencha o seu :attribute, por favor!',
                'nascimento.required' => 'Insira a data do seu nascimento',
                'data_de_ingresso.required' => 'Insira a data do seu ingresso',
                'funcao.required' => 'Informe a sua função',
                'setor_id.required' => 'Informe o seu setor',
                'telefone.required' => 'O preenchimento do seu :attribute é obrigatório!',
                'telefone.min' => 'O :attribute deve ser preenchido deste modo EX: (11)987654321',
                'telefone.max' => 'O :attribute deve ser preenchido deste modo EX: (11)987654321',
                'cpf.min' => 'Preencha corretamente os dígitos do seu :attribute',
                'cpf.max' => 'Preencha corretamente os dígitos do seu :attribute',
                'cpf.unique' => 'Este CPF já está cadastrado no sistema'
            ];
    
            $request->validate($regras, $feedback);
    
            $empregado = new plan_empregados();
            $empregado->fill($request->all());
    
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $empregado->save();
            }

        return redirect()->route('empregado.index');
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
        $empregado = plan_empregados::find($id);
        $setores = plan_setores::all();

        return view('app.cad.empregado', ['titulo' => 'Edição de Empregados', 'cadTitulo' => 'Edição de Empregados', 'setores' => $setores, 'empregado' => $empregado ]);
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
            'cpf' => 'required|min:11|max:11|',
            'telefone' => 'required|min:12|max:13',
            'nascimento' => 'required',
            'data_de_ingresso' => 'required',
            'funcao' => 'required',
            'setor_id' => 'required'
        ];

        $feedback = [
            'required' => 'Preencha o seu :attribute, por favor!',
            'nascimento.required' => 'Insira a data do seu nascimento',
            'data_de_ingresso.required' => 'Insira a data do seu ingresso',
            'funcao.required' => 'Informe a sua função',
            'setor_id.required' => 'Informe o seu setor',
            'telefone.required' => 'O preenchimento do seu :attribute é obrigatório!',
            'telefone.min' => 'O :attribute deve ser preenchido deste modo EX: (11)987654321',
            'telefone.max' => 'O :attribute deve ser preenchido deste modo EX: (11)987654321',
            'cpf.min' => 'Preencha corretamente os dígitos do seu :attribute',
            'cpf.max' => 'Preencha corretamente os dígitos do seu :attribute',
            'cpf.unique' => 'Este CPF já está cadastrado no sistema'
        ];

        $request->validate($regras, $feedback);

        $empregado = plan_empregados::find($request->input('id'));
        $empregado->update($request->all());

        return redirect()->route('empregado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_empregados::find($id)->delete();
        return redirect()->route('empregado.index');
    }
}
