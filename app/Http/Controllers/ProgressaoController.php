<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressaoController extends Controller
{
    public function index() {
        return view('app.progressao', ['titulo' => 'Progressão']);
    }
}
