<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plan_materiais;
use App\Models\plan_setores;

class MaterialController extends Controller
{
    public function material() 
    {
        $material = new plan_materiais();
        $setores = plan_setores::all();
        return view('app.cad.material', ['titulo' => 'Cadastro de Materiais', 'setores' => $setores, 'material' => $material]);
    }

    public function salvar(Request $request)
    {
        if($request->input('_token') != '' && $request->input('id') == '')
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
        }

        if($request->input('_token') != '' && $request->input('id') != '')
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
            $update = $material->update($request->all());

            if($update)
            {
                echo "Atualizado com sucesso";
            }
            else
            {
                echo "Falha na atualização";
            }

            $setores = plan_setores::all();
            return redirect()->route('app.edit.material', ['titulo' => 'Edição de Materiais', 'id' => $request->input('id'), 'setores' => $setores, 'material' => $material]);
        }

        $material = new plan_materiais();
        $setores = plan_setores::all();
        return view('app.cad.material', ['titulo' => 'Cadastro de Materiais', 'setores' => $setores, 'material' => $material]);
    }

    public function lista(Request $request)
    {
        $material = plan_materiais::paginate(3);
        return view('app.list.material', ['titulo' => 'Listagem de Materiais', 'material' => $material, 'request' => $request->all()]);
    }

    public function editar($id)
    {
        $material = plan_materiais::find($id);
        $setores = plan_setores::all();

        return view('app.cad.material', ['titulo' => 'Edição de Materiais', 'setores' => $setores, 'material' => $material]);
    }

    public function excluir($id)
    {
        plan_materiais::find($id)->delete();

        return redirect()->route('app.list.material');
    }
}
