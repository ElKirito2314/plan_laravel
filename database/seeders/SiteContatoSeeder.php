<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContato::create([
            'nome' => 'Lucas Augusto',
            'telefone' => '(11)912899041',
            'email' => 'lusquinhapg@gmail.com',
            'motivo_contato' => 1,
            'mensagem' => 'Termina esse bagulho logo ai baiano'
        ]);
    }
}
