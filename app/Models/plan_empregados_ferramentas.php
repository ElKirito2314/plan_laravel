<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class plan_empregados_ferramentas extends Model
{
    protected $table = 'plan_empregados_ferramentas';
    protected $fillable = ['data_retirada', 'endereco_id', 'empregado_id', 'ferramenta_id'];

    public function plan_enderecos(){
        return $this->belongsTo(Plan_enderecos::class, 'endereco_id');
    }

    public function plan_empregados(){
        return $this->belongsTo(Plan_empregados::class, 'empregado_id');
    }
    public function plan_ferramentas(){
        return $this->belongsTo(plan_ferramentas::class, 'ferramenta_id');
    }

}
