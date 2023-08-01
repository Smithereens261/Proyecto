<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recorrido;
use App\Models\Ruta;
use App\Models\Camion;
class RecorridoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $recorridos = Recorrido::all();
        return view('Recorrido.index')->with('recorridos', $recorridos);
    }

    public function create()
    {
        $lastRecorrido = Recorrido::orderByDesc('codigo')->first();
        $nextId = $lastRecorrido ? $lastRecorrido->codigo + 1 : 1;

        $rutas = Ruta::all();
        $camiones = Camion::all();

        return view('Recorrido.create', [
            'nextId' => $nextId,
            'rutas' => $rutas,
            'camiones' => $camiones,
        ]);
    }

    public function store(Request $request)
    {
        $recorrido = new Recorrido();
        $recorrido->codigo = $request->get('codigo');
        $recorrido->Ruta = $request->get('ruta');
        $recorrido->Camion = $request->get('camion');
        $recorrido->Hora_inicio = $request->get('hora_inicio');
        $recorrido->Hora_fin = $request->get('hora_fin');
        $recorrido->Fecha = $request->get('fecha');
        // Guardar otros campos necesarios para la tabla 'recorridos'
        $recorrido->save();
        return redirect('/Recorridos')->with('success', 'Recorrido creado correctamente.');
    }

    public function show(string $id)
    {
        $recorrido = Recorrido::find($id);
        return view('Recorrido.show')->with('recorrido', $recorrido);
    }

    public function edit($id)
    {
        $recorrido = Recorrido::find($id);
        $rutas = Ruta::all();
        $camiones = Camion::all();

        return view('Recorrido.edit', [
            'recorrido' => $recorrido,
            'rutas' => $rutas,
            'camiones' => $camiones,
        ]);
    }

    public function update(Request $request, $id)
    {
        $recorrido = Recorrido::find($id);
        $recorrido->codigo = $request->get('codigo');
        $recorrido->Ruta = $request->get('ruta');
        $recorrido->Camion = $request->get('camion');
        $recorrido->Hora_inicio = $request->get('hora_inicio');
        $recorrido->Hora_fin = $request->get('hora_fin');
        $recorrido->Fecha = $request->get('fecha');
        // Actualizar otros campos necesarios para la tabla 'recorridos'
        $recorrido->save();
        return redirect('/Recorridos')->with('success', 'Recorrido actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $recorrido = Recorrido::find($id);
        $recorrido->delete();
        return redirect('/Recorridos'); // Ajusta la redirección según la ruta correcta
    }
}
