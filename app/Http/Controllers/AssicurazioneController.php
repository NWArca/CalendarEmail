<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssicurazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assicurazioni = Assicurazione::all();
        return view('assicurazioni.index', compact('assicurazioni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assicurazioni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_compagnia' => 'required',
            'indirizzo' => 'nullable',
            'nome_referente' => 'nullable',
            'numero_telefono' => 'nullable|integer',
            'email' => 'nullable|email',
        ]);

        Assicurazione::create($request->all());

        return redirect()->route('assicurazioni.index')->with('success', 'Assicurazione creata con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assicurazione $assicurazione)
    {
        return view('assicurazioni.show', compact('assicurazione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assicurazione $assicurazione)
    {
        return view('assicurazioni.edit', compact('assicurazione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assicurazione $assicurazione)
    {
        $request->validate([
            'nome_compagnia' => 'required',
            'indirizzo' => 'nullable',
            'nome_referente' => 'nullable',
            'numero_telefono' => 'nullable|integer',
            'email' => 'nullable|email',
        ]);

        $assicurazione->update($request->all());

        return redirect()->route('assicurazioni.index')->with('success', 'Assicurazione aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assicurazione $assicurazione)
    {
        $assicurazione->delete();

        return redirect()->route('assicurazioni.index')->with('success', 'Assicurazione eliminata con successo!');
    }
}
