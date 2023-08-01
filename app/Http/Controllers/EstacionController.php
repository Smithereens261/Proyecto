<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estacione;
use App\Models\Ruta;

class EstacionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $estaciones = Estacione::all();
        return view('estacion.index')->with('estaciones', $estaciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rutas = Ruta::all();
        $latestStation = Estacione::orderBy('Codigo', 'desc')->first();
        $nextCode = ($latestStation) ? $latestStation->Codigo + 1 : 1;
        
        return view('estacion.create', compact('rutas', 'nextCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $estacion = new Estacione();
    $estacion->Codigo = $request->get('codigo');
    $estacion->Nombre = $request->get('nombre');
    $estacion->Ubicacion = $request->get('ubicacion');
    $estacion->Ruta = $request->get('ruta');
    $estacion->save();

    return redirect('/Estacion');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estacion = Estacione::find($id);
        $rutas = Ruta::all(); 
        return view('estacion.edit', compact('estacion', 'rutas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estacion = Estacione::find($id);
        $estacion->Codigo = $request->get('codigo');
        $estacion->Nombre = $request->get('nombre');
        $estacion->Ubicacion = $request->get('ubicacion');
        $estacion->Ruta = $request->get('ruta');
        $estacion->save();
        return redirect('/Estacion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estacion = Estacione::find($id);
        $estacion->delete();
        return redirect('/Estacion');
    }
}
