<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class plan_servicos extends Model
{
    protected $table = 'plan_servicos';

    protected $fillable = ['data_inicio', 'atividade', 'responsavel_id', 'obra_id', 'setor_id'];

    public function plan_setores(){
        return $this->belongsTo(plan_setores::class, 'setor_id');
    }

    public function plan_obras(){
        return $this->belongsTo(plan_obras::class, 'obra_id');
    }

    public function plan_empregados(){
        return $this->belongsTo(plan_empregados::class, 'responsavel_id');
    }
}
