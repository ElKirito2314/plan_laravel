<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class plan_materiais extends Model
{
    protected $table = 'plan_materiais';
    protected $fillable = ['nome', 'cor', 'marca', 'quantidade', 'setor_id'];

    public function plan_setores(){
        return $this->belongsTo(plan_setores::class, 'setor_id');
    }
}
