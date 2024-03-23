<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::latest()->paginate(5);
          
        return view('personas.index', compact('personas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personas.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Persona::create($request->validated());
           
        return redirect()->route('personas.index')
                         ->with('success', 'Persona agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        return view('personas.show',compact('persona'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        return view('personas.edit',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        $persona->update($request->validated());
          
        return redirect()->route('personas.index')
                        ->with('success','Persona actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
           
        return redirect()->route('personas.index')
                        ->with('success','Persona borrada satisfactoriamente');    }
}
