<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class plan_setores extends Model
{
    protected $table = 'plan_setores';
    protected $fillable = ['nome'];

}
