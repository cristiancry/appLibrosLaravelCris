<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sexo;

class SexoController extends Controller
{
    public function index()
    {
        $sexos = Sexo::orderBy('cod_sexo', 'ASC')->get();
    

        return view('sexos.index', ['data' => $sexos]);
    }
}
