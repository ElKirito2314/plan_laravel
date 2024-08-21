<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class plan_empregados_materiais extends Model
{
    protected $table = 'plan_empregados_materiais';
    protected $fillable = ['data_retirada', 'quantidade', 'endereco_id', 'empregado_id', 'material_id'];

    public function plan_empregados(){
        return $this->belongsTo(plan_empregados::class, 'empregado_id');
    }

    public function plan_materiais(){
        return $this->belongsTo(plan_materiais::class, 'material_id');
    }

    public function plan_enderecos(){
        return $this->belongsTo(plan_enderecos::class, 'endereco_id');
    }
}
