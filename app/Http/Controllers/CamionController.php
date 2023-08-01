<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camion;
use App\Models\Chofer;

class CamionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $camiones = Camion::with('chofer')->get(); // Cargar relación con choferes
        return view('camion.index')->with('camiones', $camiones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $choferes = Chofer::all(); // Obtener la lista de choferes disponibles
        return view('camion.create')->with('choferes', $choferes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $camion = new Camion();
        $camion->Codigo = $request->get('codigo');
        $camion->Operando = $request->get('operando');
        $camion->Matricula = $request->get('matricula');
        $camion->Choferes = $request->get('choferes');
        $camion->Ubicacion = $request->get('ubicacion');
        $camion->save();
        return redirect('/Camion'); // Ajusta la redirección según la ruta correcta
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
        $camion = Camion::find($id);
        $choferes = Chofer::all(); // Obtener la lista de choferes disponibles
        return view('camion.edit')->with('camion', $camion)->with('choferes', $choferes);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $camion = Camion::find($id);
        $camion->Codigo = $request->get('codigo');
        $camion->Operando = $request->get('operando');
        $camion->Matricula = $request->get('matricula');
        $camion->Choferes = $request->get('choferes');
        $camion->Ubicacion = $request->get('ubicacion');

        // Verificar si el chofer está operando otro camión
        if ($camion->Operando == 1) {
            $chofer = Chofer::find($camion->Choferes);
            $camion = Camion::where('Choferes', $chofer->Numero)->where('Operando', 1)->first();
            if ($camion && $camion->Codigo !== $camion->Codigo) {
                // El chofer ya está operando otro camión
                return redirect('/Camion')->with('error', 'El chofer ya está operando otro camión. No se pudo actualizar.');
            }
        }

        $camion->save();
        return redirect('/Camion')->with('success', 'Camión actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $camion = Camion::find($id);
        $camion->delete();
        return redirect('/Camion'); // Ajusta la redirección según la ruta correcta
    }
}
