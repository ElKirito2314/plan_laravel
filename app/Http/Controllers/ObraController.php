<?php

namespace App\Http\Controllers;

use App\Mail\NovaObraMail;
use App\Models\plan_obras;
use App\Models\plan_enderecos;
use Illuminate\Http\Request;
use Mail;

class ObraController extends Controller
{
    public function select()
    {
        return view('app.cad.obra', ['titulo' => 'Cadastro de Obras', 'cadTitulo' => 'Possui endereço cadastrado?']);
    }

    public function list(Request $request)
    {
        $obras = plan_obras::paginate(8);
        $enderecos = plan_enderecos::all();
        return view('app.list.obra', ['titulo' => 'Obras', 'obras' => $obras, 'enderecos' => $enderecos, 'request' => $request->all()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $obras = plan_obras::paginate(8);
        $enderecos = plan_enderecos::all();
        return view('app.obra', ['titulo' => 'Obras', 'obras' => $obras, 'enderecos' => $enderecos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obras = new plan_obras();
        $endereco = plan_enderecos::all();

        return view('app.cad.obra_true', ['titulo' => 'Cadastro de Obras', 'cadTitulo' => 'Cadastro de Obras', 'endereco' => $endereco, 'obras' => $obras]);
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
            'nome' => 'required|unique:plan_obras',
            'data_inicio' => 'required',
            'endereco_id' => 'required',
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240'
        ];
    
        $feedback = [
            'required' => 'Preencha o :attribute, por favor!',
            'data_inicio.required' => 'Informe o início do serviço',
            'endereco_id.required' => 'Informe o endereço do serviço',
            'imagem.required' => 'Insira a imagem, por favor!'
        ];
    
        $request->validate($regras, $feedback);

        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;
    
        $obras = new plan_obras($dados);
        $obras->fill($request->except('imagem'));
        $destinatario = auth()->user()->email;
        Mail::to($destinatario)->send(new NovaObraMail($obras));
    
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            if ($imagem->isValid()) {
                $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
                $imagem->storeAs('public/img/', $imagemNome);
                $obras->imagem = 'img/' . $imagemNome;
            } else {
                return redirect()->back()->withErrors(['imagem' => 'Falha no upload da imagem.']);
            }
        }
    
        $obras->save();
    
        return redirect()->route('obra.index', ['obras' => $obras->id]);
    }
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $obras = plan_obras::find($id);
        $endereco = plan_enderecos::all();
        $user_id = auth()->user()->id;
        if($obras->user_id == $user_id)
        {
            return view('app.cad.obra_true', ['titulo' => 'Edição de Obras', 'cadTitulo' => 'Edição de Obras', 'endereco' => $endereco, 'obras' => $obras]);
        }

        return view('app.acesso_negado', ['titulo' => 'Acesso Negado']);

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
        $obras = plan_obras::find($request->input('id'));
        $user_id = auth()->user()->id;
        if($obras->user_id == $user_id)
        {
            $regras = [
                'nome' => 'required',
                'data_inicio' => 'required',
                'imagem' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
                'endereco_id' => 'required',
            ];
        
            $feedback = [
                'required' => 'Preencha o :attribute, por favor!',
                'data_inicio.required' => 'Informe o início do serviço',
                'endereco_id.required' => 'Informe o endereço do serviço',
            ];
        
            $request->validate($regras, $feedback);

            $obras = plan_obras::find($request->input('id'));
            $obras->update($request->except('imagem'));
        
            if ($request->hasFile('imagem')) {
                $imagem = $request->file('imagem');
                if ($imagem->isValid()) {
                    if ($obras->imagem && file_exists(public_path($obras->imagem))) {
                        unlink(public_path($obras->imagem));
                    }
        
                    $imagemNome = time() . '.' . $imagem->getClientOriginalExtension();
                    $imagem->storeAs('public/img', $imagemNome);
                    $obras->imagem = 'img/' . $imagemNome;
                } else {
                    return redirect()->back()->withErrors(['imagem' => 'Falha no upload da imagem.']);
                }
            }
        
            $obras->save();
        
            return redirect()->route('app.list.obra');
        }

        return view('app.acesso_negado', ['titulo' => 'Acesso Negado']);
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obras = plan_obras::find($id);
        $user_id = auth()->user()->id;
        if($obras->user_id == $user_id)
        {
            plan_obras::find($id)->delete();
            return redirect()->route('app.list.obra');
        }

        return view('app.acesso_negado', ['titulo' => 'Acesso Negado']);
    }
}
