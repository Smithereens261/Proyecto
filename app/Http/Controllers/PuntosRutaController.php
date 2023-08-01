<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuntosRutum;
use App\Models\Ruta;

class PuntosRutaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $puntosRutas = PuntosRutum::all();
        return view('PuntosRuta.index')->with('puntosRutas', $puntosRutas);
    }

    public function create()
    {
        $rutas = Ruta::all();
        return view('Puntosruta.create', ['rutas' => $rutas]);
    }

    public function store(Request $request)
    {
        $puntosRutas = new PuntosRutum();
        $puntosRutas->lat = $request->input('lat');
        $puntosRutas->long = $request->input('long');
        $puntosRutas->ruta = $request->input('ruta');
        $puntosRutas->save();
        return redirect('/Puntosruta')->with('success', 'Punto de Ruta creado correctamente.');
    }
    

    public function show($id)
    {
        $puntoRuta = PuntosRutum::find($id);
        return view('PuntosRuta.show')->with('puntoRuta', $puntoRuta);
    }

    public function edit($id)
    {
        $puntoRuta = PuntosRutum::find($id);
        $rutas = Ruta::all();
        return view('PuntosRuta.edit', ['puntoRuta' => $puntoRuta, 'rutas' => $rutas]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'lat' => 'required',
        'long' => 'required',
        'ruta' => 'required',
        // Add other necessary validations for the remaining fields
    ]);

    $puntoRuta = PuntosRutum::find($id);
    $puntoRuta->lat = $request->input('lat');
    $puntoRuta->long = $request->input('long');
    $puntoRuta->ruta = $request->input('ruta');
    // Update other necessary fields for the 'puntos_rutas' table
    $puntoRuta->save();
    return redirect('/Puntosruta')->with('success', 'Punto de Ruta actualizado correctamente.');
}
    public function destroy($id)
    {
        $puntoRuta = PuntosRutum::find($id);
        $puntoRuta->delete();
        return redirect('/Puntosruta'); // Ajusta la redirección según la ruta correcta
    }
}
