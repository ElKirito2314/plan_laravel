<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function index() {
        return view('app.ambiente', ['titulo' => 'Ambientes']);
    }
}
