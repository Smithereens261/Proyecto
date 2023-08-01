<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;

class RutaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $rutas = Ruta::all();
        return view('Ruta.index')->with('rutas', $rutas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastRuta = Ruta::orderByDesc('Id')->first();
        $nextId = $lastRuta ? $lastRuta->Id + 1 : 1;
        return view('Ruta.create', ['nextId' => $nextId]);
    }
    
    public function store(Request $request)
    {
        $ruta = new Ruta();
        $ruta->Id = $request->get('Id');
        $ruta->Nombre = $request->get('nombre');
        // Guardar otros campos necesarios para la tabla 'rutas'
        $ruta->save();
        return redirect('/Ruta')->with('success', 'Ruta creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ruta = Ruta::find($id);
        return view('Ruta.show')->with('ruta', $ruta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $ruta = Ruta::find($id);
    return view('Ruta.edit', ['ruta' => $ruta]);
}

public function update(Request $request, $id)
{
    $ruta = Ruta::find($id);
    $ruta->Nombre = $request->get('nombre');
    // Actualizar otros campos necesarios para la tabla 'rutas'
    $ruta->save();
    return redirect('/Ruta')->with('success', 'Ruta actualizada correctamente.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruta = Ruta::find($id);
        $ruta->delete();
        return redirect('/Ruta'); // Ajusta la redirección según la ruta correcta
    }
}
