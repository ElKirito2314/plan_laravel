<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan_obras extends Model
{
    protected $table = 'plan_obras';
    protected $fillable = ['nome', 'user_id', 'data_inicio', 'imagem', 'endereco_id'];

    public function plan_enderecos(){
        return $this->belongsTo(plan_enderecos::class, 'endereco_id');
    }
}
