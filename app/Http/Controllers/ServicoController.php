<?php

namespace App\Http\Controllers;
use App\Mail\NovoServicoMail;
use App\Models\plan_servicos;
use App\Models\plan_obras;
use App\Models\plan_empregados;
use App\Models\plan_setores;
use Mail;
use Illuminate\Http\Request;

class ServicoController extends Controller
{    
    public function retirada()
    {
        return view('app.cad.retirada', ['titulo' => 'Retiradas', 'cadTitulo' => 'O que você deseja retirar?']);
    }

    public function disponibilidade()
    {
        return view('app.list.disponibilidade', ['titulo' => 'Disponibilidades', 'cadTitulo' => 'O que você deseja verificar?']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $obra_id = $request->input('obra_id');
            if($obra_id) 
            {
                $servico = plan_servicos::where('obra_id', $obra_id)->paginate(3);
                $responsavel = plan_empregados::all();
            } 
            else 
            {
                $servico = plan_servicos::paginate(3);
                $responsavel = plan_empregados::all();
            }
        return view('app.list.servico', ['titulo' => 'Listagem de Serviços', 'servico' => $servico, 'responsavel' => $responsavel, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servico = new plan_servicos();
        $responsavel = plan_empregados::all();
        $obras = plan_obras::all();
        $setores = plan_setores::all();
        return view('app.cad.servico', ['titulo' => 'Cadastro de Serviços', 'cadTitulo' => 'Cadastro de Serviços', 'responsavel' => $responsavel, 'obras' => $obras, 'setores' => $setores, 'servico' => $servico]);
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
            'data_inicio' => 'required',
            'atividade' => 'required',
            'responsavel_id' => 'required',
            'obra_id' => 'required',
            'setor_id' => 'required',
        ];
    
        $feedback = [
            'required' => 'Preencha a :attribute, por favor!',
            'data_inicio.required' => 'Informe o início do serviço',
            'atividade.required' => 'Informe o que será realizado',
            'responsavel_id.required' => 'Informe o responsável pelo serviço',
            'setor_id.required' => 'Informe o setor responsável pelo serviço',
        ];
    
        $request->validate($regras, $feedback);
    
        $servico = new plan_servicos();
        $servico->fill($request->all());
        $servico->save();
        $destinatario = auth()->user()->email;
        Mail::to($destinatario)->send(new NovoServicoMail($servico));
    

    
        return redirect()->route('servico.index');
    }
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servico = plan_servicos::find($id);
        $setores = plan_setores::all();
        $obras = plan_obras::all();
        $responsavel = plan_empregados::all();

        return view('app.cad.servico', ['titulo' => 'Edição de Serviços', 'cadTitulo' => 'Edição de Serviços', 'responsavel' => $responsavel, 'obras' => $obras,  'setores' => $setores, 'servico' => $servico]);
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
            'data_inicio' => 'required',
            'atividade' => 'required',
            'responsavel_id' => 'required',
            'obra_id' => 'required',
            'setor_id' => 'required'
        ];
    
        $feedback = [
            'required' => 'Preencha a :attribute, por favor!',
            'data_inicio.required' => 'Informe o início do serviço',
            'atividade.required' => 'Informe o que será realizado',
            'responsavel_id.required' => 'Informe o responsável pelo serviço',
            'setor_id.required' => 'Informe o setor responsável pelo serviço',
        ];
    
        $request->validate($regras, $feedback);
    
        $servico = plan_servicos::find($id);
        $servico->fill($request->all());

        $servico->save();
    
        return redirect()->route('servico.index');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        plan_servicos::find($id)->delete();
        return redirect()->route('servico.index');
    }
}
