<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chofer;

class ChoferController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $choferes = Chofer::all();
        return view('chofer.index')->with('choferes',$choferes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chofer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Chofer = new chofer();
        $Chofer->Nombre = $request->get('nombre');
        $Chofer->Apellido_Pat = $request->get('apellido_paterno');
        $Chofer->Apellido_Mat = $request->get('apellido_materno');
        $Chofer->Correo = $request->get('correo');
        $Chofer->Contrasena = $request->get('contrasena');
        $Chofer->save();
        return redirect('/Chofer');
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
        $chofer = Chofer::find($id);
        return view('chofer.edit')->with('chofer',$chofer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Chofer = Chofer::find($id);
        $Chofer->Nombre = $request->get('nombre');
        $Chofer->Apellido_Pat = $request->get('apellido_paterno');
        $Chofer->Apellido_Mat = $request->get('apellido_materno');
        $Chofer->Correo = $request->get('correo');
        $Chofer->Contrasena = $request->get('contrasena');
        $Chofer->save();
        return redirect('/Chofer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Chofer = Chofer::find($id);
        $Chofer->delete();
        return redirect('/Chofer');
    }
}
