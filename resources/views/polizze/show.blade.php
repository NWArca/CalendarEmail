@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dettagli Polizza</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Numero Polizza: {{ $polizza->numero_polizza }}</h5>
                <p class="card-text">Premio: {{ $polizza->premio }}</p>
                <p class="card-text">Decorrenza Polizza: {{ $polizza->decorrenza_polizza }}</p>
                <p class="card-text">Scadenza Prima Rata: {{ $polizza->scadenza_prima_rata }}</p>
                <p class="card-text">Scadenza Polizza: {{ $polizza->scadenza_polizza }}</p>
                <p class="card-text">Periodicità: {{ $polizza->periodicita }}</p>
                <p class="card-text">Assicurazione: {{ $polizza->assicurazione->nome_compagnia }}</p>
                <p class="card-text">Creato il: {{ $polizza->created_at }}</p>
                <p class="card-text">Aggiornato il: {{ $polizza->updated_at }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('polizze.index') }}" class="btn btn-primary">Torna all'elenco</a>
            <a href="{{ route('polizze.edit', $polizza->id) }}" class="btn btn-warning">Modifica</a>
            <a href="{{ route('polizze.create') }}" class="btn btn-success">Nuova Polizza</a>
        </div>
    </div>
@endsection
