<?php

namespace App\Http\Controllers;

use App\Models\plan_setores;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function setor()
    {
        return view('app.cad.setor', ['titulo' => 'Cadastro de Setores']);
    }

    public function salvar(Request $request)
    {
        if($request->input('_token') != '')
        {
            $regras = [
                'nome' => 'required|unique:plan_setores'
            ];
    
            $feedback = [
                'required' => 'Insira o :attribute do setor, por favor!'
            ];
    
            $request->validate($regras, $feedback);
    
            $setor = new plan_setores();
            $setor->fill($request->all());
    
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $setor->save();
            }
            return view('app.cad.setor', ['titulo' => 'Cadastro de Setores']);
        }
    }

    public function lista()
    {
        $setor = plan_setores::all();
        return view('app.list.setor', ['titulo' => 'Listagem de Setores', 'setor' => $setor]);
    }
}
