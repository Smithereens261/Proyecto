<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grafica;

class GraficaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $graficas = Grafica::all();
        return view('grafica.index')->with('graficas', $graficas);
    }
}
