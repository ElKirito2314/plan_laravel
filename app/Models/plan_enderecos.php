<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class plan_enderecos extends Model
{
    protected $table = 'plan_enderecos';
    protected $fillable = ['proprietario', 'bairro', 'cep', 'rua', 'numero', 'maps'];

}
