<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\plan_empregados;

class EmpregadosSeeder extends Seeder
{

    public function run()
    {
        plan_empregados::create([
            'nome' => 'João da Silva',
            'cpf' =>  '11222885522',
            'telefone' => '(11)999999999',
            'nascimento' => '1990-12-12',
            'data_de_ingresso' => '2024-04-26',
            'funcao' => 'Pintor Chefe',
            'setor_id' => '3'
        ]);
    }
}
