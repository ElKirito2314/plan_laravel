<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class plan_veiculos extends Model
{
    protected $table = 'plan_veiculos';
    protected $fillable = ['modelo', 'fabricante', 'placa'];
}
