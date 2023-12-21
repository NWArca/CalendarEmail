<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polizze = Polizza::all();
        return view('polizze.index', compact('polizze'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polizze.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero_polizza' => 'required',
            'premio' => 'nullable',
            'decorezza_polizza' => 'required',
            'scadenza_prima_rata' => 'required',
            'scadenza_polizza' => 'required',
            'periodicità' => 'required',
            'assicurazione_id' => 'required',
        ]);

        Polizza::create($request->all());

        return redirect()->route('polizze.index')->with('success', 'Polizza creata con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Polizza $Polizza)
    {
        return view('polizze.show', compact('Polizza'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Polizza $Polizza)
    {
        return view('polizze.edit', compact('Polizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Polizza $Polizza)
    {
        $request->validate([
            'numero_polizza' => 'required',
            'premio' => 'nullable',
            'decorezza_polizza' => 'required',
            'scadenza_prima_rata' => 'required',
            'scadenza_polizza' => 'required',
            'periodicità' => 'required',
            'assicurazione_id' => 'required',
        ]);

        $Polizza->update($request->all());

        return redirect()->route('polizze.index')->with('success', 'Polizza aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Polizza $Polizza)
    {
        $Polizza->delete();

        return redirect()->route('polizze.index')->with('success', 'Polizza eliminata con successo!');
    }
}
