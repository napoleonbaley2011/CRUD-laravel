<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**  
        $validatedData = $request->validate([
            'nombre' => 'required|string|min:5|max:100',
            'edad' => 'required|integer|min:1'
        ]);
         $estudiante = new Estudiante();
         $estudiante->nombre = $validatedData['nombre'];
         $estudiante->edad = $validatedData['edad'];
         $estudiante->save();
         
         return view('estudiantes.create');
         */
        
        $request->validate([
            'nombre' => 'required|string|min:2|max:100',
            'edad' => 'required|integer|min:1'
        ]);
        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index');

    

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
    public function edit(string $pepe)
    {
        return $pepe;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect()->route('estudiantes.index');
    }
}
