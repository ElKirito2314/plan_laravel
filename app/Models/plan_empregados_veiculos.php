<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class plan_empregados_veiculos extends Model
{
    protected $table = 'plan_empregados_veiculos';
    protected $fillable = ['data_retirada', 'empregado_id', 'veiculo_id'];

    public function plan_empregados(){
        return $this->belongsTo(plan_empregados::class, 'empregado_id');
    }

    public function plan_veiculos(){
        return $this->belongsTo(plan_veiculos::class, 'veiculo_id');
    }
}
