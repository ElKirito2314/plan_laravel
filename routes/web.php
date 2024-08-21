<?php

use App\Http\Middleware\LogAcessoMiddleware;
use App\Mail\MensagemTesteMail;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
        return redirect()->route('login');
})
    ->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])
    ->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])
    ->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])
    ->name('site.contato');  
   
    Auth::routes(['verify' => true]);

    Route::middleware('auth', 'verified')->prefix('/app')->group(function() {
        // Home
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
                ->name('app.home');
        Route::get('/home-cliente', [\App\Http\Controllers\HomeController::class, 'indexCliente'])
                ->name('app.home_cliente');

        // Funcionários
        Route::get('/cadastro', [\App\Http\Controllers\CadastroController::class, 'index'])
                ->name('app.cadastro');
        Route::get('/consulta', [\App\Http\Controllers\ConsultaController::class, 'index'])
                ->name('app.consulta');
        Route::get('/obra-endereco', [\App\Http\Controllers\ObraController::class, 'select'])
                ->name('app.obra');
        Route::get('/retirada', [\App\Http\Controllers\ServicoController::class, 'retirada'])
                ->name('app.retirada');
        Route::get('/disponibilidade', [\App\Http\Controllers\ServicoController::class, 'disponibilidade'])
                ->name('app.disponibilidade');
        Route::get('/obras', [\App\Http\Controllers\ObraController::class, 'list'])
                ->name('app.list.obra');


        // Clientes
        Route::get('/progressao', [\App\Http\Controllers\ProgressaoController::class, 'index'])
                ->name('app.progressao');
        Route::get('/projeto', [\App\Http\Controllers\ProjetoController::class, 'index'])
                ->name('app.projeto');
        Route::get('/ambiente', [\App\Http\Controllers\AmbienteController::class, 'index'])
                ->name('app.ambiente');
        
        //Empregados
        /*
        Route::get('/cadastro/empregado', [\App\Http\Controllers\EmpregadoController::class, 'empregado'])
                ->name('app.cad.empregado');
        Route::post('/cadastro/empregado', [\App\Http\Controllers\EmpregadoController::class, 'salvar'])
                ->name('app.cad.empregado');
        Route::get('/lista/empregado', [\App\Http\Controllers\EmpregadoController::class, 'lista'])
                ->name('app.list.empregado');
        Route::get('/edit/empregado/{id}', [\App\Http\Controllers\EmpregadoController::class, 'editar'])
                ->name('app.edit.empregado');
        Route::get('/excluir/empregado/{id}', [\App\Http\Controllers\EmpregadoController::class, 'excluir'])
                ->name('app.delete.empregado');*/

        Route::resource('empregado', \App\Http\Controllers\EmpregadoController::class);
        
        //EmpregadosFerramentas
        Route::resource('empregado-ferramenta', \App\Http\Controllers\EmpregadoFerramentaController::class);

        //EmpregadosMateriais
        Route::resource('empregado-material', \App\Http\Controllers\EmpregadoMaterialController::class);

        //EmpregadosVeiculos
        Route::resource('empregado-veiculo', \App\Http\Controllers\EmpregadoVeiculoController::class);


        //Endereços
        /*
        Route::get('/cadastro/endereco', [\App\Http\Controllers\EnderecoController::class, 'endereco'])
                ->name('app.cad.endereco');
        Route::post('/cadastro/endereco', [\App\Http\Controllers\EnderecoController::class, 'salvar'])
                ->name('app.cad.endereco');
        Route::get('/lista/endereco', [\App\Http\Controllers\EnderecoController::class, 'lista'])
                ->name('app.list.endereco');
        Route::get('/edit/endereco/{id}', [\App\Http\Controllers\EnderecoController::class, 'editar'])
                ->name('app.edit.endereco');
        Route::get('/excluir/endereco/{id}', [\App\Http\Controllers\EnderecoController::class, 'excluir'])
                ->name('app.delete.endereco');*/

        Route::resource('endereco', \App\Http\Controllers\EnderecoController::class);
        

        //Ferramentas
        /*
        Route::get('/cadastro/ferramenta', [\App\Http\Controllers\FerramentaController::class, 'ferramenta'])
                ->name('app.cad.ferramenta');
        Route::post('/cadastro/ferramenta', [\App\Http\Controllers\FerramentaController::class, 'salvar'])
                ->name('app.cad.ferramenta');
        Route::get('/lista/ferramenta', [\App\Http\Controllers\FerramentaController::class, 'lista'])
                ->name('app.list.ferramenta');
        Route::get('/edit/ferramenta/{id}', [\App\Http\Controllers\FerramentaController::class, 'editar'])
                ->name('app.edit.ferramenta');
        Route::get('/excluir/ferramenta/{id}', [\App\Http\Controllers\FerramentaController::class, 'excluir'])
                ->name('app.delete.ferramenta');*/
        
        Route::resource('ferramenta', \App\Http\Controllers\FerramentaController::class);

        //Materiais
        /*
        Route::get('/cadastro/material', [\App\Http\Controllers\MaterialController::class, 'material'])
                ->name('app.cad.material');
        Route::post('/cadastro/material', [\App\Http\Controllers\MaterialController::class, 'salvar'])
                ->name('app.cad.material');
        Route::get('/lista/material', [\App\Http\Controllers\MaterialController::class, 'lista'])
                ->name('app.list.material');
        Route::get('/edit/material/{id}', [\App\Http\Controllers\MaterialController::class, 'editar'])
                ->name('app.edit.material');
        Route::get('/excluir/material/{id}', [\App\Http\Controllers\MaterialController::class, 'excluir'])
                ->name('app.delete.material');*/
                        
        Route::resource('material', \App\Http\Controllers\MaterialController::class);
        
        //Obras
        Route::resource('obra', \App\Http\Controllers\ObraController::class);

        //Veiculos
        Route::resource('veiculo', \App\Http\Controllers\VeiculoController::class);             

        //Setores
        Route::get('/cadastro/setor', [\App\Http\Controllers\SetorController::class, 'setor'])
                ->name('app.cad.setor');
        Route::post('/cadastro/setor', [\App\Http\Controllers\SetorController::class, 'salvar'])
                ->name('app.cad.setor');
        Route::get('/lista/setor', [\App\Http\Controllers\SetorController::class, 'lista'])
                ->name('app.list.setor');
        Route::get('/excluir/setores/{id}', [\App\Http\Controllers\SetorController::class, 'excluir'])
                ->name('app.delete.setor');                


        //Serviços    
        Route::resource('servico', \App\Http\Controllers\ServicoController::class);
    });

Route::fallback(function(){
    echo 'Caminho inexistente. <a href="'.route('site.index').'">Clique aqui</a> para voltar à página inicial';
});
