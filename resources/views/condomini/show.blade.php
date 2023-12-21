@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dettagli Condominio</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nome: {{ $condominio->nome }}</h5>
                <p class="card-text">Inizio Anno Condominiale: {{ $condominio->inizio_anno_condominiale }}</p>
                <p class="card-text">Fine Anno Condominiale: {{ $condominio->fine_anno_condominiale }}</p>
                <p class="card-text">Scadenza Prima Rata: {{ $condominio->scadenza_prima_rata }}</p>
                <p class="card-text">Scadenza Seconda Rata: {{ $condominio->scadenza_seconda_rata }}</p>
                <p class="card-text">Indirizzo: {{ $condominio->indirizzo }}</p>
                <p class="card-text">Codice Fiscale: {{ $condominio->codice_fiscale }}</p>
                <p class="card-text">Polizza: {{ $condominio->polizza->numero }} - {{ $condominio->polizza->assicurazione->nome_compagnia }}</p>
                <p class="card-text">Creato il: {{ $condominio->created_at }}</p>
                <p class="card-text">Aggiornato il: {{ $condominio->updated_at }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('condomini.index') }}" class="btn btn-primary">Torna all'elenco</a>
            <a href="{{ route('condomini.edit', $condominio->id) }}" class="btn btn-warning">Modifica</a>
            <a href="{{ route('condomini.create') }}" class="btn btn-success">Nuovo Condominio</a>
        </div>
    </div>
@endsection
