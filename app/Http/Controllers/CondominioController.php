<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CondominioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $condomini = Condominio::all();
        return view('condomini.index', compact('condomini'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('condomini.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'inizio_anno_condominiale' => 'required',
            'fine_anno_condominiale' => 'required',
            'scadenza_prima_rata' => 'nullable',
            'scadenza_seconda_rata' => 'nullable',
            'indirizzo' => 'required',
            'codice_fiscale' => 'required',
            'polizza_id' => 'required',
        ]);

        Condominio::create($request->all());

        return redirect()->route('condomini.index')->with('success', 'Condominio creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Condominio $Condominio)
    {
        return view('condomini.show', compact('Condominio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Condominio $Condominio)
    {
        return view('condomini.edit', compact('Condominio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Condominio $Condominio)
    {
        $request->validate([
            'nome' => 'required',
            'inizio_anno_condominiale' => 'required',
            'fine_anno_condominiale' => 'required',
            'scadenza_prima_rata' => 'nullable',
            'scadenza_seconda_rata' => 'nullable',
            'indirizzo' => 'required',
            'codice_fiscale' => 'required',
            'polizza_id' => 'required',
        ]);

        $Condominio->update($request->all());

        return redirect()->route('condomini.index')->with('success', 'Condominio aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Condominio $Condominio)
    {
        $Condominio->delete();

        return redirect()->route('condomini.index')->with('success', 'Condominio eliminato con successo!');
    }
}